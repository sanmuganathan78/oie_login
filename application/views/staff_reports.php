
<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Invoice Reports</h4>
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
							<th>Invoice No</th>
							<th>Customer Name</th>
							<th></th>
							<th>Paid Amount</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$i=1;
						foreach ($staff as  $row) 


							{?> 

						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo date('d-m-Y',strtotime($row['date']));?></td>
							<td><?php echo $row['invoiceno'];?></td>
							<td><?php echo $row['customername'];?></td>
							<td><?php echo $row['grandtotal'];?></td>
							<td><?php echo $row['grandtotal'];?></td>
							<!-- <td class="center">
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
 -->
							</tr>
							<?php }

							?> 
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>