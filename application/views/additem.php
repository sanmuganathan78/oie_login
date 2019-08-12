





<br>
<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-success col-offset-md-5 alert"   data-layout="top" data-type="alert">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<?php print_r($msg); ?>
</div>
<?php } ?>

<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn  btn-danger alert"  >
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<?php print_r($msg); ?>
</div>
<?php } ?> 
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Item</h4>
			</div>
			<div class="widget-content">
				<div class="row">
					<div class="col-md-5">
						<div class="col-md-4">
							<a data-toggle="modal" href="#myModal1" class="btn btn-default btn-block"><i class="icon-plus"></i>Add Item</a>
						</div>
						<div class="modal fade" id="myModal1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Add Item</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<div class="widget box">
													<div class="widget-content">
														<form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>item/insert" method="post">


															<?php $data=$this->db->get('category_details')->result(); ?>

															<div class="form-group">
																<label class="col-md-3 control-label">Category<span class="required">*</span></label>
																<div class="col-md-5">
																	<select type="text" name="category" class="form-control" id="category">
																		<option value="">Select</option>
																		<?php foreach($data as $a) {?>
																		<option value="<?php echo $a->category;?>"><?php echo $a->category;?></option>
																		<?php }?>
																	</select>
																	<div id="category_valid"></div>
																</div>
															</div>	

															<div class="form-group">
																<label class="col-md-3 control-label">Item No <span class="required">*</span></label>
																<div class="col-md-5">
																	<input type="text" name="itemno" id="itemno" value="<?php echo $cusid;?>" class="form-control required" readonly>
																	<div id="itemno_valid"></div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label">Item Name <span class="required">*</span></label>
																<div class="col-md-5">
																	<input type="text" name="itemname" id="itemname" class="form-control required email">
																	<div id="item_valid"></div>
																</div>
															</div>
															<div class="form-group">
																<label class="col-md-3 control-label">Price<span class="required">*</span></label>
																<div class="col-md-5">
																	<input type="text" name="price" id="price" class="form-control required url">
																	<div id="price_valid"></div>
																</div>
															</div>
<!-- 				<?php $data=$this->db->get('vat_detail')->result(); ?>
-->				<!-- <div class="form-group">
<label class="col-md-3 control-label">VAT<span class="required">*</span></label>
<div class="col-md-5">
<select type="text" name="vat" class="form-control" id="vat">
<option value="">Select</option>
<?php foreach($data as $a) {?>
<option value="<?php echo $a->vat;?>"><?php echo $a->vat;?></option>
<?php }?>
</select>
<div id="vat_valid"></div>
</div>
</div>
--><div class="form-actions" align="center">
<button  type="submit" name="submit" class="btn btn-primary " id="submit"  >Add Item</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

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
</div> 
</div> 
</div> 
</div> 
</div> 
</div> 
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Item Reports</h4>
			</div>
			<div class="widget-content">
				<table class="table table-striped table-bordered table-hover table-checkable datatable">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Date</th>
							<th>Category</th>
							<th>Item No</th>
							<th>Item Name</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i=1;
						foreach($item as $it) {?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo date('d-m-Y',strtotime($it['date']));?></td>
							<td><?php echo $it['category'];?></td>
							<td><?php echo $it['itemno'];?></td>
							<td><?php echo $it['itemname'];?></td>
							<td class="hidden-xs"><?php echo $it['price'];?></td>
							<td class="center">
								<div class="btn-group">
									<button type="button" class="btn
									btn-info dropdown-toggle waves-effect waves-light"
									data-toggle="dropdown" aria-expanded="false">Manage <span
									class="caret"></span></button>
									<ul class="dropdown-menu"
									role="menu" style="background: #790d25 none repeat scroll
									0% 0%;width:14px;min-width: 100%;">
									<li><a
										href="#edit<?php echo $it['id'];?>" class=""
										data-animation="fadein" data-plugin="custommodal"
										data-overlayspeed="100" data-overlaycolor="#36404a" style="color:
										white; font-weight: bold; background-color: #790d25" data-toggle="modal">Edit</a></li>
										<li><a
											href="#delete<?php echo $it['id'];?>" class=""
											data-animation="fadein" data-plugin="custommodal"
											data-overlayspeed="100" data-overlaycolor="#36404a" style="color:
											white; font-weight: bold; background-color: #790d25;" data-toggle="modal">Delete</a></li>
										</ul>
									</div>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div> 
<?php foreach($item as $row) {?>
<div class="modal fade" id="delete<?php echo $row['id'];?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" >Delete Item</h4>
			</div>
			<div class="modal-body">
				<form name="form" action="<?php echo base_url();?>item/delete" method="post" id="form1">
					<p align="center">Are you sure To Delete this Details</p>
					<input type="hidden" value="<?php echo $row['id'];?>" name="id">
					<div class="col-offset-4" align="center">
						<input type="submit" name="submit" class='btn btn-primary' value="ok">
						<!-- <input type="submit" name="submit" class='btn btn-primary' value="cancel"> -->
					</div>
				</form>            
			</div>       
		</div>    
	</div>
</div>
<?php }?>
<?php foreach($item as $row) {?>
<div class="modal fade" id="edit<?php echo $row['id'];?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Item</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-content">
								<form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>item/update" method="post">

									<?php $data=$this->db->get('category_details')->result(); ?>

									<div class="form-group">
										<label class="col-md-3 control-label">Category<span class="required">*</span></label>
										<div class="col-md-5">
											<select type="text" name="category" class="form-control" id="category">
												<option value="">Select</option>
												<?php foreach($data as $a) {?>
												<option value="<?php echo $a->category;?>"<?php if($a->category==$row['category'])echo'selected';?>><?php echo $a->category;?></option>
												<?php }?>
											</select>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-3 control-label">Item No <span class="required">*</span></label>
										<div class="col-md-5">
											<input type="text" name="itemno" class="form-control required" value="<?php echo $row['itemno'];?>">
											<input type="hidden" name="id" value="<?php echo $row['id'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Item Name <span class="required">*</span></label>
										<div class="col-md-5">
											<input type="text" name="itemname" class="form-control required email" value="<?php echo $row['itemname'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Price<span class="required">*</span></label>
										<div class="col-md-5">
											<input type="text" name="price" class="form-control required url" value="<?php echo $row['price'];?>">
										</div>
									</div>

						<!-- 			<?php $data=$this->db->get('vat_detail')->result(); ?>
									<div class="form-group">
										<label class="col-md-3 control-label">VAT<span class="required">*</span></label>
										<div class="col-md-5">
											<select type="text" name="vat" class="form-control" id="vat">
												<option value="">Select</option>
												<?php foreach($data as $a) {?>
												<option value="<?php echo $a->vat;?>"<?php if($a->vat==$row['vat'])echo'selected';?>><?php echo $a->vat;?></option>
												<?php }?>
											</select>
											<div id="vat_valid"></div>
										</div>
									</div> -->
									
									<div class="form-actions" align="center">
										<button  class="btn btn-primary ">Update Item</button>&nbsp;&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
			var category=$('#category').val();
			var itemno=$('#itemno').val();
			var itemname=$('#itemname').val();
			var price=$('#price').val();
			
			if(category=='')
			{
				$('#category').focus();
				$('#category_valid').html('<div><font color="red">Select the  category</font></div>');
				$('#category').change(function(){
					$('#category_valid').html('');
				});
				return false
			}
			if(itemno=='')
			{
				$('#itemno').focus();
				$('#itemno_valid').html('<div><font color="red">Enter the item number</font></div>');
				$('#itemno').keyup(function(){
					$('#itemno_valid').html('');
				});
				return false
			}
			if(itemname=='')
			{
				$('#itemname').focus();
				$('#item_valid').html('<div><font color="red">Enter the item name</font></div>');
				$('#itemname').keyup(function(){
					$('#item_valid').html('');
				});
				return false
			}
			if(price=='')
			{
				$('#price').focus();
				$('#price_valid').html('<div><font color="red">Enter the price</font></div>');
				$('#price').keyup(function(){
					$('#price_valid').html('');
				});
				return false
			}
		
			
		});
});
</script>