<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
		if($this->session->userdata('login')=='')
		{			
			redirect('login');
		}

	}


	public function index()
	{		
		$data['cus']=$this->customer_model->view_cus();
		$data['cusid']=$this->customer_model->get_customer_id();
		$this->load->view('header',$data);
		$this->load->view('addcustomer');
		$this->load->view('footer');

	}

	public function insert()
	{


		$result=$this->customer_model->add();
		if($result==true)
		{

			$this->session->set_flashdata('msg','Customer added successfully');
			redirect('customer');
		}
		else
		{
			$this->session->set_flashdata('msg1','Customer added unsuccessfully');
			redirect('customer');
		}
	}

	public function view()
	{
		$data['cus']=$this->customer_model->view_cus();
		$this->load->view('header');
		$this->load->view('customer_reports',$data);
		$this->load->view('footer1');

	}


	public function update()
	{

		$id=$_POST['id'];

		$customerid=$_POST['customerid'];
		$customername=$_POST['customername'];
		$mobileno=$_POST['mobileno'];
		$email=$_POST['email'];
		$location=$_POST['location'];
		$address=$_POST['address'];

		$data=array(

			'date'=>date('Y-m-d'),	
			'customerid'=>$customerid,
			'customername'=>$customername,
			'dob'=>date('Y-m-d',strtotime($_POST['dob'])),
			'anniversaryday'=>date('Y-m-d',strtotime($_POST['anniversaryday'])),
			
			'mobileno'=>$mobileno,
			'email'=>$email,
			'location'=>$location,
			'address'=>$address,
			'status'=>1
			);


		$result=$this->customer_model->select($id,$data);
		if($result==true)
		{

			$this->session->set_flashdata('msg','Customer details update successfully');
			redirect('customer/view');
		}
		else
		{
			$this->session->set_flashdata('msg1','No Changes !');
			redirect('customer/view');
		}
	}


	public function delete()
	{
		$re=$this->input->post('id');
		$data=$this->db->where('id',$re)->delete('addcustomer');
		if($data)
		{
			$this->session->set_flashdata('msg','Deleted Succcessfully !');
			redirect('customer/view');
		}
		else
		{
			$this->session->set_flashdata('msg1','Deleted Unsucccessfully');
			redirect('customer/view');
		}
	}

	
	public function view_birthday()
	{

		$data['birth']=$this->customer_model->birthday();
		$this->load->view('header');
		$this->load->view('view_birthday',$data);
		$this->load->view('footer1');

	}

	public function view_anniversaryday()
	{
		$data['anniversaryday']=$this->customer_model->anniversary();
		$this->load->view('header');
		$this->load->view('view_anniversaryday',$data);
		$this->load->view('footer');

	}


	public function birthday_search()
	{


		
		$data['birth']=$this->customer_model->birthday_search();

		$this->load->view('header');
		$this->load->view('view_birthday',$data);
		$this->load->view('footer');

	}

	
	public function anniversary_search()
	{


		
		$data['anniversaryday']=$this->customer_model->anniversary_search();
		$this->load->view('header');
		$this->load->view('view_anniversaryday',$data);
		$this->load->view('footer');

	}

	public function pdf()
	{
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];


		$data['birth']=$this->customer_model->birthday_search();
		$this->load->view('birthday_pdf',$data,$fromdate,$todate);
		
	}

	public function anniversary_pdf()
	{

		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
		
		$data['anniversaryday']=$this->customer_model->anniversary_search();
		$this->load->view('anniversaryday_pdf',$data,$fromdate,$todate);

	}

	public function check_name()
	{

		$number=$this->input->post('mobileno');
		$this->db->select('*');
		$this->db->from('addcustomer');
		$this->db->where('mobileno',$number);
		$query=$this->db->get();
		$result=$query->result();
		if($result)
		{
			echo"yes";
		}
		else
		{
			echo"no";
		}

	}
}

