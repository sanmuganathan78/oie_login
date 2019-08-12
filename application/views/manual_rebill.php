<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice</title>
<style>
body{ margin:0px; padding:0px; font-family:Arial, Helvetica, sans-serif;}
.wrapper{ margin:0px auto; padding:0px; width:700px;color:#000000;}
.cls{ clear:both}
.border{ border:1px solid #333; border-collapse: collapse;}
.border-top{ border-top:1px solid #333; border-collapse: collapse;}
.border-left{ border-left:1px solid #333; border-collapse: collapse;}
.border-right{ border-right:1px solid #333; border-collapse: collapse;}
.border-bottom{ border-bottom:1px solid #333; border-collapse: collapse;}
.padding{ padding:3px;}
.padding-left{ padding-left:10px;font-size:13px;color:#000000;}
.padding-right{ padding-right:10px;padding:4px;}
h1{ font-size: 10px;
    font-weight: bold;
    color: #000;
    text-align: left;
    text-transform: uppercase;}
h2{ font-size:15px; color:#000; font-weight:bold; line-height:25px; text-align:left;}
p{ font-size: 10px; color: #000; line-height: 12px;}
.title{}
.title h4{ font-size:10px; font-weight:bold; color:#000; line-height:15px; padding:0px; margin:0px; text-align:center; text-transform:uppercase; }
.infont-size{font-size:8px;}
.infont-size span{ line-height:18px; font-weight:bold; font-size:9px;}
.des{ color:#fff; font-size:13px;  color:#000; font-weight:bold; line-height:30px;}
.head{font-size:11px;}

</style>
</head>

<body>

<?php foreach($bill as $b) {?>


<?php $data=$this->db->get('profile')->result();

  foreach($data as $d)
 ?>
<div class="wrapper" style="margin-bottom:25px;margin-top:20px;">
<table width="100%" border="1" style="border-collapse:collapse;">
  <tr class="title">
    <td colspan="3" ><h4><strong style="font-size:14px;">Invoice</strong></h4></td>
    </tr>
  <tr>
    <td valign="top" rowspan="1" width="50%" class="padding" style="padding-top:0px;">
    <h1 style="margin-bottom:0px; padding-bottom:0px;"><?php echo $d->companyname;?></h1>
    <P style="margin-top:5px; margin-bottom:-5px;"><?php echo $d->address1;?>,<br>
      <?php echo $d->address2;?>,<br> 
           <strong>Mobile No</strong> : <?php echo $d->phoneno;?><br>

     <strong>E- mail</strong> : <?php echo $d->emailid;?><br>
     <strong>Website:</strong>
      <?php echo $d->website;?></P></td>
      
 <?php $logo=$this->db->order_by('id','desc')->limit(1)->get('image_detail')->result();

       if($logo)
       {
       foreach($logo as $l)
       {
          $m=$l->file_name;
        
       }
     }
     else
     {
        $m='idream.jpj';
     }?>
      <td height="30" colspan="2" valign="top" class="padding-left infont-size" style="text-align: center;">

  <img src="<?php echo base_url();?>uploads/<?php echo $m;?>" style="width:164px;height:76px;">
  </td>
  </tr>
    <tr>
    <td rowspan="4" valign="top" class="padding" style="padding-top:0px;">
      <h1 style="margin-bottom:0px; padding-bottom:0px;">To</h1>
      <P style="margin-top:5px; margin-bottom:-5px;"><?php echo $b['customername'];?>, 
      <br>
        <?php echo $b['mobileno'];?>,<br> 
         <?php echo $b['address'];?>, 
      </td>
    <td width="25%" height="30" valign="top" class="padding-left infont-size">
      <strong style="font-size:10px;margin-bottom:0px; padding-bottom:0px;">Invoice No</strong><br />
      <span style="font-size:10px;margin-bottom:0px; padding-bottom:0px;"><?php echo $b['invoiceno'];?></span>
      </td>
    <td width="25%" valign="top" class="padding-left infont-size"><b style="font-size:10px;">Date</b><br />
      <span style="font-size:10px;"><?php echo date('d-m-Y',strtotime($b['date']));?></span>
      </td>
  </tr>
  </table>
<table width="100%" border="1" height="200" style="border-collapse:collapse; border-top:none;color:#000000;">
  <tr class="title des head"  height="1px">
    <td width="9%" align="center" class="padding-left">S.No</td>
    <td width="27%" align="center" class="padding-left">Description of Goods</td>
    <td width="10%" align="center" class="padding-left">Qty</td>
    <td width="10%" align="center" class="padding-left">Rate</td>
    <td width="9%" align="center" class="padding-left">Amount</td>
  </tr>

<?php 


 foreach($bill as $v) {


            $itemname =explode(',',$v['itemname']);
            $unit =explode(',',$v['unit']); 
            $price =explode(',',$v['price']); 
            $qty =explode(',',$v['qty']); 
            $amount=explode(',',$v['amount']); 

            

//              $count=count($itemname);
//             for ($i=0; $i < $count; $i++) { 

//                 $j=$i+1;

 echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">1</td>
    <td  class="padding">'.$itemname[0].'</td>
    <td  align="right" class="padding">'.$qty[0].'</td>
    <td align="right" class="padding">'.$price[0].'</td>
    <td align="right" class="padding">'.$amount[0].'</td>
  </tr>'; 
  if(@$itemname['1']) 
  {
        echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">2</td>
    <td  class="padding">'.$itemname[1].'</td>
    <td  align="right" class="padding">'.$qty[1].'</td>
    <td align="right" class="padding">'.$price[1].'</td>
    <td align="right" class="padding">'.$amount[1].'</td>
  </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">&nbsp;</td>
    <td  class="padding"></td>
    <td  align="right" class="padding"></td>
    <td align="right" class="padding"></td>
    <td align="right" class="padding"></td>
  </tr>'; 
  }

    if(@$itemname[2]) 
  
  {
        echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">3</td>
    <td  class="padding">'.$itemname[2].'</td>
    <td  align="right" class="padding">'.$qty[2].'</td>
    <td align="right" class="padding">'.$price[2].'</td>
    <td align="right" class="padding">'.$amount[2].'</td>
  </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">&nbsp;</td>
    <td  class="padding"></td>
    <td  align="right" class="padding"></td>
    <td align="right" class="padding"></td>
    <td align="right" class="padding"></td>
  </tr>'; 
  }
      if(@$itemname[3]) 
  {
        echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">4</td>
    <td  class="padding">'.$itemname[3].'</td>
    <td  align="right" class="padding">'.$qty[3].'</td>
    <td align="right" class="padding">'.$price[3].'</td>
    <td align="right" class="padding">'.$amount[3].'</td>
  </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">&nbsp;</td>
    <td  class="padding"></td>
    <td  align="right" class="padding"></td>
    <td align="right" class="padding"></td>
    <td align="right" class="padding"></td>
  </tr>'; 
  }
        if(@$itemname[4]) 
  {
        echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">5</td>
    <td  class="padding">'.$itemname[4].'</td>
    <td  align="right" class="padding">'.$qty[4].'</td>
    <td align="right" class="padding">'.$price[4].'</td>
    <td align="right" class="padding">'.$amount[4].'</td>
  </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">&nbsp;</td>
    <td  class="padding"></td>
    <td  align="right" class="padding"></td>
    <td align="right" class="padding"></td>
    <td align="right" class="padding"></td>
  </tr>'; 
  }
          if(@$itemname[5]) 
  {
        echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">6</td>
    <td  class="padding">'.$itemname[5].'</td>
    <td  align="right" class="padding">'.$qty[5].'</td>
    <td align="right" class="padding">'.$price[5].'</td>
    <td align="right" class="padding">'.$amount[5].'</td>
  </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">&nbsp;</td>
    <td  class="padding"></td>
    <td  align="right" class="padding"></td>
    <td align="right" class="padding"></td>
    <td align="right" class="padding"></td>
  </tr>'; 
  }
          if(@$itemname[6]) 
  {
        echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">7</td>
    <td  class="padding">'.$itemname[6].'</td>
    <td  align="right" class="padding">'.$qty[6].'</td>
    <td align="right" class="padding">'.$price[6].'</td>
    <td align="right" class="padding">'.$amount[6].'</td>
  </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">&nbsp;</td>
    <td  class="padding"></td>
    <td  align="right" class="padding"></td>
    <td align="right" class="padding"></td>
    <td align="right" class="padding"></td>
  </tr>'; 
  }


//   }
   }
  ?>

  <tr style="font-size:11px;" >
<!--     <td align="right" class="padding-right"><strong><?php $s=array_sum($qty); 

    echo $s;?></strong></td> -->
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" class="padding-right">Sub Total</td>
    <td align="right" class="padding-left"><strong><?php echo $v['subtotal'];?></strong></td>
 
  </tr>

 <!--  <tr style="font-size:11px;" >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" class="padding-right"><strong></strong></td>
    <td align="right" class="padding-right">Dis&nbsp;(&nbsp;<?php echo $v['discount'];?>&nbsp;)&nbsp;</td>
    <td align="right" class="padding-left"><strong><?php echo $v['discountamount'];?></strong></td>
  </tr> -->


 <?php  
if($v['discount'])

{
  echo'
  <tr style="font-size:11px;" >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" class="padding-right"><strong></strong></td>
    <td align="right" class="padding-right">Dis&nbsp;(&nbsp;'.$v['discount'].'&nbsp;)&nbsp;</td>
    <td align="right" class="padding-left"><strong>'. $v['discountamount'].'</strong></td>
  </tr>';
}


?>


<?php  
if($v['adjustment'])

{
  echo'
  <tr style="font-size:11px;" >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" class="padding-right"><strong></strong></td>
    <td align="right" class="padding-right">Adjustment &nbsp;</td>
    <td align="right" class="padding-left"><strong>'. $v['adjustment'].'</strong></td>
  </tr>';
}


?>

<!-- <tr style="font-size:11px;" >
    <td align="right" class="padding-right"><strong></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

    <td align="right" class="padding-right">Adjustment</td>
    <td align="right" class="padding-left"><strong><?php echo $v['adjustment'];?></strong></td>
  </tr> -->
   <tr style="font-size:11px;" >
    <td align="right" class="padding-right"><strong></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

    <td align="right" class="padding-right">Grand Total</td>
    <td align="right" class="padding-left"><strong><?php echo $v['grandtotal'];?></strong></td>
  </tr>
    </table>
<table width="100%" border="1" style="border-collapse:collapse; border-top:none;" >
  <tr>
    <td colspan="7" style="padding-left:15px;">
    <div style="font-size:9px; margin-top:5px; line-height:20px;">Amount Chargeable (in words)</div>
      <strong style="font-size:10px;"><?php echo $fin;?>Rupees Only</strong><br /><br />
     <p> Local Sales Tax No. :<strong><?php echo $d->tinno;?></strong><br />
      <strong>Declaration</strong> :      Goods decribed and that all particulars are true and correct</p>
      </td>
         
    <td style="text-align:right; font-size:12px;" class="padding-right">for <strong><?php echo $d->companyname;?></strong><br /><br /><br />
      <strong style="font-size:9px;">Authorised Signatory</strong></td>
  </tr>
</table>
<div class="cls"></div>
</div>
<?php }?>


<!-- <div class="wrapper" style="margin-bottom:30px;margin-top:25px;">
<table width="100%" border="1" style="border-collapse:collapse;">
  <tr class="title">
    <td colspan="3" ><h4><strong style="font-size:14px;">Invoice</strong></h4></td>
    </tr>
  <tr>
    <td valign="top" rowspan="1" width="50%" class="padding" style="padding-top:0px;">
    <h1 style="margin-bottom:0px; padding-bottom:0px;"><?php echo $d->companyname;?></h1>
    <P style="margin-top:5px; margin-bottom:-5px;"><?php echo $d->address1;?>,<br>
      <?php echo $d->address2;?>,<br> 
     <strong>E- mail</strong> : <?php echo $d->emailid;?><br>
     <strong>Website:</strong>
      <?php echo $d->website;?></P></td>
      
 <?php $logo=$this->db->order_by('id','desc')->limit(1)->get('image_detail')->result();

       if($logo)
       {
       foreach($logo as $l)
       {
          $m=$l->file_name;

         
       }
     }
     else
     {
        $data['logo']='placeholder.png';
     }?>
      <td height="30" colspan="2" valign="top" class="padding-left infont-size" style="text-align: center;">

  <img src="<?php echo base_url();?>uploads/<?php echo $m;?>" style="width:164px;height:76px;">
  </td>
  </tr>
    <tr>
    <td rowspan="4" valign="top" class="padding" style="padding-top:0px;">
      <h1 style="margin-bottom:0px; padding-bottom:0px;">To</h1>
      <P style="margin-top:5px; margin-bottom:-5px;"><?php echo $b['customername'];?>, 
      <br>
        <?php echo $b['mobileno'];?>,<br> 
         <?php echo $b['address'];?>, 
      </td>
    <td width="25%" height="30" valign="top" class="padding-left infont-size">
      <strong style="font-size:10px;margin-bottom:0px; padding-bottom:0px;">Invoice No</strong><br />
      <span style="font-size:10px;margin-bottom:0px; padding-bottom:0px;"><?php echo $b['invoiceno'];?></span>
      </td>
    <td width="25%" valign="top" class="padding-left infont-size"><b style="font-size:10px;">Date</b><br />
      <span style="font-size:10px;"><?php echo date('d-m-Y',strtotime($b['date']));?></span>
      </td>
  </tr>
  </table>
<table width="100%" border="1" height="200" style="border-collapse:collapse; border-top:none;">
  <tr class="title des head"  height="1px">
    <td width="9%" align="center" class="padding-left">S.No</td>
    <td width="27%" align="center" class="padding-left">Description of Goods</td>
    <td width="10%" align="center" class="padding-left">Qty</td>
    <td width="10%" align="center" class="padding-left">Rate</td>
    <td width="9%" align="center" class="padding-left">Amount</td>
  </tr>
<?php foreach($bill as $v) {

            $itemname =explode(',',$v['itemname']);
            $unit =explode(',',$v['unit']); 
            $price =explode(',',$v['price']); 
            $qty =explode(',',$v['qty']); 
            $amount=explode(',',$v['amount']); 
            

            //  $count=count($itemname);
            // for ($i=0; $i < $count; $i++) { 

            //     $j=$i+1;

 echo'<tr  valign="top" style="font-size:11px;" height="1px">
    <td  align="center" class="padding">1</td>
    <td  class="padding">'.$itemname[0].'</td>
    <td  align="right" class="padding">'.$qty[0].'</td>
    <td align="right" class="padding">'.$price[0].'</td>
    <td align="right" class="padding">'.$amount[0].'</td>
  </tr>'; 

  if(@$itemname[1])
  {
          echo'<tr  valign="top" style="font-size:11px;" height="1px">
          <td  align="center" class="padding">2</td>
          <td  class="padding">'.$itemname[1].'</td>
          <td  align="right" class="padding">'.$qty[1].'</td>
          <td align="right" class="padding">'.$price[1].'</td>
          <td align="right" class="padding">'.$amount[1].'</td>
        </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
          <td  align="center" class="padding">&nbsp;</td>
          <td  class="padding"></td>
          <td  align="right" class="padding"></td>
          <td align="right" class="padding"></td>
          <td align="right" class="padding"></td>
        </tr>'; 
  }
   if(@$itemname[2])
  {
          echo'<tr  valign="top" style="font-size:11px;" height="1px">
          <td  align="center" class="padding">3</td>
          <td  class="padding">'.$itemname[2].'</td>
          <td  align="right" class="padding">'.$qty[2].'</td>
          <td align="right" class="padding">'.$price[2].'</td>
          <td align="right" class="padding">'.$amount[2].'</td>
        </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
          <td  align="center" class="padding">&nbsp;</td>
          <td  class="padding"></td>
          <td  align="right" class="padding"></td>
          <td align="right" class="padding"></td>
          <td align="right" class="padding"></td>
        </tr>'; 
  }
   if(@$itemname[3])
  {
          echo'<tr  valign="top" style="font-size:11px;" height="1px">
          <td  align="center" class="padding">4</td>
          <td  class="padding">'.$itemname[3].'</td>
          <td  align="right" class="padding">'.$qty[3].'</td>
          <td align="right" class="padding">'.$price[3].'</td>
          <td align="right" class="padding">'.$amount[3].'</td>
        </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
          <td  align="center" class="padding">&nbsp;</td>
          <td  class="padding"></td>
          <td  align="right" class="padding"></td>
          <td align="right" class="padding"></td>
          <td align="right" class="padding"></td>
        </tr>'; 
  }
   if(@$itemname[4])
  {
          echo'<tr  valign="top" style="font-size:11px;" height="1px">
          <td  align="center" class="padding">5</td>
          <td  class="padding">'.$itemname[3].'</td>
          <td  align="right" class="padding">'.$qty[3].'</td>
          <td align="right" class="padding">'.$price[3].'</td>
          <td align="right" class="padding">'.$amount[3].'</td>
        </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
          <td  align="center" class="padding">&nbsp;</td>
          <td  class="padding"></td>
          <td  align="right" class="padding"></td>
          <td align="right" class="padding"></td>
          <td align="right" class="padding"></td>
        </tr>'; 
  }
     if(@$itemname[5])
  {
          echo'<tr  valign="top" style="font-size:11px;" height="1px">
          <td  align="center" class="padding">6</td>
          <td  class="padding">'.$itemname[4].'</td>
          <td  align="right" class="padding">'.$qty[4].'</td>
          <td align="right" class="padding">'.$price[4].'</td>
          <td align="right" class="padding">'.$amount[4].'</td>
        </tr>'; 
  }
  else
  {
     echo'<tr  valign="top" style="font-size:11px;" height="1px">
          <td  align="center" class="padding">&nbsp;</td>
          <td  class="padding"></td>
          <td  align="right" class="padding"></td>
          <td align="right" class="padding"></td>
          <td align="right" class="padding"></td>
        </tr>'; 
  }

  }?>

  <tr style="font-size:11px;" >
<!--     <td align="right" class="padding-right"><strong><?php $s=array_sum($qty); 

     $s;?></strong></td> -->
<!--     <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" class="padding-right">Sub Total</td>
    <td align="right" class="padding-left"><strong><?php echo $v['subtotal'];?></strong></td>
  </tr>
  <?php $taxtype=$b['taxtype']; 
if($taxtype=='withtax')

{
  echo'<tr style="font-size:11px;" >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" class="padding-right"><strong></strong></td>
    <td align="right" class="padding-right">Vat&nbsp;(&nbsp;'.$v['vat'].'&nbsp;)&nbsp;</td>
    <td align="right" class="padding-left"><strong>'.$v['vatamount'].'</strong></td>
  </tr>

  <tr style="font-size:11px;" >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" class="padding-right"><strong></strong></td>
    <td align="right" class="padding-right">Dis&nbsp;(&nbsp;'.$v['discount'].'&nbsp;)&nbsp;</td>
    <td align="right" class="padding-left"><strong>'. $v['discountamount'].'</strong></td>
  </tr>';
}
?>


 <?php $taxtype=$b['taxtype']; 
if($taxtype=='withouttax')

{
  echo'
  <tr style="font-size:11px;" >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" class="padding-right"><strong></strong></td>
    <td align="right" class="padding-right">Dis&nbsp;(&nbsp;'.$v['discount'].'&nbsp;)&nbsp;</td>
    <td align="right" class="padding-left"><strong>'. $v['discountamount'].'</strong></td>
  </tr>';
}
?>
   <tr style="font-size:11px;" >
    <td align="right" class="padding-right"><strong></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

    <td align="right" class="padding-right">Grand Total</td>
    <td align="right" class="padding-left"><strong><?php echo $v['grandtotal'];?></strong></td>
  </tr>
    </table>
<table width="100%" border="1" style="border-collapse:collapse; border-top:none;" >
  <tr>
    <td colspan="7" style="padding-left:15px;">
    <div style="font-size:9px; margin-top:5px; line-height:20px;">Amount Chargeable (in words)</div>
      <strong style="font-size:10px;"><?php echo $fin;?>Rupees Only</strong><br /><br />
     <p> Local Sales Tax No. :<strong><?php echo $d->tinno;?></strong><br />
      <strong>Declaration</strong> :      Goods decribed and that all particulars are true and correct</p>
      </td>
         
    <td style="text-align:right; font-size:12px;" class="padding-right">for <strong><?php echo $d->companyname;?></strong><br /><br /><br />
      <strong style="font-size:9px;">Authorised Signatory</strong></td>
  </tr>
</table>
<div class="cls"></div>
</div>
 -->

</body>
</html>
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/jquery-1.10.2.min.js"></script>


<script type="text/javascript">
    
$(document).ready(function(){



                                  window.print();

                                  window.onfocus=function(){ window.close();}

                                });

</script>
