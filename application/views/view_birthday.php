<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i><?php echo date('d-m-Y');?></h4>
				<div class="toolbar no-padding">
					<div class="btn-group">
						<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
					</div>
				</div>
			</div>
			<div class="widget-content">
			<form  method="post" action="<?php echo base_url();?>customer/birthday_search">
					<table>
						<tr>
							<td> &nbsp;&nbsp;From Date &nbsp;&nbsp;
							</td>
							<td>
							<br>              
								<input type="text" class="form-control  datepicker" name="fromdate" id="datepicker1" style="font-size:16px;">
							</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;
								To Date &nbsp;&nbsp;
							</td>
							<td>    
							<br>          
								<input type="text" class="form-control datepicker" name="todate" id="datepicker2" style="font-size:16px;">
							</td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type='submit' class="btn btn-info" value="Search">
							</td>
						</tr>
					</table>
				</form>
				<table class="table table-striped table-bordered table-hover table-checkable datatable">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Date</th>
							<th>Customer id</th>
							<th>Customer Name</th>
							<th>Mobile No</th>
							<th>Location</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=1;
						foreach ($birth as  $row) 
							{?> 
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo date('d-m-Y',strtotime($row['date']));?></td>
							<td><?php echo $row['customerid'];?></td>
							<td><?php echo $row['customername'];?></td>
							<td><?php echo $row['mobileno'];?></td>
							<td><?php echo $row['location'];?></td>
						</tr>
						<?php }
						?> 
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php if($_POST) {?>
<form name="form" method="post" action="<?php echo base_url();?>customer/pdf" target="_blank" onsubmit="setTimeout(function () { location.href = '<?php echo base_url();?>customer/view_birthday'; })">


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


