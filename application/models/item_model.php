<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_model extends CI_Model {

	public function add($data)
	{
		$this->db->insert('additem',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

	public function view_item()
	{
		$this->db->select('*');
		$this->db->from('additem');
		return $this->db->get()->result_array();
	}



	public function select($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('additem',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

	public function stock_insert($data)
	{
		$this->db->insert('stock',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

	public function stock_update($itemname,$category,$data)
	{
		$this->db->where('itemname',$itemname);
		$this->db->where('category',$category);
				$this->db->update('stock',$data);
				return $this->db->affected_rows()!=1? false:true;
	}

	public function view_stock()
	{
		$this->db->select('*');
		$this->db->from('stock');
		return $this->db->get()->result_array();
	}

		public function update($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('stock',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

}


