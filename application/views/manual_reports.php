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
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i>Manual Invoice Reports</h4>
			</div>
			<div class="widget-content">
				<form  method="post" action="<?php echo base_url();?>manual_invoice/search">
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
				<br>
				<br>
				<table class="table table-striped table-bordered table-hover table-checkable datatable">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Date</th>
							<th>Invoice No</th>
							<th>Customer Name</th>
							<th>Total Amount</th>
							<th>Paid Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=1;
						foreach ($invoice as  $row) 
							{?> 
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo date('d-m-Y',strtotime($row['invoicedate']));?></td>
							<td><?php echo $row['invoiceno'];?></td>
							<td><?php echo $row['customername'];?></td>
							<td><?php echo $row['grandtotal'];?></td>
<td><?php echo $row['grandtotal'];?></td>
<td class="center">
<div class="btn-group">
<button type="button" class="btn
btn-info dropdown-toggle waves-effect waves-light"
data-toggle="dropdown" aria-expanded="false">Manage <span
class="caret"></span></button>
<ul class="dropdown-menu"
role="menu" style="background: #1EBFB9 none repeat scroll
0% 0%;width:14px;min-width:100%;">

<!-- <li><a
href="<?php echo base_url().'invoice/edit/'.$row['id'];?>" class=""
data-animation="fadein" data-plugin="custommodal"
data-overlayspeed="100" data-overlaycolor="#36404a" style="color:
white; font-weight: bold; background-color: #1EBFB9" data-toggle="modal">Edit</a></li> -->

<li><a
href="<?php echo base_url().'manual_invoice/reprint/'.$row['id'];?>" class=""

target="_blank"
 style="color:
white; font-weight: bold; background-color: #1EBFB9">Print</a></li>

<!-- 
<li><a
href="#sales_delete<?php echo $row['id'];?>" class=""
data-animation="fadein" data-plugin="custommodal"
data-overlayspeed="100" data-overlaycolor="#36404a" style="color:
white; font-weight: bold; background-color: #1EBFB9;" data-toggle="modal">Delete</a></li> -->
</ul>
</div>

</td>
						</tr>
						<?php }
						?> 
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php if($_POST) {?>
<form name="form" method="post" action="<?php echo base_url();?>invoice/pdf" target="_blank" onsubmit="setTimeout(function () { location.href = '<?php echo base_url();?>invoice/view'; })">


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
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<!-- 			<td><input type="submit" class="btn btn-info" name="submit" value="Print Reports"></td>
 -->		</tr>



	</table>
</form>

<?php }?>



        <?php foreach($invoice as $row) { ?>
  <!-- Modal -->
  <div class="modal fade" id="sales_delete<?php echo $row['id'];?>" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Delete  Invoice</h4>
        </div>
        <div class="modal-body">
        <form name="form" action="<?php echo base_url();?>invoice/delete" method="post" id="form1">
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

 <script src="<?php echo base_url();?>assets/jquery.min.js"></script>


<script type="text/javascript">
    
$(document).ready(function(){



                                  window.print();



                                });

</script>
