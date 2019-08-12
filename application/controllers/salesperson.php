<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salesperson extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		  $this->load->model('person_model');
		 if($this->session->userdata('login')=='')
		{
			
			redirect('login');
		}


	}


	public function index()
	{		
		$data['person']=$this->person_model->select();

		$this->load->view('header');
		$this->load->view('sales_person',$data);
			$this->load->view('footer1');
	
	}


		public function insert()
	{
		


		$data=array(

							'date'=>date('Y-m-d'),

				'personname'=>$_POST['personname'],

			'status'=>1);


		$result=$this->person_model->add($data);
		if($result==true)
		{

			$this->session->set_flashdata('msg','Sales Person added successfully');
			redirect('salesperson');
		}
		else
		{
			$this->session->set_flashdata('msg1','Sales Person added unsuccessfully');
			redirect('salesperson');
		}
	
	}

	

	public function view()
	{
		$data['person']=$this->person_model->select();
		$this->load->view('header');
		$this->load->view('sales_person',$data);
			$this->load->view('footer');
		
	}
	public function delete()
	{



		$del=$this->uri->segment(3);
$data=$this->db->where('id',$del)->delete('salesperson_detail');
	
		if($data)
		{
			$this->session->set_flashdata('msg','Sales person deleted successfully');
			redirect('salesperson');
		}
		else
		{
			$this->session->set_flashdata('msg1','Sales person deleted failed');
			redirect('salesperson');
		}
	}

}
	

