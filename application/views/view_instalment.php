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
                  <th class="wd-20p">EMI No</th>
                  <th class="wd-15p">Date</th>
                  <th class="wd-10p">Principal</th>
                  <th class="wd-10p">Interest</th>
                  <th class="wd-10p">Amount</th>
                  <th class="wd-25p">Status</th>
                 </tr>
              </thead>
              <tbody>
            <?php  
            if($Instalments){
              $i=1;
              foreach($Instalments as $key=>$Instalment){ ?>

                        <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $Instalment->name; ?></td>
                              <td><?php echo $Instalment->emiNumber; ?></td>
                              <td><?php echo $Instalment->emiDate; ?></td>
                              <td><?php echo $Instalment->principal; ?></td>
                              <td><?php echo $Instalment->interest; ?></td>
                              <td><?php echo $Instalment->paidAmount; ?></td>
                              <td>
                              <?php 
                              if($Instalment->status == '0'){ ?>
                              
                              <button class="btn btn-info" onclick="payEmi('<?php echo $Instalment->id; ?>','<?php echo $Instalment->memberId; ?>')">Pay</button>
                              <?php }else{ ?>
                              <span class="text text-success">PAID</span>
                              <?php } 
                              ?></td>
                              <td>
                              
                              </td>
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

function payEmi(emi_id,memberId){
  console.log(emi_id);

  $.ajax({
    type:"POST",
    url:"<?php echo base_url().'customer/payEmi'; ?>",
    data:{emi_id:emi_id,memberId:memberId},
    success:function(res){
      console.log(res);
      var obj = JSON.parse(res);
      if(obj.status == 'success'){
        location.reload();
      }
      if(obj.status == 'failed'){
        alert(obj.message);
      }
    }
  });

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