<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('offer_model');
		if($this->session->userdata('oie_login')=='')
		{
			
			redirect('login');
		}

	}


	public function index()
	{	

		$data['offer']=$this->offer_model->select();

	$this->load->view('header');
	$this->load->view('offer',$data);
	$this->load->view('footer');	
	}

	public function insert()

	{

		$number=$this->db->get('addcustomer')->result();

		foreach($number as $m)

		{
			$mobileno[]=$m->mobileno;

		}

		$offer=$_POST['offer'];

		$n=implode(',',array_filter($mobileno));



		$data=array(

			'date'=>date('Y-m-d'),
			'offer'=>$offer,
			'status'=>1
			);

			$msg=$offer;

		$result=$this->offer_model->add($data); 
		if($result==true)
		{
			$authKey = "121743ApEp3CNGWhLQ57a814a6";
//Multiple mobiles numbers separated by comma
			$mobileNumber = $n;

//Sender ID,While using route4 sender id should be 6 characters long.
			$senderId = "OIESPA";
//Your message to send, Add URL encoding here.
			$message = urlencode($msg);
//Define route 
			$route = "4";
//Prepare you post parameters
			$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'message' => $message,
				'sender' => $senderId,
				'route' => $route
				);
//API URL
			$url="http://login.smscentral.in/api/sendhttp.php";
// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $postData
//,CURLOPT_FOLLOWLOCATION => true
				));
//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
			$output = curl_exec($ch);
//Print error if any
			if(curl_errno($ch))
			{
				echo 'error:' . curl_error($ch);
			}
			curl_close($ch);


			$this->session->set_flashdata('msg','Offer added successfully');
			redirect('offer');	
		}
		else
		{
			$this->session->set_flashdata('msg','Offer added unsuccessfully');
			redirect('offer');

		}
		}


		
		public function view()
	{
		$data['offer']=$this->offer_model->select();
		$this->load->view('header');
		$this->load->view('offer',$data);
			$this->load->view('footer');
		
	}
}
