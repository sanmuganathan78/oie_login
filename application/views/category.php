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
<h4><i class="icon-reorder"></i>Category</h4>
</div>
<div class="widget-content">
<div class="row">
<div class="col-md-5">
<div class="col-md-5">
<a data-toggle="modal" href="#myModal1" class="btn btn-default btn-block"><i class="icon-plus"></i>Add Category</a>
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
<form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>category/insert" method="post">

<div class="form-group">
<label class="col-md-3 control-label">Category<span class="required">*</span></label>
<div class="col-md-5">
<input type="text" name="category" id="category" class="form-control required">
</div>
</div>

<!-- <div class="form-group">
<label class="col-md-3 control-label">Category<span class="required">*</span></label>
<div class="col-md-5">
<select name="" class="form-control" id="category">
<option value="">Select Category</option>	
<option value="waxing">Waxing</option>	
<option value="bleach">Bleach</option>	
<option value="facials">Facials</option>	
<option value="threading">Threading</option>	
<option value="pedicure">Pedicure</option>	
<option value="manicure">Manicure</option>	
<option value="haircut_gents">Hair Cut Gents</option>	
<option value="haircut_ladies">Hair Cut Ladies</option>	
<option value="haircolouring_gents">Hair Colouring Gents</option>
<option value="haircolouring_ladies">Hair Colouring Ladies</option>	
<option value="fashinablecolours_gents">Fashinable Colours Gents</option>
<option value="fashinablecolours_gents">Fashinable Colours Ladies</option>
<option value="massages">Massages</option>	
<option value="hairspa">Hair Spa</option>	
<option value="matrixspa">Matrix Spa</option>	
<option value="mehandi">Mehandi</option>
<option value="gunshot">Gunshot(piercing)</option>
<option value="hair_treatmentgents">Hair Treatment Gents</option>
<option value="hair_treatmentladies">Hair Treatment Ladies</option>
<option value="hair_smoothinggents">Hair Smoothing Gents</option>
<option value="hair_smoothingladies">Hair Smoothing Ladies</option>
<option value="pre_bridalpackagesgents">Pre-Bridal Packages Gents</option>
<option value="pre_bridalpackagesladies">Pre-Bridal Packages Ladies</option>
</select>
</div>
</div>
 -->
<div class="form-actions" align="center">
<button  class="btn btn-primary " id="submit"  >Add Category</button><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<h4><i class="icon-reorder"></i>Category Reports</h4>
</div>
<div class="widget-content">
<table class="table table-striped table-bordered table-hover table-checkable datatable">
<thead>
<tr>
<th>S.No</th>
<th>Date</th>
<th>Category</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$i=1;
foreach($cat as $it) {?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo date('d-m-Y',strtotime($it['date']));?></td>
<td><?php echo $it['category'];?></td>

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
<?php foreach($cat as $row) {?>
<div class="modal fade" id="delete<?php echo $row['id'];?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" >Delete User</h4>
</div>
<div class="modal-body">
<form name="form" action="<?php echo base_url();?>category/delete" method="post" id="form1">
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
<?php foreach($cat as $row) {?>
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
<form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>category/update" method="post">

<div class="form-group">
<label class="col-md-3 control-label">Category<span class="required">*</span></label>
<div class="col-md-5">
<input type="text" name="category" id="category" class="form-control required" value="<?php echo $row['category'];?>">
<input type="hidden" name="id" value="<?php echo $row['id']?>">
</div>
</div>


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
var itemno=$('#itemno').val();
var itemname=$('#itemname').val();
var price=$('#price').val();
var vat=$('#vat').val();
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
if(price=='')
{
$('#price').focus();
$('#price_valid').html('<div><font color="red">Enter the price</font></div>');
$('#price').keyup(function(){
$('#price_valid').html('');
});
return false
}
if(vat=='')
{
$('#vat').focus();
$('#vat_valid').html('<div><font color="red">Select the vat</font></div>');
$('#vat').keyup(function(){
$('#vat_valid').html('');
});
return false
}
});
});
</script>