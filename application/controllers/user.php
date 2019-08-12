<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('user_model');
		 if($this->session->userdata('login')=='')
		{
			
			redirect('login');
		}


	}


	public function index()
	{		

		$data['user']=$this->user_model->view_user();
		$this->load->view('header');
		$this->load->view('user',$data);
			$this->load->view('footer1');
	
	}


		public function insert()
	{
		
		$data=array(

				'name'=>$_POST['name'],
				'username'=>$_POST['username'],
				'password'=>$_POST['password'],
				'mobileno'=>$_POST['mobileno'],
				'email'=>$_POST['email'],

			'status'=>1);

		$result=$this->user_model->add($data);
		if($result==true)
		{

			$this->session->set_flashdata('msg','User added successfully');
			redirect('user');
		}
		else
		{
			$this->session->set_flashdata('msg1','User added unsuccessfully');
			redirect('user');
		}
	
	}

	public function view()
	{
		$data['user']=$this->user_model->view_user();
		$this->load->view('header');
		$this->load->view('user',$data);
			$this->load->view('footer');
		
	}
	public function update()
	{

		
		$id=$_POST['id'];
		$data=array(
				'name'=>$_POST['name'],
				'username'=>$_POST['username'],
				'password'=>$_POST['password'],
				'mobileno'=>$_POST['mobileno'],
				'email'=>$_POST['email'],

			'status'=>1);

		$result=$this->user_model->select($id,$data);
		if($result==true)
		{

			$this->session->set_flashdata('msg','User update successfully !');
			redirect('user');
		}
		else
		{
			$this->session->set_flashdata('msg1','No Changes !');
			redirect('user');
		}
	
	}


	public function delete()
	{
		$re=$this->input->post('id');
		$data=$this->db->where('id',$re)->delete('login');
		if($data)
		{
			$this->session->set_flashdata('msg','Deleted Succcessfully');
			redirect('user/view');
		}
		else
		{
			$this->session->set_flashdata('msg1','Deleted Unsucccessfully');
			redirect('user/view');
		}
	}

}
	

