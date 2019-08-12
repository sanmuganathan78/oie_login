<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appoinment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('appoinment_model');
		if($this->session->userdata('login')=='')
		{
			redirect('login');
		}
	}
	public function index()
	{

		$data['app']=$this->appoinment_model->select();


		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$this->db->where('status',1);
		$num=$this->db->get('appoinment_detail')->result_array();
		@$cusid=$num[0]['appoinmentno'];
		$count=count($cusid);

		if($count=='0')
		{
			$gg="A00001";     
			$sales_no= $gg;
		}
		else 
		{
			$old_user_no = str_split($cusid,2);
			@$va = (string)($old_user_no[1].$old_user_no[2].$old_user_no[3].$old_user_no[4].$old_user_no[5])+1; 
			@$sales_length = strlen($va);
			if(@$sales_length == 1)
			{
				$sales_no = "A0000".$va;  
			}
			else if(@$sales_length == 2)
			{
				$sales_no = "A000".$va;      
			}
			else if(@$sales_length == 3)
			{   
				$sales_no = "A00".$va;   
			}
			else if(@$sales_length == 4)
			{    
				$sales_no = "A0".$va; 
			}
		}

		$data['cusid']=$sales_no;

		$this->load->view('header');
		$this->load->view('appoinment',$data);
		$this->load->view('footer');
	}

	public function insert()
	{
		$data=array(
			'date'=>date('Y-m-d'),	
			'appoinmentno' =>$_POST['appoinmentno'],
			'startdate' =>date('Y-m-d',strtotime($_POST['startdate'])),
			'starttime' =>$_POST['starttime'],
			'customername' =>$_POST['customername'],
			'mobileno' =>$_POST['mobileno'],
			// 'enddate' =>date('Y-m-d',strtotime($_POST['enddate'])),
			// 'endtime' =>$_POST['endtime'],
			// 'served' =>$_POST['served'],
			'staffname' =>$_POST['staffname'],
			'notes' =>$_POST['notes'],
			'status'=>1);

		$result=$this->appoinment_model->add($data);
		if($result==true)
		{
			$this->session->set_flashdata('msg','Appoinment added successfully');
			redirect('appoinment');
		}
		else
		{
			$this->session->set_flashdata('msg1','Appoinment added unsuccessfully');
			redirect('appoinment');
		}
	}

	public function view()
	{
		$data['app']=$this->appoinment_model->select();

		
		$this->load->view('header');
		$this->load->view('appoinment',$data);
		$this->load->view('footer');
	}
}

