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
        <h5>Dashboard</h5>
      </div><!-- kt-pagetitle -->
<?php  
$gold = getGold();
$silver = getSilver(); 
?>
      <div class="kt-pagebody">

        <div class="row row-sm">
          <div class="col-lg-8">
            <div class="row row-sm">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body pd-b-0">
                    <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20 tx-success">Gold</h6>
                    <h2 class="tx-lato tx-inverse"><?php echo $gold->amount; ?></h2>
                    
                    <p class="tx-12"><span class="tx-success"><?php echo $gold->qty; ?></span> Gram
                      <button onclick="buy('1')" class=" btn btn-info pull-right">BUY</button>
                    </p>
                  </div><!-- card-body -->
                  <div id="rs1" class="ht-50 ht-sm-70 mg-r--1"></div>
                </div><!-- card -->
              </div><!-- col-6 -->
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body pd-b-0">
                    <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20 tx-danger">Silver</h6>
                    <h2 class="tx-lato tx-inverse"><?php echo $silver->amount; ?></h2>
                     <p class="tx-12"><span class="tx-success"><?php echo $silver->qty; ?></span> Gram
                      <button class="btn btn-info pull-right" onclick="buy('1')">BUY</button >
                    </p>
                  </div><!-- card-body -->
                  <div id="rs2" class="ht-50 ht-sm-70 mg-r--1"></div>
                </div><!-- card -->
              </div><!-- col-6 -->
            </div><!-- row -->

           
          </div><!-- col-8 -->
         

          </div><!-- col-4 -->
        </div><!-- row -->
      </div><!-- kt-pagebody -->
      
      <div class="kt-footer">
        <span>Copyright &copy;. All Rights Reserved. Katniss Responsive Bootstrap 4 Admin Dashboard.</span>
        <span>Created by: ThemePixels, Inc.</span>
      </div><!-- kt-footer -->
    </div><!-- kt-mainpanel -->
    <?php include('layouts/script.php'); ?>
    


    <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">
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
<script type="text/javascript">
  
  function buy(type){
  // $('#id').val(id);
  // $('#name').val(name);
  // $('#money').val(amount);
  $('#buyModal').modal('show');
}

</script>