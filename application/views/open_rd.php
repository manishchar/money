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
                <div class="col-lg-2">
                  <div class="form-group">
                    <label class="form-control-label">Membership No.: <span class="tx-danger">*</span><?php echo form_error('fname', '<span class="text text-danger">', '</span>'); ?></label>
                    <input type="text" id="memberId" name="memberShip" class="form-control" value="<?php echo $id; ?>" readonly="">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Select Scheme: <span class="tx-danger">*</span><?php echo form_error('fname', '<span class="text text-danger">', '</span>'); ?></label>
                    <select class="form-control" id="schemeId" onchange="changeScheme(this)"> 
<option> Select Scheme</option>
<?php
if($rds){
  foreach ($rds as $key => $rd) { ?>
<option value="<?php echo $rd->id; ?>"><?php echo $rd->name; ?></option>    
  <?php }
}
?>

                    </select>
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-control-label">Duration In Month: <span class="tx-danger">*</span><?php echo form_error('duration', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" type="number" name="duration" id="duration" value="" placeholder="Duration">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-control-label">Interest (%): <span class="tx-danger">*</span><?php echo form_error('interest', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" id="interest" type="number" name="interest" value="" placeholder="Intrest">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-control-label">Amount: <span class="tx-danger">*</span><?php echo form_error('amount', '<span class="text text-danger">', '</span>'); ?></label>
                    <input class="form-control" id="amount" type="number" name="amount" value="" placeholder="Amount">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-3">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">select Instalment: <span class="tx-danger">*</span><?php echo form_error('email', '<span class="text text-danger">', '</span>'); ?></label>
                    <select class="form-control" id="number" onchange="calculateInstalment()"> 
                    <option value="0" disabled="" selected=""> Select Option</option>
                    <?php
                      for($i=1;$i<31;$i++){ ?>
                        <option value="<?php echo $i; ?>"> <?php echo $i; ?></option>
                      <?php }
                    ?>
                    </select>
                  </div>
                </div><!-- col-8 -->
                  <div class="col-lg-3">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">&nbsp; <span class="tx-danger">*</span><?php echo form_error('email', '<span class="text text-danger">', '</span>'); ?></label>
                    <select class="form-control" id="format" onchange="calculateInstalment()"> 
                    <option value="0" disabled="" selected=""> Select Option</option>
                    <option value="1"> Day</option>
                    <option value="1"> Month</option>
                    </select>
                  </div>
                </div><!-- col-8 -->


                <div class="col-lg-3">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Number of Instalment: <span class="tx-danger">*</span><?php echo form_error('role_id', '<span class="text text-danger">', '</span>'); ?></label>
                    <input type="number" id="instalment" name="instalment" readonly="" class="form-control">
                  </div>
                </div><!-- col-4 -->
                
              </div><!-- row -->

              <div class="form-layout-footer">
                <button type="button" onclick="generateEmi()" class="btn btn-default mg-r-5">Generate EMI</button>
                <button class="btn btn-secondary">Cancel</button>
              </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
          </form>
<div id="responseMessage"></div>
          <div class="table-wrapper">
          <form id='emiForm' onsubmit='return emiForm(this)'>
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">SNO</th>
                  <th class="wd-15p">Inst No</th>
                  <th class="wd-15p">Inst Date</th>
                  <th class="wd-15p">Principal</th>
                  <th class="wd-20p">Intrest</th>
                  <th class="wd-20p">R_Principal</th>
                  <th class="wd-20p">R_Intrest</th>
                  <th class="wd-15p">Status</th>
                  
                </tr>
              </thead>
              <tbody>
            
        
              </tbody>
            </table>
            </form>
          </div><!-- table-wrapper -->

        </div><!-- card -->

        
      </div><!-- kt-pagebody -->
      
      <div class="kt-footer">
        <span>Copyright &copy;. All Rights Reserved. Katniss Responsive Bootstrap 4 Admin Dashboard.</span>
        <span>Created by: ThemePixels, Inc.</span>
      </div><!-- kt-footer -->
    </div><!-- kt-mainpanel -->
    <?php include('layouts/script.php'); ?>
    <script type="text/javascript">
      function changeScheme(that){
var id = $(that).val();
$('#duration').val('');
$('#interest').val('');
$('#amount').val('');
$('#instalment').val('');
$('#number').val('0');
$('#format').val('0');
$.ajax({
url:"<?php echo base_url().'scheme/getScheme' ?>",
type:"POST",
data:{id:id},
success:function(res){
  var obj = JSON.parse(res);
  $('#duration').val(obj.duration);
$('#interest').val(obj.interest);
$('#amount').val(obj.amount);
//alert(obj.duration);
},
});
      }
function calculateInstalment(){
  var number = $('#number').val();
  var format = $('#format').val();

  //alert(number +' '+ format);
  if(number != null && format != null){
    if(format == 1){
      var totalDays = parseInt($('#duration').val())*30;
      $('#instalment').val(Math.floor(totalDays/number));
    }else{
      // select month
    }
  }else{
    //alert('some wrong');
  }
}
function generateEmi(){
  var instalment = $('#instalment').val();
  var interest = $('#interest').val();
  var amount = $('#amount').val();
  var memberId = $('#memberId').val();
  var schemeId = $('#schemeId').val();
  var number = $('#number').val();
  var format = $('#format').val();
  //var interest = $('#interest').val();
  if($('#instalment').val() !=''){
    $.ajax({
url:"<?php echo base_url().'scheme/getEmi' ?>",
type:"POST",
data:{number:number,format:format,schemeId:schemeId,memberId:memberId,instalment:instalment,interest:interest,amount:amount},
success:function(res){

  var obj = JSON.parse(res);
 console.log(obj.status);
if( obj.status == 'success'){
$('#datatable1').html(obj.data);  
}
if( obj.status == 'duplicate'){
$('#responseMessage').html('<div class="alert alert-danger">'+obj.message+'</div>');  
}

},
});
    alert('cal');
  }else{
    alert('select Instalment');
  }
}

function emiForm(obj){

   $.ajax({
url:"<?php echo base_url().'scheme/saveEmi' ?>",
type:"POST",
data:$(obj).serialize(),
success:function(res){
  var obj = JSON.parse(res);
 // $('#duration').val(obj.duration);
//$('#interest').val(obj.interest);
//$('#amount').val(obj.amount);
console.log(obj.status);
if( obj.status == 'success'){
  $('#datatable1').html('');
$('#responseMessage').html('<div class="alert alert-success">EMI Save successfully and send to approval</div>');
}
if( obj.status == 'duplicate'){
  $('#datatable1').html('');
$('#responseMessage').html('<div class="alert alert-danger">This Scheme Already Running.</div>');
}

if( obj.status == 'failed'){
  alert('EMI Save failed');
}
},
});
  alert('form submit');
  return false;
}
    </script>
  </body>
</html>
