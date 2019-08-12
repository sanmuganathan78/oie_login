<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('vat_model');
		if($this->session->userdata('login')=='')
		{
			
			redirect('login');
		}

	}


	public function index()
	{	
		$data['vat']=$this->vat_model->select();


	$this->load->view('header');
	$this->load->view('addvat',$data);
	$this->load->view('footer');	
	}

	public function insert()
	{

		$data=array(

				'date'=>date('Y-m-d'),
				// 'vatname'=>$_POST['vatname'],
				'vat'=>$_POST['vat'],
				// 'percentage'=>$_POST['vatname'].$_POST['vat'],
				'status'=>1);


		$result=$this->vat_model->add($data);
		if($result==true)
		{
			$this->session->set_flashdata('msg','Vat added successfully');
			redirect('vat');
		}
		else
		{
			$this->session->set_flashdata('msg','Vat added unsuccessfully');
			redirect('vat');
		}
	}


	
		public function view()
	{
		$data['vat']=$this->vat_model->select();
		$this->load->view('header');
		$this->load->view('addvat',$data);
			$this->load->view('footer');
		
	}

	public function delete()
	{



		$del=$this->uri->segment(3);
$data=$this->db->where('id',$del)->delete('vat_detail');
	
		if($data)
		{
			$this->session->set_flashdata('msg','Vat deleted successfully');
			redirect('vat');
		}
		else
		{
			$this->session->set_flashdata('msg1','Vat deleted failed');
			redirect('vat');
		}
	}



}