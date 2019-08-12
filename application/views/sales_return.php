<br>
<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn bbtn-success col-offset-md-3 alert"   data-layout="top" data-type="alert">
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
<link rel="stylesheet" href="<?php echo base_url();?>assets/autocomplete/jquery-ui.css">
<style type="text/css">
	.change
	{
		width:135px;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Sales Return</h4>
			</div>
			<form class="form-horizontal" method="post" id="form"   action="<?php echo base_url();?>sales_return/returns">
				<br>
				<div class="form-group">
					<label class="col-md-1 control-label" style="width:101px;">Invoice No:</label>
					<div class="col-md-2"><input type="text" name="invoiceno" id="invoiceno" class="form-control">
					<div id="invoiceno_valid"></div>
					</div>
					<label class="col-md-2 control-label">Customer Name:</label>
					<div class="col-md-2">
						<input class="form-control" type="text" name="customername" placeholder="" id="customername">
					</div>
					<label class="col-md-2 control-label">Sales Person:</label>
					<div class="col-md-2">
						<select class="form-control">
							<option value="">Person1</option>
							<option value="">Person2</option>
							<option value="">Person3</option>
						</select>					
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-1 control-label" style="width:100px;">Mobile No:</label>
					<div class="col-md-2"><input class="form-control" type="text" id="mobileno" name="mobileno">
						<div id="mob_valid"></div>
					</div>
					<label class="col-md-2 control-label">Date</label>
					<div class="col-md-2"><input class="form-control " type="text" id="date" name="invoicedate" value="<?php echo date('d-m-Y');?>"></div>
					<label class="col-md-2 control-label">Address:</label>
					<div class="col-md-2"><textarea class="form-control" type="text" name="address" id="address" ></textarea></div>
				</div>
				<div id="ajax">
					<table class="responsive table" width="100%">
						<thead> 
							<tr>
								<th>Item No</th>
								<th>Itemname</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Amount</th>
							</tr>  
						</thead>
						<tbody>
						</tbody> 
						<tbody id="append"></tbody> 
					</table>
				</div>
				<br>
				<br>
				<div class="form-group" >
					<label class="col-md-1 control-label"></label>
					<div class="col-md-2"  >
						<label class="radio-inline" >
							<input type="radio"  class="uniform" name="return" id="stock" value="stock">
							Add to Stock
						</label>
						<label class="radio-inline">
							<input type="radio" class="uniform" name="return" id="damage"  value="damage">
							Damage
						</label>
					</div>
				</div>
				<div id="reason" style="display:none;">
				<div>
					<label for="inputPassword"  class="col-sm-3 control-label">Reason</label>
					<div class="col-sm-3">                              
						<textarea type="text"  class="form-control" name="reason" id="reason"></textarea>
					</div> 
				</div>
				</div>
				<br>
				<br>
				<br>
				<br>
				<div class="col-sm-offset-4">
					<button type="submit" class="btn btn-info"  name="save" value="save" id="save">Return</button>
				</div>
				<br>
			</form>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>assets/autocomplete/jquery-ui.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#invoiceno').blur(function(){
			var invoiceno=$('#invoiceno').val();
			$.post('<?php echo base_url();?>sales_return/get_invoiceno',{name:invoiceno},function(res){
				var obj=jQuery.parseJSON(res);
				$('#customername').val(obj.customername);
				$('#mobileno').val(obj.mobileno);
				$('#date').val(obj.date);
				$('#address').val(obj.address);
			}); 
			var invoiceno=$('#invoiceno').val();
			$.post('<?php echo base_url();?>sales_return/getable',{name:invoiceno},function(res){
				$('#ajax').html(res);
			}); 
		});
		$( "#invoiceno").autocomplete({
			source: function(request, response) {
				$.ajax({
					url: "<?php echo base_url();?>sales_return/invoiceno",
					data: { invoiceno: $("#invoiceno").val()},
					dataType: "json",
					type: "POST",
					success: function(data){
// alert(data);
response(data);
}
});
			},
		});


		   $('#save').click(function(){
        var invoiceno=$('#invoiceno').val();
        
        if(invoiceno=='')
        {
          $('#invoiceno').focus();
          $('#invoiceno_valid').html('<div><font color="red">Enter the invoice number</font></div>');
          $('#invoiceno').keyup(function(){
            $('#invoiceno_valid').html('');
          });
          return false
        }
      });
		 

    // $("#reason").hide();
    $("#stock").click(function () {
        $("#reason").show();
    });
    $("#damage").click(function () {
        $("#reason").hide();
    });
	});
</script>