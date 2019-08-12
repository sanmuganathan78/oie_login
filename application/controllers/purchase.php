<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('purchase_model');
		if($this->session->userdata('login')=='')
		{
			
			redirect('login');
		}

	}


	public function index()
	{	
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$this->db->where('status',1);
		$num=$this->db->get('purchase_detail')->result_array();

	
		@$userid=$num[0]['purchaseno'];

		$a=count($userid);


		if($a=='0')
		{
			$gg="P00001";     
			$new_user_no= $gg;

		}
		else 
		{
			$old_user_no = str_split($userid,2);
			@$va = (string)($old_user_no[1].$old_user_no[2])+1; 	
			@$user_length = strlen($va);	

			if(@$user_length == 1)
			{
				$new_user_no = "P0000".$va;  
			}
			else if(@$user_length == 2)
			{
				$new_user_no = "P000".$va;      
			}
			else if(@$user_length == 3)
			{   
				$new_user_no = "P00".$va;   
			}
			else if(@$user_length == 4)
			{    
				$new_user_no = "P0".$va; 
			}
		}
		$data['purchaseno']=$new_user_no;

	$this->load->view('header');
	$this->load->view('purchase',$data);
	$this->load->view('footer1');	
	}

	public function insert()
	{

		$itemname=implode(',',($_POST['itemname'])); 
		$price=implode(',',($_POST['price'])); 
		$qty=implode(',',($_POST['qty'])); 
		$amount=implode(',',($_POST['amount'])); 
		
		$data=array(
			'date'=>date('Y-m-d'),
			'purchaseno' =>$_POST['purchaseno'],
			'purchasedate' =>date('Y-m-d',strtotime($_POST['purchasedate'])),
			'suppliername' =>$_POST['suppliername'],
			'mobileno' =>$_POST['mobileno'],
			'location' =>$_POST['location'],
			'customername' =>$_POST['customername'],
			'address' =>$_POST['address'],
			'itemname' =>$itemname,
			'price' =>$price,
			'qty' =>$qty,
			'amount' =>$amount,
			'subtotal' =>$_POST['subtotal'],
			'grandtotal' =>$_POST['grandtotal'],
			'status'=>1);


		if($_POST['save']=='save')
		{
			$result=$this->purchase_model->add($data); 
			if($result==true)
			{
				$this->session->set_flashdata('msg','Purchase added successfully!');
				redirect('purchase');
			}
			else
			{
				$this->session->set_flashdata('msg1','Purchase  added unsuccessfully!');
				redirect('purchase');
			}
		}

			if($_POST['print']=='print')
		{
			      
			$result=$this->purchase_model->add($data); 
			if($result==true)
			{
				$this->session->set_flashdata('msg','Purchase bill added successfully!');
				redirect('purchase/bill');
			}
			else
			{
				$this->session->set_flashdata('msg1','Purchase bill added unsuccessfully!');
				redirect('purchase/bill');
			}
		}

	}

	public function view()
		{
			$data['pur']=$this->purchase_model->select();
			$this->load->view('header');
			$this->load->view('purchase_reports',$data);
			$this->load->view('footer1');
		}


		public function search()
	{
		$data['pur']=$this->purchase_model->purchase_search();
			$this->load->view('header');
			$this->load->view('purchase_reports',$data);
			$this->load->view('footer1');
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

			Public function get_mobileno()
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

		public function mobileno()
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
	public function pdf()
	{
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];


			$data['psd']=$this->purchase_model->purchase_search();
		$this->load->view('purchase_pdf',$data,$fromdate,$todate);
		
	}

}