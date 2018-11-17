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
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Firstname: <span class="tx-danger">*</span><?php echo form_error('fname', '<span class="text text-danger">', '</span>'); ?></label>
                    <input type="hidden" name="role_id" value="5">
                    <input class="form-control" type="text" name="fname" value="<?= set_value('fname'); ?>" placeholder="Enter firstname">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Lastname: <span class="tx-danger">*</span><?php echo form_error('lname', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="text" name="lname" value="<?= set_value('lname'); ?>" placeholder="Enter lastname">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Mobile: <span class="tx-danger">*</span><?php echo form_error('mobile', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="number" name="mobile" value="<?= set_value('mobile'); ?>" placeholder="Enter Mobile Number">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-8">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Email Address: <span class="tx-danger">*</span><?php echo form_error('email', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="email" name="email" value="<?= set_value('email'); ?>" placeholder="Enter Email Address">
                  </div>
                </div><!-- col-8 -->
                
              </div><!-- row -->

              <div class="form-layout-footer">
                <button type="sunbit" name="save" class="btn btn-default mg-r-5">Submit Form</button>
                <button type="sunbit" name="cancel" class="btn btn-secondary">Cancel</button>
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
          </form>
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
