<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock extends CI_Controller {

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
		$data['sto']=$this->item_model->view_stock();
		$this->load->view('header');
		$this->load->view('stock',$data);
		$this->load->view('footer1');
	}
	public function insert()
	{


		$item=$this->db->where('category',$_POST['category'])->where('itemname',$_POST['itemname'])->get('stock')->result();
		if($item)
		{
			foreach($item as $i)
			{
				$qty=$i->qty;
				$id=$i->id;
			}
			$updateqty=$_POST['qty']+$qty;
			$itemname=$_POST['itemname'];
			$category=$_POST['category'];
			$data=array(
				'date'=>date('Y-m-d'),
				'category'=>$_POST['category'],
				'itemname'=>$_POST['itemname'],
				'qty'=>$updateqty,
				'balanceqty'=>$updateqty,
				'updateqty'=>$_POST['qty'],
				'status'=>1);
			$result=$this->item_model->stock_update($itemname,$category,$data);
			if($result==true)
			{
				$this->session->set_flashdata('msg','Stock Update successfully');
				redirect('stock');
			}
			else
			{
				$this->session->set_flashdata('msg1','Stock Update unsuccessfully');
				redirect('stock');
			}
		}
		else
		{
			$itemname=$_POST['itemname'];
			$category=$_POST['category'];
	
			$qty=$_POST['qty'];
			$data=array(
				'date'=>date('Y-m-d'),
				'itemname'=>$itemname,
				'category'=>$category,
				'qty'=>$qty,
				'balanceqty'=>$qty,
				'status'=>1);
			$result=$this->item_model->stock_insert($data);
			if($result==true)
			{
				$this->session->set_flashdata('msg','Stock added successfully');
				redirect('stock');
			}
			else
			{
				$this->session->set_flashdata('msg1','Stock added unsuccessfully');
				redirect('stock');
			}
		}
	}
	public function view()
	{
		$data['sto']=$this->item_model->view_stock();
		$this->load->view('header');
		$this->load->view('stock',$data);
		$this->load->view('footer');
	}

	public function update()
	{
		$id=$_POST['id'];
		$data=array(
			'category'=>$_POST['category'],
			'itemname'=>$_POST['itemname'],
			'qty'=>$_POST['qty'],
			'balanceqty'=>$_POST['balanceqty']);
		$result=$this->item_model->update($id,$data);
		if($result==true)
		{
			$this->session->set_flashdata('msg','Update successfully');
			redirect('stock');
		}
		else
		{
			$this->session->set_flashdata('msg1','Update unsuccessfully');
			redirect('stock');
		}
	}
	public function delete()
	{
		$del=$this->input->post('id');
		$data=$this->db->where('id',$del)->delete('stock');
		if($data)
		{
			$this->session->set_flashdata('msg','Stock deleted successfully !');
			redirect('stock/view');
		}
		else
		{	
			$this->session->set_flashdata('msg1','Stock deleted failed');
			redirerct('stock/view');
		}
	}

	Public function get_itemname()
	{
		$itemname=$this->input->post('itemname');       
		$this->db->select('*');
		$this->db->from('additem');
		$this->db->like('itemname',$itemname);
		$query = $this->db->get();
		$result = $query->result();
		$name       =  array();
		foreach ($result as $d) 
		{
			$json_array             = array();
			$json_array['value']    = $d->itemname;
			$json_array['label']    = $d->itemname;
			$name[]             = $json_array;		         
		}
		echo json_encode($name);
	}

	// public function category()
	// {
	// 	$category=$this->input->post('name');
	// 	$this->db->select('*');
	// 	$this->db->from('additem');
	// 	$this->db->where('category',$category);
	// 	$query = $this->db->get();
	// 	$result = $query->result();
	// 	foreach($result as $s)
	// 	{		
	// 		$vob['itemname']=$s->itemname;
			
	// 	}
	// 	echo json_encode($vob);
	// }
	Public function category()
	{

		$category=$this->input->post('name');
			$itemno=$this->db->where('category',$_REQUEST['name'])->get('additem')->result();
			if($itemno)
			{
				foreach($itemno as $s)
				{
				$data['value']=$s->itemname;
				$data['label']=$s->itemname;
				$json[]=$data;      
				}
				echo json_encode($json);
			} 
 }

}
