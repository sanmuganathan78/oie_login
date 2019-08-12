
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Oie Unisex Spa</title>
<style>
body{
 	font-family: Arial, Helvetica, sans-serif;
}
.padding .heading1 {
    padding: 8px;
	font-size:15px;
}
.padding {
    padding: 8px;
	font-size:12px;
}
.heading2 {
	padding: 6px;
    font-size: 13px;
    font-weight: bold;
}
</style>
</head>
<body>



<div align="center">
  <table width="600" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
    <tr style="border-bottom: 1px dotted #000;
    border-top: 1px dotted #000;">
      <td class="heading1" width="316"><div align="center"><strong>Daily Sales Reports</strong></div></td>
      <td class="padding" width="150">From Date :<?php  echo date('d-m-Y',strtotime($this->input->post('fromdate')));?></td>
      <td class="padding" width="134">To Date : <?php  echo date('d-m-Y',strtotime($this->input->post('todate')));?></td>
    </tr>
  </table>
</div>
<div align="center">
  <table width="600" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
    <tr style="border-bottom: 1px dotted #000;">
      <td class="heading2">S.No</td>
      <td class="heading2">Date</td>
      <td class="heading2">invoice No</td>
      <td class="heading2">Customername</td>
      <td class="heading2">Total Amount</td>
      <td class="heading2">Paid Amount</td>
    </tr>

<?php   $count=1; foreach($daily_sales as $p) {


		$date=$p['date'];
		 $invoiceno=$p['invoiceno'];
		 $customername=$p['customername'];
		$grandtotal=$p['grandtotal'];

		



    echo'<tr>
      <td class="padding" valign="top">'.$count++.'</td>
      <td class="padding" valign="top">'.$date.'</td>
      <td class="padding" valign="top">'.$invoiceno.'</td>
      <td class="padding" valign="top">'.$customername.'</td>
      <td class="padding" valign="top">'.$grandtotal.'</td>
      <td class="padding" valign="top">'.$grandtotal.'</td>
    </tr>';
    }?>
   
   
  </table>
</div>
</body>
</html>
