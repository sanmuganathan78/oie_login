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
<!-- 
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
</div> -->
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Customer Reports</h4>
<!--<div class="toolbar no-padding">
<div class="btn-group">
<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
</div>
</div>-->
</div>
<div class="widget-content">
	<table class="table table-striped table-bordered table-hover table-checkable datatable">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Date</th>
				<th>Customer id</th>
				<th>Name</th>
				<th>Date of Birth</th>
				<th>Anniversary Day</th>
				<th>Mobile No</th>
				<th>Location</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=1;
			foreach ($cus as  $row) 
				{?> 
			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo date('d-m-Y',strtotime($row['date']));?></td>
				<td><?php echo $row['customerid'];?></td>
				<td><?php echo $row['customername'];?></td>
				<td><?php echo date('d-m-Y',strtotime($row['dob']));?></td>
				<td><?php echo date('d-m-Y',strtotime($row['anniversaryday']));?></td>
				<td><?php echo $row['mobileno'];?></td>
				<td><?php echo $row['location'];?></td>
				<td class="center">
					<div class="btn-group">
						<button type="button" class="btn
						btn-info dropdown-toggle waves-effect waves-light"
						data-toggle="dropdown" aria-expanded="false">Manage <span
						class="caret"></span></button>
						<ul class="dropdown-menu"
						role="menu" style="background: #1EBFB9 none repeat scroll
						0% 0%;width:14px;min-width: 100%;">
						<li><a
							href="#edit<?php echo $row['id'];?>" class=""
							data-animation="fadein" data-plugin="custommodal"
							data-overlayspeed="100" data-overlaycolor="#36404a" style="color:
							white; font-weight: bold; background-color: #1EBFB9" data-toggle="modal">Edit</a></li>
							<li><a
								href="#delete<?php echo $row['id'];?>" class=""
								data-animation="fadein" data-plugin="custommodal"
								data-overlayspeed="100" data-overlaycolor="#36404a" style="color:
								white; font-weight: bold; background-color: #1EBFB9;" data-toggle="modal">Delete</a></li>
							</ul>
						</div>
					</td>
				</tr>
				<?php }
				?> 
			</tbody>
		</table>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php foreach($cus as $row) {?>
<div class="modal fade" id="delete<?php echo $row['id'];?>">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" >Delete Customer</h4>
			</div>
			<div class="modal-body">
				<form name="form" action="<?php echo base_url();?>customer/delete" method="post" id="form1">
					<p align="center">Are you sure To Delete this Details</p>
					<input type="hidden" value="<?php echo $row['id'];?>" name="id">
					<div class="col-offset-4" align="center">
						<input type="submit" name="submit" class='btn btn-primary' value="ok">
					</div>
				</form>            
			</div>       
		</div>    
	</div>
</div>
<?php }?>
<?php foreach($cus as $row) {?>
<div class="modal fade" id="edit<?php echo $row['id'];?>">
	<div class="modal-dialog">
		<div class="modal-content" style="width: 849px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Customer</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-content">
								<form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>customer/update" method="post">
									<div class="form-group">
										<label class="col-md-2 control-label">Customer No<span class="required">*</span></label>
										<div class="col-md-3">
											<input type="text" name="customerid" class="form-control required" value="<?php echo $row['customerid'];?>" readonly>
											<input type="hidden" name="id" value="<?php echo $row['id'];?>">
										</div>
										<label class="col-md-2 control-label">Customer Name<span class="required">*</span></label>
										<div class="col-md-3">
											<input type="text" name="customername" class="form-control required" value="<?php echo $row['customername'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Date Of Birth<span class="required">*</span></label>
										<div class="col-md-3">
											<input type="text" name="dob" class="form-control datepicker" value="<?php echo date('d-m-Y',strtotime($row['dob']));?>">
										</div>
										<label class="col-md-2 control-label">Anniversary Day<span class="required">*</span></label>
										<div class="col-md-3">
											<input type="text" name="anniversaryday" class="form-control datepicker" value="<?php echo date('d-m-Y',strtotime($row['anniversaryday']));?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Mobile No<span class="required">*</span></label>
										<div class="col-md-3">
											<input type="text" name="mobileno" class="form-control required email" value="<?php echo $row['mobileno'];?>">
										</div>
										<label class="col-md-2 control-label">Email<span class="required">*</span></label>
										<div class="col-md-3">
											<input type="text" name="email" class="form-control required email" value="<?php echo $row['email'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Location<span class="required">*</span></label>
										<div class="col-md-3">
											<input type="text" name="location" class="form-control required url" value="<?php echo $row['location'];?>">
										</div>
										<label class="col-md-2 control-label">Address<span class="required">*</span></label>
										<div class="col-md-3">
											<textarea type="text" name="address" class="form-control required" minlength="5"><?php echo $row['address'];?></textarea>
										</div>
									</div>
									<div class="form-actions" align="center">
										<button  class="btn btn-primary "  >Update Customer</button>&nbsp;&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }?>
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

