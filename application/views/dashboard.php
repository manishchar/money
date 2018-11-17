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
$id = $this->session->userdata('login')['id'];
$user = userData($id); 
//print_r($user->amount);
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
                      <?php if($user->amount>0){ ?>
                        <button onclick="buy('1')" class=" btn btn-info pull-right">BUY</button>
                      <?php }  ?>
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
<<<<<<< HEAD
                      <?php if($user->amount>0){ ?>
                        <button class="btn btn-info pull-right" onclick="buy('2')">BUY</button >
                      <?php }  ?>
                      
=======
                      <button class="btn btn-info pull-right" onclick="buy('2')">BUY</button >
>>>>>>> 91d79b91046c672da4d313586bd26c1052540747
                    </p>
                  </div><!-- card-body -->
                  <div id="rs2" class="ht-50 ht-sm-70 mg-r--1"></div>
                </div><!-- card -->
              </div><!-- col-6 -->

            </div><!-- row -->

           
          </div><!-- col-8 -->
         <div class="col-lg-4">
           
                <div class="card">
                  <div class="card-body pd-b-0">
                    <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20 tx-danger">My Wallet</h6>
                    <h2 class="tx-lato tx-inverse"><?php echo $user->amount; ?></h2>
                     <p class="tx-12">
                     <span class="tx-success">Gold: <?php echo $user->gold; ?></span>
                     <span class="tx-success pull-right">Silver: <?php echo $user->silver; ?></span> 
                      
                    </p>
                  </div><!-- card-body -->
                  <div id="rs2" class="ht-50 ht-sm-70 mg-r--1"></div>
                </div><!-- card -->
              </div>

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
            <form id="moneyForm" >
            <div class="col-sm-12 form-group">
              <div class="col-sm-12 form-group">
            <label>Wallet Amount</label>
            <label id="walletAmount">2500</label>
            </div>
            <div class="col-sm-12 form-group">
              <label>Current Rate</label>
              <label id="currentRate">2500</label>
              &nbsp;<span id="qty">10</span>&nbsp;Gram
            </div>
              
            <div class="col-sm-12 form-group">
              <input type="hidden" name="userId" id="userId">
              <input type="hidden" name="goldId" id="goldId">
              <input type="hidden" name="gold_type" id="gold_type">
               
              <label>Qty in gram</label>
              <input type="text" name="buyQty" id="buyQty" class="form-control" placeholder="Enter qty.">
            </div>
              
              
              <div class="col-sm-12 form-group">
            <label>Purchase Amount  : </label>
            <label id="purchaseAmountLabel"></label>
            <input type="hidden" readonly="" name="purchaseAmount" id="purchaseAmount">
            </div>
              <div class="col-sm-12 form-group">
            <label>Remaining Amount : </label>
            <label id="remainingAmountLabel"></label>
            <input type="hidden" readonly="" name="remainingAmount" id="remainingAmount">
            </div>
              
            </div>
            <div class="form-group">
                <div id="errorMessage"></div>    
            
                <input name="submit" type="submit" class="btn btn-primary" value="Buy" id="buyBtn">
            </div>
            </form>
          </div>
          <div class="modal-footer">
      
          </div>
        </div>
      </div>
    </div>



  </body>
</html>
<script type="text/javascript">
  
  function buy(type){
    // 1 for gold 
    // 2 for silver

    $.ajax({
      type:"POST",
      url:"<?php echo base_url().'welcome/getGoldPrice' ?>",
      data:{type:type},
      success:function(res){
        console.log(res);
        var obj = JSON.parse(res);
        console.log(obj.gold);
        $('#currentRate').html(obj.gold.amount);
        $('#qty').html(obj.gold.qty);
        $('#walletAmount').html(obj.user.amount);
        $('#remainingAmount').val(obj.user.amount);
        $('#userId').val(obj.user.id);
        $('#goldId').val(obj.gold.id);
        $('#gold_type').val(obj.gold.gold_type);
        
        //$('#buyQty').val(res.amount);
      },
    });

    $('#moneyForm').submit(function(){
      //alert('form submit');
      

       $.ajax({
      type:"POST",
      url:"<?php echo base_url().'welcome/purchase' ?>",
      data:$('#moneyForm').serialize(),
      success:function(res){
        console.log(res);
        var obj = JSON.parse(res);
        if(obj.status == 'success')
        {
          location.reload();
        }

        if(obj.status == 'failed')
        {
          $('#errorMessage').html(obj.message);
        }
        
        // $('#currentRate').html(obj.gold.amount);
        // $('#qty').html(obj.gold.qty);
        // $('#walletAmount').html(obj.user.amount);
        // $('#remainingAmount').val(obj.user.amount);
        //$('#buyQty').val(res.amount);
      },
    });

      return false;
    });

    $('#buyQty').change(function(){
      var buyQty = $(this).val();
      var rate   = parseFloat($('#currentRate').html());
      var qty    = parseInt($('#qty').html());
      var amount = parseInt($('#walletAmount').html());
      var pergram = parseInt(rate)/parseInt(qty);
      var purchaseAmount = buyQty*parseInt(pergram);
      if(purchaseAmount <= amount){
        //alert('buy'+purchaseAmount);
        var remainingAmount =amount -purchaseAmount;
        $('#purchaseAmount').val(purchaseAmount);
        $('#remainingAmount').val(remainingAmount);
        $('#purchaseAmountLabel').html(purchaseAmount);
        $('#remainingAmountLabel').html(remainingAmount);
      }else{
        alert('insficent Amount in your wallet');
      }
      //alert(pergram);



    });
    //alert(type);
  // $('#id').val(id);
  // $('#name').val(name);
  // $('#money').val(amount);
  $('#buyModal').modal('show');
}

</script>