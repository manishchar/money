<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('layouts/meta.php'); ?>
    
  </head>

  <body>

  <?php include('layouts/side_menu.php'); ?>
    <!-- ##### MAIN PANEL ##### -->
    <div class="kt-mainpanel">
      <div class="kt-pagetitle">
        <h5><?php echo $title; ?></h5>
      </div><!-- kt-pagetitle -->

      <div class="kt-pagebody">
        
          <div class="card pd-20 pd-sm-40">
          
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">SNO</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-20p">Position</th>
                  <th class="wd-15p">Mobile</th>
                  <th class="wd-10p">Email</th>
                  <th class="wd-10p">Gold</th>
                  <th class="wd-10p">Silver</th>
                  <th class="wd-10p">Amount</th>
                  <th class="wd-25p">Status</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>
            <?php  
            if($customers){
              $i=1;
              foreach($customers as $key=>$customer){ ?>

                        <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $customer->fname.' '.$customer->lname; ?></td>
                              <td><?php echo $customer->role_name; ?></td>
                              <td><?php echo $customer->mobile; ?></td>
                              <td><?php echo $customer->email; ?></td>
                              <td><?php echo $customer->gold; ?></td>
                              <td><?php echo $customer->silver; ?></td>
                              <td><?php echo $customer->amount; ?></td>
                              <td><?php echo $customer->active; ?></td>
                              <td><button onclick='addAmount("<?php echo $customer->id; ?>","<?php echo $customer->fname.' '.$customer->lname; ?>","<?php echo $customer->amount; ?>")'>Add Money</button></td>
                            </tr>

              <?php } } ?>

        
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        
      </div><!-- kt-pagebody -->
      
      <div class="kt-footer">
        <span>Copyright &copy;. All Rights Reserved. Katniss Responsive Bootstrap 4 Admin Dashboard.</span>
        <span>Created by: ThemePixels, Inc.</span>
      </div><!-- kt-footer -->
    </div><!-- kt-mainpanel -->
    <?php include('layouts/script.php'); ?>
    

<div class="modal fade" id="addAmount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      
            <h4 class="modal-title" id="myModalLabel"><i class="ion-android-settings"></i> Add Money</h4>
          </div>
                    
          <div class="modal-body">
            <form id="moneyForm">
            <div class="col-sm-12 form-group">
              <input type="hidden" name="id" id="id" class="form-control" placeholder="Enter Money.">
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter Money." readonly=""><br/>
              <input type="number" name="money" id="money" class="form-control" placeholder="Enter Money.">
              
            </div>
            <div class="form-group">
                    <button type="button" class="btn btn-red" data-dismiss="modal">Close</button>
            
                        <input name="submit" type="submit" class="btn btn-primary" value="Send">
            </div>
            </form>
          </div>
          <div class="modal-footer">
      
          </div></form>
        </div>
      </div>
    </div>


  </body>
</html>
<link href="<?php echo base_url().'resources' ?>/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="<?php echo base_url().'resources' ?>/lib/select2/css/select2.min.css" rel="stylesheet">

    
<script>

function addAmount(id,name,amount){
  $('#id').val(id);
  $('#name').val(name);
  $('#money').val(amount);
  $('#addAmount').modal('show');
}

$('#moneyForm').submit(function(event) {
  $.ajax({
    type:"POST",
    url:"<?php echo base_url().'customer/addMoney'; ?>",
    data:$('#moneyForm').serialize(),
    success:function(res){
      var obj = JSON.parse(res);
if(obj.status == 'success'){
  location.reload();
}
if(obj.status == 'failed'){
  alert(obj.message);
}
    }
  });
  return false;
});
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>