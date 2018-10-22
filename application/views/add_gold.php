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
                    <label class="form-control-label">Name: <span class="tx-danger">*</span><?php echo form_error('name', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="text" name="name" placeholder="Enter Gold Name">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-control-label">Amount: <span class="tx-danger">*</span><?php echo form_error('amount', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="number" name="amount" value="" placeholder="Enter Amount">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-2">
                  <div class="form-group">
                    <label class="form-control-label">Qty( In Gram): <span class="tx-danger">*</span><?php echo form_error('qty', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="number" name="qty" value="" placeholder="Enter Qty">
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
                  <th class="wd-20p">Qty(Gram)</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>
            <?php  
            if($golds){
              $i=1;
              foreach($golds as $key=>$gold){ ?>

                        <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $gold->name; ?></td>
                              <td><?php echo $gold->amount; ?></td>
                              <td><?php echo $gold->qty; ?></td>
                              <td><?php echo $gold->active; ?></td>
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
