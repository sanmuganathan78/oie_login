<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daily_sales extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('dailysales_model');

	}


	public function index()
	{	
		$data['sales']=$this->dailysales_model->select();

		

		$data['invoice_view']=$this->dailysales_model->invoice_search();
				$this->load->view('header');
		$this->load->view('daily_sales',$data);
		$this->load->view('footer1');
	}

	public function search()
	{

		 $data['invoice_view']=$this->dailysales_model->invoice_search();
			$this->load->view('header');
		$this->load->view('daily_sales',$data);
		$this->load->view('footer');
		
	}



	
	public function pdf()
	{
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
		 $data['daily_sales']=$this->dailysales_model->invoice_search();
		$this->load->view('daily_sales_pdf',$data,$fromdate,$todate);
		
	}
}
