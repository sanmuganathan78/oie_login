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
							<th>Category</th>
							<th>Sales Qty</th>
							<th>Sales Amount</th>
							<th>Return </th>
							<th>Return Amount</th>
							<th>Total Amount</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$i=1;
						foreach ($invoice_view as  $row) 


							{?> 

						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo date('d-m-Y',strtotime($row['date']));?></td>
							<td><?php echo $row['invoiceno'];?></td>
							<td><?php echo $row['customername'];?></td>
							<td><?php echo $row['grandtotal'];?></td>
							<td><?php echo $row['grandtotal'];?></td>
							
							</tr>
							<?php }

							?> 
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

