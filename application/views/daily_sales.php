<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Daily  Sales</h4>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo base_url();?>daily_sales/search">
				<br>
				<div class="form-group">
					<label class="col-md-2 control-label" >Item Name:</label>
					<div class="col-md-2">
						<input class="form-control" type="text" name="itemname" placeholder="">
					</div>
					<label class="col-md-1 control-label" style="width:140px;">From Date</label>
					<div class="col-md-2"><input class="form-control datepicker"  type="text" name="fromdate"  id="datepicker"></div>
					<label class="col-md-1 control-label">To Date</label>
					<div class="col-md-2"><input class="form-control datepicker" type="text" name="todate"  id="datepicker1"></div>
				</div>
				<div class="col-sm-offset-4">
					<button type="submit" class="btn btn-info">Search</button>
				</div>
				<br>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Daily Sales</h4>
				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
					</div>
				</div>
			</div>
			<div class="widget-content">
				<table class="table table-striped table-bordered table-hover table-checkable datatable">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Date</th>
							<th>Sales Qty</th>
							<th>Sales Amount</th>
							<th>Return Qty</th>
							<th>Return Amount</th>
							<th>Total Amount</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=1;
						foreach ($sales as  $row) 
							{

							$qty =explode(',',$row['qty']);
								$w=array_sum($qty);
								?> 


						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo date('d-m-Y',strtotime($row['date']));?></td>
							<td><?php echo $row['invoiceno'];?></td>
							<td><?php echo $row['grandtotal'];?></td>
							<td><?php  echo $w;?></td>
							<td><?php echo $row['returngrandtotal'];?></td>
							<td><?php echo $row['totalamount'];?></td>
						</tr>
						<?php }
						?> 
					</tbody>
				</table>
			</div>
		</div>
	</div>



<?php if($_POST) {?>
<form name="form" method="post" action="<?php echo base_url();?>daily_sales/pdf" target="_blank" onsubmit="setTimeout(function () { location.href = '<?php echo base_url();?>daily_sales'; })">


	<table>
		<tr>
			<td><input type="hidden" name="fromdate" class="form-control" 
			value="<?php if($this->input->post('fromdate')){echo $this->input->post('fromdate');}?>"></td>
			<td><input type="hidden" name="todate" class="form-control" value="<?php if($this->input->post('todate')){echo $this->input->post('todate');}?>"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="submit" class="btn btn-info" name="submit" value="Print"></td>
		</tr>



	</table>
</form>

<?php }?>
</div>
 <script src="<?php echo base_url();?>assets/jquery.min.js"></script>


<script type="text/javascript">
    
$(document).ready(function(){



                                  window.print();



                                });

</script>
