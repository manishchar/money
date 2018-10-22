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
  <div class="alert alert-success">
  <?php echo $this->session->flashdata('message'); ?>
</div>
<?php } ?>
<?php if($this->session->flashdata('error')){ ?>
  <div class="alert alert-danger">
  <?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?>
          
          <form method="POST">
            <div class="form-layout">
              <div class="row mg-b-25">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">Membership Number: <span class="tx-danger">*</span><?php echo form_error('membership', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="text" name="membership" placeholder="Enter Membership Number">
                  </div>
                </div><!-- col-4 -->
              </div><!-- row -->

              <div class="form-layout-footer">
                <button type="submit" name="search" class="btn btn-default mg-r-5">Search</button>
                <button type="submit" name="cancel" class="btn btn-secondary">Cancel</button>

              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
          </form>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">SNO</th>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Amount</th>
                  <th class="wd-20p">Duration</th>
                  <th class="wd-20p">Interest</th>
                  <th class="wd-20p">Principal</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>
            <?php  
            if(false){
              $i=1;
              foreach($rds as $key=>$rd){ ?>

                        <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $rd->name; ?></td>
                              <td><?php echo $rd->amount; ?></td>
                              <td><?php echo $rd->duration; ?></td>
                              <td><?php echo $rd->interest; ?></td>
                              <td><?php echo $rd->principal; ?></td>
                              <td><?php echo $rd->active; ?></td>
                              <td>Edit | Delete | Active</td>
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
