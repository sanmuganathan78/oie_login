<br>
<br>
<link rel="stylesheet" href="<?php echo base_url();?>assets/autocomplete/jquery-ui.css">

<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-success alert"   data-layout="top" data-type="alert">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<?php print_r($msg); ?>
</div>
<?php } ?>

<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-danger alert"  >
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<?php print_r($msg); ?>
</div>
<?php } ?>
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Stock</h4>
			</div>
			<div class="widget-content">
				<div class="row">
					<div class="col-md-5">
						<div class="col-md-4">
							<a  href="#myModal1"  data-toggle="modal" class="btn btn-default btn-block"><i class="icon-plus"></i>Add Stock</a>
						</div>
						<div class="modal fade" id="myModal1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Add Stock</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<div class="widget box">
													<div class="widget-content">
														<form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>stock/insert" method="post">

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
																</div>
															</div>	
															<div class="form-group">
																<label class="control-label col-md-3">Item Name</label>
																<div class="col-md-5">
																	<select name="itemname" class="form-control itemname"  id="itemname">
																		<option value=''>Select itemname</option>
																	</select>

																	<span class="help-block"></span>
																</div>
															</div>  
															<div class="form-group">
																<label class="col-md-3 control-label">Quantity<span class="required">*</span></label>
																<div class="col-md-5">
																	<input type="text" name="qty" class="form-control required url"  id="qty">
																	<div id="qty_valid"></div>
																</div>
															</div>
															<div class="form-actions" align="center">
																<button  class="btn btn-primary" id="submit"  >Add Stock</button><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
				<h4><i class="icon-reorder"></i>Stock Reports</h4>
			</div>
			<div class="widget-content">
				<table class="table table-striped table-bordered table-hover table-checkable datatable">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Date</th>
							<th>Category</th>
							<th>Item Name</th>
							<th>Qty</th>
							<th>Update Qty</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i=1;
						foreach ($sto as  $row) 
							{?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo date('d-m-Y',strtotime($row['date']));?></td>
							<td><?php echo $row['category'];?></td>
							<td><?php echo $row['itemname'];?></td>
							<td><?php echo $row['balanceqty'];?></td>
							<td><?php echo $row['updateqty'];?></td>
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
<?php foreach($sto as $row) {?>
<div class="modal fade" id="edit<?php echo $row['id'];?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Stock</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-content">
								<form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>stock/update" method="post">
									<div class="form-group">
										<label class="col-md-3 control-label">Category<span class="required">*</span></label>
										<div class="col-md-5">
											<select type="text" name="category" class="form-control" id="category">
												<option value="">Select</option>
												<?php foreach($data as $a) {?>
												<option value="<?php echo $a->category;?>"<?php if($a->category==$row['category'])echo 'selected';?>><?php echo $a->category;?></option>
												<?php }?>
											</select>
										</div>
									</div>									
									<div class="form-group">
										<label class="col-md-3 control-label">Item Name <span class="required">*</span></label>
										<div class="col-md-5">
											<input type="text" name="itemname" id="itemname" class="form-control required email" value="<?php echo $row['itemname'];?>">
											<input type="hidden" name="id" value="<?php echo $row['id'];?>">
											<div id="item_valid"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Quantity<span class="required">*</span></label>
										<div class="col-md-5">
											<input type="text" name="qty" class="form-control required url" value="<?php echo $row['qty'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Balnce Qty<span class="required">*</span></label>
										<div class="col-md-5">
											<input type="text" name="balanceqty" class="form-control required url" value="<?php echo $row['balanceqty'];?>">
										</div>
									</div>
									<div class="form-actions" align="center">
										<button  class="btn btn-primary" id="submit"  >Update Stock</button><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<?php foreach($sto as $row) { ?>
<div class="modal fade" id="delete<?php echo $row['id'];?>" role="dialog">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" >Delete Stock</h4>
			</div>
			<div class="modal-body">
				<form name="form" action="<?php echo base_url();?>stock/delete" method="post" id="form1">
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
<?php } ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>assets/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
	$(document).ready(function(){






		$('#submit').click(function(){
			var itemname=$('#itemname').val();
			var qty=$('#qty').val();
			if(itemname=='')
			{
				$('#itemname').focus();
				$('#item_valid').html('<div><font color="red">Enter The Item Name</font></div>');
				$('#itemname').keyup(function(){
					$('#item_valid').html('');
				});
				return false
			}
			if(qty=='')
			{
				$('#qty').focus();
				$('#qty_valid').html('<div><font color="red">Enter the qty</font></div>');
				$('#qty').keyup(function(){
					$('#qty_valid').html('');
				});
				return false
			}
		});

		$( "#itemname").autocomplete({
			source: function(request, response) {
				$.ajax({
					url: "<?php echo base_url();?>stock/get_itemname",
					data: { itemname: $("#itemname").val()},
					dataType: "json",
					type: "POST",
					success: function(data){
// alert(data);
response(data);
}
});
			},
		});

// 		$('#category').blur(function(){
//   var category=$('#category').val();
//   $.post('<?php echo base_url();?>stock/category',{name:category},function(res){
//      var obj=jQuery.parseJSON(res);
//      $('#itemname').val(obj.itemname);
//   }); 
// });

$('#category').blur(function(){

	var category=$('#category').val();   

	$.post('<?php echo base_url(); ?>stock/category',{ name:category },function(res){

		$(".itemname option:gt(0)").remove(); 
		$('.itemname').find("option:eq(0)").html("Select itemname ");
		var obj=jQuery.parseJSON(res);
		$(obj).each(function()
		{
			var option = $('<option />');
			option.attr('value', this.value).text(this.label);           
			$('.itemname').append(option);
		});

	});
});

});
</script>



