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

<?php foreach($profile as $p) {?>
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Company Profile</h4>
			</div>
			<div class="widget-content">
				<form class="form-horizontal" method="post"   action="<?php echo base_url();?>profile/insert">
					<div class="form-group">
						<label class="col-md-2 control-label">Software Name:</label>
						<div class="col-md-3"><input type="text" name="softwarename" class="form-control" value="<?php echo $p['softwarename'];?>">
						</div>
						<label class="col-md-2 control-label">Address1:</label>
						<div class="col-md-3">
						<input type="text" name="address1" class="form-control" value="<?php echo $p['address1'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Company Name:</label>
						<div class="col-md-3">
						<input class="form-control" type="text" name="companyname" value="<?php echo $p['companyname'];?>">
						</div>
						<label class="col-md-2 control-label">Address2:</label>
						<div class="col-md-3">
						<input class="form-control" type="text" name="address2" value="<?php echo $p['address2'];?>">
						</div>
										</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Phone No:</label>
							<div class="col-md-3">
							<input class="form-control" type="text" name="phoneno" value="<?php echo $p['phoneno'];?>">
							</div>
							<label class="col-md-2 control-label">City:</label>
							<div class="col-md-3"><input class="form-control" type="text" name="city" value="<?php echo $p['city'];?>"></div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Email Id:</label>
							<div class="col-md-3"><input class="form-control" type="text" name="emailid" value="<?php echo $p['emailid'];?>"></div>
							<label class="col-md-2 control-label">Pincode:</label>
							<div class="col-md-3"><input class="form-control" type="text" name="pincode" value="<?php echo $p['emailid'];?>"></div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">GST No:</label>
							<div class="col-md-3"><input type="text" name="tinno"   class="form-control" value="<?php //echo $p['tinno'];?>"></div>
							<label class="col-md-2 control-label">TAX (%):</label>
							<div class="col-md-3"><select  autocomplete="off"  class="form-control decimal uppercase" required  name="uom" id="uom">
                                <option value="">Select TAX</option>
                               
                                ?>
                            </select></div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Website:</label>
							<div class="col-md-3"><input type="text" name="website"   class="form-control" value="<?php echo $p['website'];?>"></div>
						</div>
			
						<div class="form-actions" align="center"><button class="btn btn-info">Submit</button>
						</div>									
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php }?>

	<div class="row">
	<div class="col-sm-12">
	<div class="widget box">
	<div class="widget-header">
	<h4 class="icon-reorder">Image Upload</h4>
		</div>
		<div class="widget content">
			<div class="widget-content">
			<div class="col-sm-12">
				<form class="form-horizontal" method="post"  action="<?php echo base_url();?>profile/image_upload" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-2 control-label">Image:</label>
						<div class="col-md-3">
						<input type="file" name="image" class="form-control"  id="image">
						</div>
						</div>
					<div class="form-actions">
					<button class="btn btn-info col-sm-offset-3">Upload Image</button>
						</div>	

					</form>
				</div>
				</div>


	</div>
	</div>
	</div>
	</div>
