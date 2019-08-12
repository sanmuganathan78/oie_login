<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		if($this->session->userdata('login')=='')
		{
			redirect('login');
		}
	}
	public function index()
	{	
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$this->db->where('status',1);
		$num=$this->db->get('additem')->result_array();
		@$cusid=$num[0]['itemno'];
		$count=count($cusid);
		if($count=='0')
		{
			$gg="I00001";     
			$sales_no= $gg;
		}
		else 
		{
			$old_user_no = str_split($cusid,2);
			@$va = (string)($old_user_no[1].$old_user_no[2].$old_user_no[3].$old_user_no[4].$old_user_no[5])+1; 
			@$sales_length = strlen($va);
			if(@$sales_length == 1)
			{
				$sales_no = "I0000".$va;  
			}
			else if(@$sales_length == 2)
			{
				$sales_no = "I000".$va;      
			}
			else if(@$sales_length == 3)
			{   
				$sales_no = "I00".$va;   
			}
			else if(@$sales_length == 4)
			{    
				$sales_no = "I0".$va; 
			}
		}
		$data['cusid']=$sales_no;

		$data['item']=$this->item_model->view_item();
		$this->load->view('header');
		$this->load->view('additem',$data);

		$this->load->view('footer1');
	}
	public function insert()
	{


		$data=array(
			'date'=>date('Y-m-d'),
			'category' =>$_POST['category'],
			'itemno' =>$_POST['itemno'],
			'itemname'=>$_POST['itemname'],
			'price' =>$_POST['price'],
			// 'vat' =>$_POST['vat'],
			'status'=>1);
		$result=$this->item_model->add($data);
		if($result==true)
		{
			$this->session->set_flashdata('msg','Item added successfully');
			redirect('item');
		}
		else
		{
			$this->session->set_flashdata('msg1','Item added unsuccessfully');
			redirect('item');
		}
	}
	public function view()
	{
		$data['item']=$this->item_model->view_item();
		$this->load->view('header');
		$this->load->view('additem',$data);
		$this->load->view('footer');
	}
	public function update()
	{
		$id=$_POST['id'];
		$data=array(
			'date'=>date('Y-m-d'),
			'category' =>$_POST['category'],
			'itemno' =>$_POST['itemno'],
			'itemname'=>$_POST['itemname'],
			'price' =>$_POST['price'],
			// 'vat' =>$_POST['vat'],
			'status'=>1);
		$result=$this->item_model->select($id,$data);
		if($result==true)
		{
			$this->session->set_flashdata('msg','Item update successfully');
			redirect('item');
		}
		else
		{
			$this->session->set_flashdata('msg1','No Changes  !');
			redirect('item');
		}
	}
	public function delete()
	{
		$re=$this->input->post('id');
		$data=$this->db->where('id',$re)->delete('additem');
		if($data)
		{
			$this->session->set_flashdata('msg','Deleted Succcessfully !');
			redirect('item');
		}
		else
		{
			$this->session->set_flashdata('msg1','Deleted Unsucccessfully');
			redirect('item');
		}
	}
}
