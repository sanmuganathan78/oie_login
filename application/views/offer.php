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
	<div class="col-md-6">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Offer</h4>
			</div>
			<div class="widget-content">
				<form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>offer/insert" method="post">
				
					<div class="form-group">
					<label class="col-md-3 control-label">All Customer<span class="required"></span></label>
						<div class="col-md-2">
							<input type="checkbox" name="customer" id="customer" class="form-control" required>
							<div id="customer_valid"></div>
						</div>
							</div>
								<div class="form-group">
						<label class="col-md-3 control-label">Offer<span class="required"></span></label>
						<div class="col-md-5">
							<textarea type="text" name="offer" id="offer" class="form-control " ></textarea> 
							<div id="offer_valid"></div>
						</div>
					</div>


					<div class="form-actions">
					<button class="btn btn-info col-sm-offset-3 " id="submit">Submit</button>
						
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Offer Details</h4>
			</div>
			<div class="widget-content">
				<table class="table table-striped table-bordered table-hover table-checkable datatable">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Date</th>
							<th>Details</th>
						</tr>
					</thead>
					 <tbody>
         <?php 
                        $i=1;
                        foreach($offer as $it) {

                        echo'<tr>

                            <td>'. $i++.'</td>
                            <td>'. date('d-m-Y',strtotime($it['date'])).'</td>
                            <td>'. $it['offer'].'</td>


                            </tr>';
                             }?> 


                        </tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>
	
<script type="text/javascript">
	$(document).ready(function(){

		$('#submit').click(function(){

			var customer=$('#customer').val();
			var offer=$('#offer').val();



			if(customer=='')
			{
				$('#customer').focus();
				$('#customer_valid').html('<div><font color="red">Select the customer</font></div>');
				$('#customer').keyup(function(){
					$('#customer_valid').html('');
				});
				return false;
			}

			if(offer=='')
			{
				$('#offer').focus();
				$('#offer_valid').html('<div><font color="red">Enter the offer</font></div>');
				$('#offer').keyup(function(){
					$('#offer_valid').html('');
				});
				return false;
			}
		});
	});


</script>
