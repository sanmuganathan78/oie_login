<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		
	}


	public function index()
	{
		
		if($this->session->userdata('login')=='')
		{
			
			$this->load->view('login');
		}
		else
		{
			redirect('dashboard');
		}
	}


	public function validate()
	{

		
		$data=$this->login_model->add();
		 	$count=count($data);

		if($count==1)
		{
			foreach($data as $log)
			{
				$username=$log->username;
				$password=$log->password;
				$try=array
				(
					'username'=>$username,
					'password'=>$password,
					'remember'=>$_POST['remember'],

					'login'=>'true'
					);

				
				$this->session->set_userdata($try);
				redirect('dashboard');
			}
		}
		else
		{
			$this->session->set_flashdata('msg1','Username and Password Incorrect !');
			redirect('login');
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}


}

