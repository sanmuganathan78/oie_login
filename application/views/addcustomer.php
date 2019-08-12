
<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-success col-offset-md-3 alert"   data-layout="top" data-type="alert">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<?php print_r($msg); ?>
</div>
<?php } ?>

<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-danger btn-notification alert"  >
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<?php print_r($msg); ?>
</div>
<?php } ?> 


<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Customer</h4>
			</div>
			<div class="widget-content">
				<form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>customer/insert" method="post">
					<div class="form-group">
						<label class="col-md-2 control-label">Customer id<span class="required"></span></label>
						<div class="col-md-3">
							<input type="text" name="customerid" class="form-control required" value="<?php echo $cusid;?>" readonly>
						</div>
						<label class="col-md-2 control-label">Customer Name<span class="required">*</span></label>
						<div class="col-md-3">
							<input type="text" name="customername" id="cusname" class="form-control required" >
							<div id="cus_valid"></div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Date Of Birth<span class="required"></span></label>
						<div class="col-md-3">
							<input type="text" name="dob" class="form-control datepicker" value="">
						</div>
						<label class="col-md-2 control-label">Anniversary Day<span class="required"></span></label>
						<div class="col-md-3">
							<input type="text" name="anniversaryday" class="form-control datepicker" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Mobile No<span class="required">*</span></label>
						<div class="col-md-3">
							<input type="text" name="mobileno" id="mobileno" maxlength="12" class="form-control required email">
							<div id="mob_valid"></div>
						</div>
						<label class="col-md-2 control-label">Email<span class="required"></span></label>
						<div class="col-md-3">
							<input type="text" name="email" class="form-control required email">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Location<span class="required"></span></label>
						<div class="col-md-3">
							<input type="text" name="location" class="form-control required url">
						</div>
						<label class="col-md-2 control-label">Address<span class="required"></span></label>
						<div class="col-md-3">
							<textarea type="text" name="address" class="form-control required"  ></textarea>
						</div>
					</div>
					<div class="form-actions" align="center">
						<button  class="btn btn-primary"  id="submit">Add Customer</button>&nbsp;&nbsp;<button type="reset" class="btn btn-default" data-dismiss="modal">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</div>
</div>
</div>


<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>


<script type="text/javascript">
	$(document).ready(function()
	{
$('#submit').click(function(){
			var mobileno=$('#mobileno').val();
			var cusname=$('#cusname').val();
			if(cusname=='')
			{
				$('#cusname').focus();
				$('#cus_valid').html('<div><font color="red">Enter the customer name</font></div>');
				$('#cusname').keyup(function(){
					$('#cus_valid').html('');
				});
				return false
			}
			if(mobileno=='')
			{
				$('#mobileno').focus();
				$('#mob_valid').html('<div><font color="red">Enter the mobile number</font></div>');
				$('#mobileno').keyup(function(){
					$('#mob_valid').html('');
				});
				return false
			}
		});	


  $("#mobileno").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        $("#mob_valid").html('<div><font color="red">Enter the  number only</font></div>').show().fadeOut(3000);
               return false;
    }
   });

  $('#mobileno').blur(function(){

			var cusname=$('#cusname').val();
			var mobileno=$('#mobileno').val();
			$.post('<?php echo base_url();?>customer/check_name',{mobileno:mobileno},function(res){
				if(res=='yes')
				{
					alert("already exists")
					$('#mobileno').val('');
					$('#mobileno').focus();
				}
			});		

		});
});
  // var specialKeys = new Array();
  //       function add_number(e) {
  //           var keyCode = e.which ? e.which : e.keyCode
  //           var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
  //           document.getElementById("error").style.display = ret ? "none" : "inline";
  //           return ret;
  //       }


 </script>



		});	




</script>

