<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_return extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dailysales_model');
	}
	public function index()
	{	
		$this->load->view('header');
		$this->load->view('sales_return');
		$this->load->view('footer');
	}
	public function get_invoiceno()
	{
		$invoiceno=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('invoice_detail');
		$this->db->where('invoiceno',$invoiceno);
		$query = $this->db->get();
		$result = $query->result();
		foreach($result as $s)
		{		
			$vob['customername']=$s->customername;
			$vob['mobileno']=$s->mobileno;
			$vob['date']=date('d-m-Y',strtotime($s->date));
			$vob['address']=$s->address;
		}
		echo json_encode($vob);
	}
	Public function getable()
	{
		$invoiceno=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('invoice_detail');
		$this->db->where('invoiceno',$invoiceno);
		$query = $this->db->get();
		$result = $query->result_array();
		$html='<table class="responsive table" width="100%">
		<thead> 
			<tr>				
				<th>Item No</th>
				<th>Itemname</th>
				<th>Price</th>
				<th>Qty</th>
				<th>Amount</th>
				<th>Returns</th>
				<th>R_Amount</th>
			</tr>  
		</thead>
		<tbody>';
			foreach($result as $v)
			{
				$itemname =explode(',',$v['itemname']);
				$itemno =explode(',',$v['itemno']);
				$unit =explode(',',$v['unit']); 
				$price =explode(',',$v['price']); 
				$qty =explode(',',$v['qty']); 
				$amount=explode(',',$v['amount']); 




				$vat=$v['vat']; 
				$vatamount=$v['vatamount']; 
				$subtotal =$v['subtotal']; 
				$discount=$v['discount'];
				$discountamount=$v['discountamount']; 
				$adjustment=$v['adjustment']; 
				$grandtotal=$v['grandtotal']; 
				$grandtotal1=explode(',',$v['grandtotal1']); 
				$returnstatus=explode(',',$v['returnstatus']); 
				$count=count($itemname);
				for ($i=0; $i < $count; $i++) { 
					$j=$i+1;
					if(@$returnstatus[$i]==""){
						$totalamount[]=$amount[$i];
					$html .='<tr  valign="top" style="font-size:11px;" height="1px">
					
					<td><input name="itemno[]" class="form-control change" style="width:107px;" id="itemno"  value="'.$itemno[$i].'"> 
						<div id="itemno_valid"></div>
					</td>
					<td> <input name="itemname[]" class="form-control change" style="width:113px;" id="itemname" readonly value="'.$itemname[$i].'">
						<div id="itemname_valid"></div>
					</td>
					<td> <input name="price[]" class="form-control change" style="width:113px;" id="price'.$j.'" value="'.$price[$i].'" readonly>
					</td>
					<td><input name="qty[]" class="form-control change" style="width:60px;" id="qty" value="'.$qty[$i].'">
						<div id="qty_valid"></div>
					</td> 
					<td><input name="amount[]" class="form-control change" style="width:113px;" id="amount" value="'.$amount[$i].'"  readonly>
					</td>
					<td><input name="returnqty[]" class="form-control " style="width:70px;" id="returnqty'.$j.'" >						
					</td> 
						<td><input name="returnamount[]" class="form-control " style="width:123px;" id="returnamount'.$j.'" style="width:107px;">						
					</td> 
					
								
				</tr>'; 
			}	

			else
			{
				$totalamount[]=0;
			}
			}

					$amo=array_sum($totalamount);
			 $amou=number_format($amo,2);
			$vat1=$v['taxtype'];
			if($vat1=='withtax')
			{
				$cal_amount=$amo*($v['vat']/100);
				$cal_amo=number_format($cal_amount,2);
				 $vat_amountss=$cal_amount+$amo;
				 
			}
			else
			{	
				$cal_amount="";
				 $vat_amountss=$amo;
				

			}

			 $dis=$vat_amountss*($v['discount']/100);
			 $discou=number_format($dis,2);
			   $g_total=$vat_amountss-$dis;


			   $t=number_format($g_total,2);
			


				$html .='<input type="hidden" name="returnid" value="'.$v['id'].'">';
		}

		$html  .='<tr  valign="top" style="font-size:11px;" height="1px"><input type="hidden" id="count" value="'.$count.'">
		<td  align="center" class="padding"></td>
		<td  class="padding"></td>
		<td  align="right" class="padding"></td>
		<td align="right" class="padding"></td>
		<td align="right" class="padding"></td>
		<td  align="right" class="padding"></td>
		<td align="right" type="text" name="grandtotal" class="padding"><b></b></strong></td>
	</tr></table>
<table align="right">
<tr>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td>
	<td>Sub Total </td>
                             
	<td><div class="col-sm-4"><input type="text"  class="form-control" name="grandtotal" id="grandtotal" style="width:153px;" readonly value="'.$amou.'"></div></td>
	<td>

	<input type="text"  class="form-control " placeholder="Return Amount" name="returnsubtotal" id="returnsubtotal" style="width:120px;" readonly ></div></td>

</tr>';

if($v['taxtype']=="withtax")
{
$html .='<tr>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td> 
<td>Vat </td>                          
	<td>
	<div class="col-sm-4">
	<input name="vat" class="form-control change" style="width:55px;"  id="vat"  value="'.$vat.'" readonly></div>
	<div class="col-sm-5"><input name="vatamount" class="form-control change" style="width:80px;"  value="'.$cal_amo.'" id="vatamount" readonly>
	</div>
	</div>            
	
</td>
	<td>                        
	<input name="returnvatamount" class="form-control change" style="width:120px;"  id="returnvatamount" readonly>	
</td>
</tr>';
}
$html .='<tr>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td> 
<td>Discount</td>  	 
<td>                         
	<div class="col-sm-4"><input name="discount" class="form-control change" style="width:55px;" id="discount"  value="'.$discount.'" readonly></div><div class="col-sm-7"><input name="vatamount" class="form-control change" style="width:80px;" value="'.$discou.'" id="vatamount" readonly></div>
	
	</td>
<td><input name="returndiscountamount" class="form-control change" style="width:120px;"  id="returndiscountamount" readonly></td>
<tr>
<tr>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;</td> 
<td>Grand Total</td> 
	                          
	<td><div class="col-sm-4"><input type="text"  class="form-control" name="grandtotal" id="grandtotal" style="width:153px;" readonly value="'.$t.'"></div></td>
	<input type="hidden"  class="form-control" name="grandtotal1" id="grandtotal1">

	<td><input type="text"  class="form-control" name="returngrandtotal" style="width:120px;" id="returngrandtotal" readonly >

	</td>
</table>';
foreach($result as $l){
	$itemname =explode(',',$v['itemname']);
		$count12=count($itemname);
				for ($k=0; $k < $count12; $k++) { 
					$z=$k+1;

$html .='<script>
	$("#returnqty'.$z.'").keyup(function(){
		var qty=$(this).val();
		var price=$("#price'.$z.'").val();
		if(qty>0)
		{
			var amount=parseFloat(qty)*parseFloat(price);
			var fin=amount.toFixed(2);
			$("#returnamount'.$z.'").val(fin);
			var sub_tot=0;

			$("input[name^=returnamount]").each(function(){

				sub_tot +=Number($(this).val()); 
				var fina=sub_tot.toFixed(2);
				$("#returnsubtotal").val(fina);
				var vat=$("#vat").val();
				if(vat > 0)
				{
					var h1=parseFloat(fina)*parseFloat(vat/100);
					var h2=h1.toFixed(2);
					$("#returnvatamount").val(h2);
					var add=parseFloat(fina)+parseFloat(h2);
					var g_total=add.toFixed(2);
					$("#returngrandtotal").val(g_total);
					$("#grandtotal1").val(g_total);

				}
				else
				{
					$("#returngrandtotal").val(fina);
					$("#grandtotal1").val(fina);
				}
				var discount=$("#discount").val();
				var grandtotal1=$("#grandtotal1").val();
				if(discount > 0)
				{
					var h12=parseFloat(grandtotal1)*parseFloat(discount/100);
					var h3=h12.toFixed(2);
					$("#returndiscountamount").val(h3);
					var add1=parseFloat(grandtotal1)-parseFloat(h3);
					var g_total1=add1.toFixed(2);
					$("#returngrandtotal").val(g_total1);

				}
				else
				{
					$("#returngrandtotal").val(fina);
				}

				

			});


		}

	});

</script>';
}
}
echo $html;
}
Public function invoiceno()
{
	$invoiceno=$this->input->post('invoiceno');       
	$this->db->select('*');
	$this->db->from('invoice_detail');
	$this->db->like('invoiceno',$invoiceno);
	$query = $this->db->get();
	$result = $query->result();
	$name       =  array();
	foreach ($result as $d) 
	{
		$json_array             = array();
		$json_array['value']    = $d->invoiceno;
		$json_array['label']    = $d->invoiceno;
		$name[]             = $json_array;		         
	}
	echo json_encode($name);
}

Public function returns()
{
	
	$name=$_REQUEST['itemname'];
		 $returnqty=$_REQUEST['returnqty'];

	  $cont=count($name);
	 for($i=0;$i < $cont;$i++)
	 {
		if($returnqty[$i]!='')
			{
				 $stockget=$this->db->where('itemname',$name[$i])->get('stock')->result();
				 foreach($stockget as $key)
				


				 
					$qty=$returnqty[$i];

					 $updataqty=$key->balanceqty+$qty;
					 $data=array('balanceqty'=>$updataqty);

					

				$this->db->where('itemname',$name[$i])->update('stock',$data);
			}	

						
	}
					$returngrandtotal=$_REQUEST['returngrandtotal'];
		$returnid=$_REQUEST['returnid'];
		$invoiceno=$_REQUEST['invoiceno'];


	$invoice1=$this->db->where('id',$returnid)->where('invoiceno',$invoiceno)->get('invoice_detail')->result();

	foreach($invoice1 as $c)
	{

		$grandtotal1=$c->grandtotal;
	}




	$total1=$grandtotal1-$returngrandtotal;

	$returnid=$_REQUEST['returnid'];
	$returnqty=implode(',',$_REQUEST['returnqty']);
	$da=array('returnstatus'=>$returnqty);
	$this->db->where('id',$returnid)->update('invoice_detail',$da);


					$invoiceno=$_REQUEST['invoiceno'];
					$customername=$_REQUEST['customername'];
					$mobileno=$_REQUEST['mobileno'];
					$invoicedate=$_REQUEST['invoicedate'];
					$address=$_REQUEST['address'];
					$itemname=implode(',',$_REQUEST['itemname']);
					$itemno=implode(',',$_REQUEST['itemno']);
					$price=implode(',',$_REQUEST['price']);
					$qty=implode(',',$_REQUEST['qty']);



					
					$amount=implode(',',$_REQUEST['amount']);
					 $returnqty=implode(',',$_REQUEST['returnqty']);
					$returnamount=implode(',',$_REQUEST['returnamount']);
					$returnid=$_REQUEST['returnid'];
					$grandtotal=$_REQUEST['grandtotal'];
					$returnsubtotal=$_REQUEST['returnsubtotal'];
					$vatamount=$_REQUEST['vatamount'];
					if(@$_POST['returnvatamount'])
					{
						$returnvatamount=$_REQUEST['returnvatamount'];
					}
					else
					{
						$returnvatamount="";
					}



					$discount=$_REQUEST['discount'];
					$returndiscountamount=$_REQUEST['returndiscountamount'];
					$grandtotal1=$_REQUEST['grandtotal1'];
					$returngrandtotal=$_REQUEST['returngrandtotal'];
					$grandtotal=$_REQUEST['grandtotal'];




					$data1=array(   

		'invoiceno' => $invoiceno,
		'customername' =>$customername,
		'mobileno' =>$mobileno,
		'invoicedate' =>$invoicedate,
		'address' => $address,
		'itemno' =>$itemno,
		'itemname' =>$itemname,
		'price' => $price,
		'qty' =>$qty,
		'amount' => $amount,
		'returnqty' =>$returnqty,
		'returnamount' =>$returnamount,
		'grandtotal' =>$grandtotal,
		'returnsubtotal' =>$returnsubtotal,
		'discount' =>$discount,
		'vatamount' =>$vatamount,
		'returndiscountamount' =>$returndiscountamount,
		'grandtotal1' =>$grandtotal,
		'returngrandtotal' =>$returngrandtotal,
		'return' =>$_REQUEST['return'],
		'reason' =>$_REQUEST['reason'],
		'totalamount' =>$total1,
		'status'=>0);

					
				$result=$this->dailysales_model->add($data1); 
				if($result==true)
				{
					$this->session->set_flashdata('msg','Sales return  added Successfully!');
					redirect('sales_return');
				}
				else
				{
					$this->session->set_flashdata('msg1','Sales return added unSuccessfully!');
					redirect('sales_return');
				}


}
}
