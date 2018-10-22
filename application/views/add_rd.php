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
                    <label class="form-control-label">RD Name: <span class="tx-danger">*</span><?php echo form_error('rd_name', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="text" name="rd_name" placeholder="Enter Name">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Amount: <span class="tx-danger">*</span><?php echo form_error('rd_amount', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="number" name="rd_amount" value="" placeholder="Enter Amount">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Duration: <span class="tx-danger">*</span><?php echo form_error('rd_duration', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="number" name="rd_duration" value="" placeholder="Enter Duration">
                  </div>
                </div><!-- col-4 -->
                

                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Interest: <span class="tx-danger">*</span><?php echo form_error('rd_interest', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="number" name="rd_interest" value="" placeholder="Enter Interest">
                  </div>
                </div><!-- col-4 -->                
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Principal: <span class="tx-danger">*</span><?php echo form_error('rd_principal', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="number" name="rd_principal" value="" placeholder="Enter Principal">
                  </div>
                </div><!-- col-4 -->

                <div class="col-lg-3">
                  <div>&nbsp;</div>
                <button class="btn btn-default mg-r-5">Save</button>
                <button class="btn btn-secondary">Cancel</button>  
                </div>
              </div><!-- row -->

              <div class="form-layout-footer">
                
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
            if($rds){
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
