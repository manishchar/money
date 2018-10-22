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
          <h6 class="card-body-title">Basic Responsive DataTable</h6>
          <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">SNO</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-20p">Position</th>
                  <th class="wd-15p">Mobile</th>
                  <th class="wd-10p">Email</th>
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
                              <td><?php echo $customer->active; ?></td>
                              <td>Action</td>
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
    
  </body>
</html>
<link href="<?php echo base_url().'resources' ?>/lib/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="<?php echo base_url().'resources' ?>/lib/select2/css/select2.min.css" rel="stylesheet">

    
<script>
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