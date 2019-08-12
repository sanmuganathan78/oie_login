<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');

	}

	public function index()
	{
		$data['get']=$this->db->where('status',1)->get('addcustomer')->result_array();
		$data['get1']=$this->db->where('status',1)->get('additem')->result_array();
		$data['get2']=$this->db->where('status',1)->get('stock')->result_array();
		$data['get3']=$this->db->where('status',1)->get('invoice_detail')->result_array();


		$data['today']=$this->model->select();
		$data['tomorrow']=$this->model->head();
		$data['dayt']=$this->model->add();
		$data['item']=$this->model->item();

		$this->load->view('header');
		$this->load->view('content',$data);
		$this->load->view('footer');
	}
}

