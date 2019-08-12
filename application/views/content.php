<?php
$count=count($get);
$count1=count($get1);
$count2=count($get2);
$count3=count($get3);
?>
<div class="crumbs">
	<ul id="breadcrumbs" class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Dashboard</a>

		</li>
		<li class="current">

</li>
	</ul>
	<ul class="crumb-buttons">
	<br>
	<b style="font-size:16px;"><?php echo date('d-m-Y');?></b>
	</ul>
</div>
<div class="row row-bg"> <!-- .row-bg -->
	<div class="col-sm-2" >
		<div class="statbox widget box box-shadow">
			<div class="widget-content">
				<div class="visual cyan">
					<i class="icon-user"></i>
				</div>
				<div class="title">Customer</div>
				<div class="value"><?php echo $count;?></div>
				<a class="more" href="<?php echo base_url();?>customer/view">View Customer <i class="pull-right icon-angle-right"></i></a>
			</div>
		</div> <!-- /.smallstat -->
	</div> <!-- /.col-md-3 -->
	<div class=" col-md-2">
		<div class="statbox widget box box-shadow">
			<div class="widget-content">
				<div class="visual green">
					<i class="icon-table"></i>
				</div>
				<div class="title">Invoice</div>
				<div class="value"><?php echo $count3;?></div>
				<a class="more" href="<?php echo base_url();?>invoice/view">View Invoice<i class="pull-right icon-angle-right"></i></a>
			</div>
		</div> <!-- /.smallstat -->
	</div> <!-- /.col-md-3 -->
	<div class="col-md-2">
		<div class="statbox widget box box-shadow">
			<div class="widget-content">
				<div class="visual yellow">
					<i class="icon-edit"></i>
				</div>
				<div class="title">Item</div>
				<div class="value"><?php echo $count1;?></div>
				<a class="more" href="<?php echo base_url();?>item">View Item<i class="pull-right icon-angle-right"></i></a>
			</div>
		</div> <!-- /.smallstat -->
	</div> <!-- /.col-md-3 -->
	<div class="col-md-2" >
		<div class="statbox widget box box-shadow">
			<div class="widget-content">
				<div class="visual red">
					<i class="icon-shopping-cart"></i>
				</div>
				<div class="title">Stock</div>
				<div class="value"><?php echo $count2;?></div>
				<a class="more" href="<?php echo base_url();?>stock">View Stock<i class="pull-right icon-angle-right"></i></a>
			</div>
		</div> 
	</div> 
		<div class="col-md-2">
		<div class="statbox widget box box-shadow">
			<div class="widget-content">
				<div class="visual red">
					<i class="icon-shopping-cart"></i>
				</div>
				<div class="title">Offer</div>
				<div class="value">&nbsp;</div>
				<a class="more" href="<?php echo base_url();?>offer">View Offer<i class="pull-right icon-angle-right"></i></a>
			</div>
		</div> 
	</div> 
		<div class="col-md-2">
		<div class="statbox widget box box-shadow">
			<div class="widget-content">
				<div class="visual red">
					<i class="icon-shopping-cart"></i>
				</div>
				<div class="title" style="font-size:9px;">Appoinment</div>
				<div class="value">&nbsp;</div>
				<a class="more" href="<?php echo base_url();?>appoinment">View Appoinment<i class="pull-right icon-angle-right"></i></a>
			</div>
		</div> 
	</div> 
</div> 
<div class="page-header">
	<div class="row row-bg"> 
		<div class="col-sm-6 ">
			<div class="widget box">
				<div class="widget-header">
					<h4><i class="icon-reorder"></i>&nbsp;(<?php echo date('d-m-Y');?>) Appointment</h4>
				</div>
				<div class="widget-content">
					<table class="table table-striped table-bordered ">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Date</th>
								<th>Appoinment No</th>
								<th>Name</th>
								<th>Time</th>
								<th>view</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i=1;

							foreach($today as $t){?>

							<td><?php echo $i++;?></td>
							<td><?php echo date('d-m-Y',strtotime($t['startdate']));?></td>
							<td><?php echo $t['appoinmentno'];?></td>
							<td><?php echo $t['customername'];?></td>
							<td><?php echo $t['starttime'];?></td>
							<td style="text-align: center;"><a href="<?php echo base_url();?>appoinment"><button class="btn btn-default">view</button></a></td>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div> 

			<div class="widget box">
				<div class="widget-header">
					<h4><i class="icon-reorder"></i>&nbsp;(<?php echo date('d-m-Y',strtotime("+1 day"));?>) Appointment&nbsp;</h4>
				</div>
				<div class="widget-content">
					<table class="table table-striped table-bordered ">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Date</th>
								<th>Appoinment No</th>
								<th>Name</th>
								<th>Time</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i=1;
							foreach($tomorrow as $tr) 
								{?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo date('d-m-Y',strtotime($tr['startdate']));?></td>
								<td><?php echo $tr['appoinmentno'];?></td>
								<td><?php echo $tr['customername'];?></td>
								<td><?php echo $tr['starttime'];?></td>
								<td style="text-align: center;"><a href="<?php echo base_url();?>appoinment"><button class="btn btn-default">view</button></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div> 
			<div class="widget box">
				<div class="widget-header">
					<h4><i class="icon-reorder"></i>(<?php echo date('d-m-Y',strtotime("+2 days"));?>) Appointment&nbsp;</h4>
				</div>
				<div class="widget-content">
					<table class="table table-striped table-bordered ">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Date</th>
								<th>Appoinment No</th>
								<th>Name</th>
								<th>Time</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;
							foreach($dayt as $d) {?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $d['startdate'];?></td>
								<td><?php echo $d['appoinmentno'];?></td>
								<td><?php echo $d['customername'];?></td>
								<td><?php echo $d['starttime'];?></td>
								<td style="text-align: center;"><a href="<?php echo base_url();?>appoinment"><button class="btn btn-default">view</button></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div> 
		</div> 

				<div class="col-sm-6 ">
			<div class="widget box">
				<div class="widget-header">
					<h4><i class="icon-reorder"></i>Item</h4>
				</div>
				<div class="widget-content">
					<table class="table table-striped table-bordered ">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Item No</th>
								<th>Item Name</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i=1;
							foreach($item as $tr) 
								{?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $tr['itemno'];?></td>
								<td><?php echo $tr['itemname'];?></td>
								<td><?php echo $tr['price'];?></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div> 
		</div>
<!-- 
		<div class="col-sm-6 ">
			<div class="widget box">
				<div class="widget-header">
					<h4><i class="icon-reorder"></i>&nbsp;(<?php echo date('d-m-Y',strtotime("+1 day"));?>) Appointment&nbsp;</h4>
				</div>
				<div class="widget-content">
					<table class="table table-striped table-bordered ">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Date</th>
								<th>Appoinment No</th>
								<th>Name</th>
								<th>Time</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i=1;
							foreach($tomorrow as $tr) 
								{?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo date('d-m-Y',strtotime($tr['startdate']));?></td>
								<td><?php echo $tr['appoinmentno'];?></td>
								<td><?php echo $tr['customername'];?></td>
								<td><?php echo $tr['starttime'];?></td>
								<td style="text-align: center;"><a href="<?php echo base_url();?>appoinment"><button class="btn btn-default">view</button></a></td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div> 
		</div> -->

	</div> 
</div>
</div>



