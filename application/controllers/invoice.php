<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('invoice_model');
	}
	public function index()
	{	
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$this->db->where('status',1);
		$num=$this->db->get('invoice_detail')->result_array();
		@$cusid=$num[0]['invoiceno'];
		$count=count($cusid);
		if($count=='0')
		{
			$gg="I00001";     
			$sales_no= $gg;
		}
		else 
		{
			$old_user_no = str_split($cusid,2);
			@$va = (string)($old_user_no[1].$old_user_no[2].$old_user_no[3].$old_user_no[4].$old_user_no[5])+1; 
			@$sales_length = strlen($va);
			if(@$sales_length == 1)
			{
				$sales_no = "I0000".$va;  
			}
			else if(@$sales_length == 2)
			{
				$sales_no = "I000".$va;      
			}
			else if(@$sales_length == 3)
			{   
				$sales_no = "I00".$va;   
			}
			else if(@$sales_length == 4)
			{    
				$sales_no = "I0".$va; 
			}
		}
		$data['cusid']=$sales_no;
		$this->load->view('header');
		$this->load->view('invoice',$data);
		$this->load->view('footer');
	}
	public function insert()
	{

		$invoicedate=str_replace('/', '-', $_POST['invoicedate']);

		$inv=date('Y-d-m',strtotime($invoicedate));

		$vat=$_POST['vat'];
		if($vat)
		{
			$v=$vat;
		}
		else
		{
			$v='';
		}
		$grandtotal=$_POST['grandtotal'];
		$category=implode(',',($_POST['category'])); 
		$itemno=implode(',',($_POST['itemno'])); 
		$itemname=implode(',',($_POST['itemname'])); 
		$price=implode(',',($_POST['price'])); 
		$qty=implode(',',($_POST['qty'])); 
		$amount=implode(',',($_POST['amount'])); 
		$data=array(
			'date'=>date('Y-m-d'),
			'category' =>$category,
			'taxtype' =>$_POST['taxtype'],
			'invoiceno' =>$_POST['invoiceno'],
			'customername' =>$_POST['customername'],
			'mobileno' =>$_POST['mobileno'],
			'invoicedate' =>$inv,
			'address' =>$_POST['address'],
			'itemno' =>$itemno,
			'itemname' =>$itemname,
			'price' =>$price,
			'qty' =>$qty,
			'amount' =>$amount,
			'vat' =>$v,
			'vatamount' =>$_POST['vatamount'],
			'subtotal' =>$_POST['subtotal'],
			'discount' =>$_POST['discount'],
			'discountamount' =>$_POST['discountamount'],
			'adjustment' =>$_POST['adjustment'],
			'grandtotal' =>$grandtotal,
			'grandtotal1' =>$_POST['grandtotal1'],
			'grandtotal2' =>$_POST['grandtotal2'],
			'status'=>1);

		$codes=$this->input->post('itemname');
		$quantity=$_POST['qty'];
		

		$count=count($codes);

		 for($i = 0; $i< $count ; $i++)
			 {
			 	$this->db->where('itemname',$codes[$i]);
			 	$wq=$this->db->get('stock')->result(); //get quantity 
			 
			 	foreach($wq as $q)	

			 		{

			 	$balance1=$q->balanceqty-$quantity[$i]; 
			 
}
		
			 	$this->db->where('itemname',$codes[$i]);
			 	$this->db->update('stock',array('balanceqty'=>$balance1));
			 	$str = $this->db->last_query();
			 	
			 }


		if($_POST['save']=='save')
		{
			$result=$this->invoice_model->add($data); 
			if($result==true)
			{
				$this->session->set_flashdata('msg','Invoice added successfully!');
				redirect('invoice');
			}
			else
			{
				$this->session->set_flashdata('msg1','Invoice added unsuccessfully!');
				redirect('invoice');
			}
		}
		if($_POST['print']=='print')
		{
			$result=$this->invoice_model->add($data); 
			if($result==true)
			{
				$this->session->set_flashdata('msg','Invoice added successfully!');
				redirect('invoice/bill');
			}
			else
			{
				$this->session->set_flashdata('msg1','Invoice added unsuccessfully!');
				redirect('invoice/bill');
			}
		}
	}
	Public function get_name()
	{
		$mobileno=$this->input->post('mobileno');       
		$this->db->select('*');
		$this->db->from('addcustomer');
		$this->db->like('mobileno',$mobileno);
		$query = $this->db->get();
		$result = $query->result();
		$name       =  array();
		foreach ($result as $d) 
		{
			$json_array             = array();
			$json_array['value']    = $d->mobileno;
			$json_array['label']    = $d->mobileno;
			$name[]             = $json_array;		         
		}
		echo json_encode($name);
	}
	public function get_customername()
	{
		$customername=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('addcustomer');
		$this->db->where('customername',$customername);
		$query = $this->db->get();
		$result = $query->result();
		foreach($result as $s)
		{		
			$vob['mobileno']=$s->mobileno;
			$vob['address']=$s->address;
		}
		echo json_encode($vob);
	}
	public function get_mobileno()
	{
		$mobileno=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('addcustomer');
		$this->db->where('mobileno',$mobileno);
		$query = $this->db->get();
		$result = $query->result();
		foreach($result as $s)
		{		
			$vob['customername']=$s->customername;
			$vob['address']=$s->address;
		}
		echo json_encode($vob);
	}
	Public function get_itemname()
	{
		$itemname=$this->input->post('itemname');       
		$this->db->select('*');
		$this->db->from('additem');
		$this->db->like('itemname',$itemname);
		$query = $this->db->get();
		$result = $query->result();
		$name       =  array();
		foreach ($result as $d) 
		{
			$json_array             = array();
			$json_array['value']    = $d->itemname;
			$json_array['label']    = $d->itemname;
			$name[]             = $json_array;		         
		}
		echo json_encode($name);
	}
	Public function customername()
	{
		$customername=$this->input->post('customername');       
		$this->db->select('*');
		$this->db->from('addcustomer');
		$this->db->like('customername',$customername);
		$query = $this->db->get();
		$result = $query->result();
		$name       =  array();
		foreach ($result as $d) 
		{
			$json_array             = array();
			$json_array['value']    = $d->customername;
			$json_array['label']    = $d->customername;
			$name[]             = $json_array;		         
		}
		echo json_encode($name);
	}
	Public function get_itemno()
	{
		$itemno=$this->input->post('itemno');       
		$this->db->select('*');
		$this->db->from('additem');
		$this->db->like('itemno',$itemno);
		$this->db->limit(5);
		$query = $this->db->get();
		$result = $query->result();
		$name       =  array();
		foreach ($result as $d) 
		{
			$json_array             = array();
			$json_array['value']    = $d->itemno;
			$json_array['label']    = $d->itemno;
			$name[]             = $json_array;		         
		}
		echo json_encode($name);
	}
	
	public function itemno()
	{
		$itemno=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('additem');
		$this->db->where('itemno',$itemno);
		$query = $this->db->get();
		$result = $query->result();
		foreach($result as $s)
		{		
			$vob['itemname']=$s->itemname;
			$vob['price']=$s->price;
			$vob['category']=$s->category;
		}
		echo json_encode($vob);
	}

		public function category()
	{
		$cat=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('additem');
		$this->db->where('category',$cat);
		$query = $this->db->get();
		$result = $query->result();
		foreach($result as $s)
		{		
			$vob['itemno']=$s->itemno;
			$vob['itemname']=$s->itemname;
			$vob['price']=$s->price;
		}
		echo json_encode($vob);
	}


	public function itemname()
	{
		$itemname=$this->input->post('name');
		$this->db->select('*');
		$this->db->from('additem');
		$this->db->where('itemname',$itemname);
		$query = $this->db->get();
		$result = $query->result();
		foreach($result as $s)
		{		
			$vob['itemno']=$s->itemno;
			$vob['price']=$s->price;
			$vob['category']=$s->category;
		}
		echo json_encode($vob);
	}
	public function bill()
	{
		$data['bill']=$this->db->where('status',1)->order_by('id','desc')->limit(1)->get('invoice_detail')->result_array();
		foreach($data['bill'] as $b)
		{
			$number= $b['grandtotal'];
		}
		$no = round($number);
		$hundred = null;
		$digits_1 = strlen($no);
		$i = 0;
		$str = array();
		$words = array('0' => '', '1' => 'One', '2' => 'Two',
			'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
			'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
			'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
			'13' => 'Thirteen', '14' => 'Fourteen',
			'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
			'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
			'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
			'60' => 'Sixty', '70' => 'Seventy',
			'80' => 'Eighty', '90' => 'Ninety');
		$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		while ($i < $digits_1) {
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += ($divider == 10) ? 1 : 2;
			if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($number < 21) ? $words[$number] .
				" " . $digits[$counter] . $plural . " " . $hundred
				:
				$words[floor($number / 10) * 10]
				. " " . $words[$number % 10] . " "
				. $digits[$counter] . $plural . " " . $hundred;
			} 
			else $str[] = null;
		}
		$str = array_reverse($str);
		$result = implode('', $str);
		$data['fin']=$result;
		$this->load->view('invoice_bill',$data);
	}
	public function view()
	{
		$data['invoice']=$this->invoice_model->select();
		$this->load->view('header');
		$this->load->view('invoice_reports',$data);
		$this->load->view('footer1');
	}
	public function staff_view()
	{
		$data['staff']=$this->invoice_model->select();
		$this->load->view('header');
		$this->load->view('staff_reports',$data);
		$this->load->view('footer1');
	}
	public function search()
	{
		$data['invoice']=$this->invoice_model->search_invoice();
		$this->load->view('header');
		$this->load->view('invoice_reports',$data);
		$this->load->view('footer');
	}
	public function pdf()
	{
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
		$data['pdf']=$this->invoice_model->search_invoice();
		$this->load->view('pdf',$data,$fromdate,$todate);
	}
	public function get_invoiceno()
	{
		$taxtype=$this->input->post('taxtype');
		if($taxtype=='withtax')
		{
			$this->db->where('taxtype',$taxtype);
			$this->db->order_by('id','desc');
			$this->db->limit(1);
			$num=$this->db->get('invoice_detail')->result_array();
			@$cusid=$num[0]['invoiceno'];
			$count=count($cusid);
			if($count=='0')
			{
				$gg="I00001";     
				$sales_no= $gg;
			}
			else 
			{
				$old_user_no = str_split($cusid,2);
				@$va = (string)($old_user_no[1].$old_user_no[2].$old_user_no[3].$old_user_no[4].$old_user_no[5])+1; 
				@$sales_length = strlen($va);
				if(@$sales_length == 1)
				{
					$sales_no = "I0000".$va;  
				}
				else if(@$sales_length == 2)
				{
					$sales_no = "I000".$va;      
				}
				else if(@$sales_length == 3)
				{   
					$sales_no = "I00".$va;   
				}
				else if(@$sales_length == 4)
				{    
					$sales_no = "I0".$va; 
				}
			}
			echo $sales_no;
		}
		else if($taxtype=='withouttax')
		{
			$this->db->where('taxtype',$taxtype);
			$this->db->order_by('id','desc');
			$this->db->limit(1);
			$num=$this->db->get('invoice_detail')->result_array();
			@$cusid=$num[0]['invoiceno'];
			$count=count($cusid);
			if($count=='0')
			{
				$gg="W00001";     
				$sales_no= $gg;
			}
			else 
			{
				$old_user_no = str_split($cusid,2);
				@$va = (string)($old_user_no[1].$old_user_no[2].$old_user_no[3].$old_user_no[4].$old_user_no[5])+1; 
				@$sales_length = strlen($va);
				if(@$sales_length == 1)
				{
					$sales_no = "W0000".$va;  
				}
				else if(@$sales_length == 2)
				{
					$sales_no = "W000".$va;      
				}
				else if(@$sales_length == 3)
				{   
					$sales_no = "W00".$va;   
				}
				else if(@$sales_length == 4)
				{    
					$sales_no = "W0".$va; 
				}
			}
			echo $sales_no;
		}
	}

	
}
