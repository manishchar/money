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
          <?php
if($this->session->flashdata('message')){ ?>
<div class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></div>
<?php }
          ?>

                    <?php
if($this->session->flashdata('error')){ ?>
<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
<?php }
          ?>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">SNO</th>
                  <th class="wd-15p">Member Name</th>
                  <th class="wd-20p">Scheme Name</th>
                  <th class="wd-15p">Amount</th>
                  <th class="wd-10p">Installment</th>
                  <th class="wd-25p">Status</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>
            <?php  
            if($rds){
              $i=1;
              foreach($rds as $key=>$rd){ ?>

                        <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $rd->fname.' '.$rd->lname; ?></td>
                              <td><?php echo $rd->name; ?></td>
                              <td><?php echo $rd->amount; ?></td>
                              <td><?php echo $rd->numberOfInstallment; ?></td>
                              <td><?php echo $rd->active; ?></td>
                              <td>
                                <?php 
                                if($rd->status == '0'){ ?>
<a href="<?php echo base_url().'scheme/approve/'.$rd->id; ?>" class="badge badge-success m-2">Approve</a>
<a href="<?php echo base_url().'scheme/reject/'.$rd->id; ?>" class="badge badge-danger m-2">Reject</a>
                                <?php }elseif($rd->status == '1'){ ?>
<span class="badge badge-warning m-2">Running</span>
                                <?php }elseif($rd->status == '2'){ ?>
<span class="badge badge-info m-2">Close</span>
                                <?php } 
                                ?>
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