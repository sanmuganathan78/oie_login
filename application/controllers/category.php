<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('category_model');
		if($this->session->userdata('login')=='')
		{
			
			redirect('login');
		}

	}


	public function index()
	{		
		
		$data['cat']=$this->category_model->select();

		$this->load->view('header');
		$this->load->view('category',$data);
		$this->load->view('footer1');

	}

	public function insert()
	{


		$data=array(
			'date'=>date('Y-m-d'),
			'category' =>$_POST['category'],
			'status'=>1);
		$result=$this->category_model->add($data);
		if($result==true)
		{
			$this->session->set_flashdata('msg','Category added successfully');
			redirect('category');
		}
		else
		{
			$this->session->set_flashdata('msg1','Category added unsuccessfully');
			redirect('category');
		}
	}

	public function update()
	{
		$id=$this->input->post('id');

		$data=array(
			'date'=>date('Y-m-d'),
			'category' =>$_POST['category'],
			'status'=>1);
		$result=$this->category_model->head($id,$data);
		if($result==true)
		{
			$this->session->set_flashdata('msg','Category update successfully');
			redirect('category');
		}
		else
		{
			$this->session->set_flashdata('msg1','Category update unsuccessfully');
			redirect('category');
		}
	}
		
public function delete()
	{
		$re=$this->input->post('id');
		$data=$this->db->where('id',$re)->delete('category_details');
		if($data)
		{
			$this->session->set_flashdata('msg','Deleted Succcessfully !');
			redirect('category');
		}
		else
		{
			$this->session->set_flashdata('msg1','Deleted Unsucccessfully');
			redirect('category');
		}
	}

}
