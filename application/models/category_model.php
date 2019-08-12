<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function add($data)
	{
		$this->db->insert('category_details',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

	public function select()
	{
		$this->db->select('*');
		$this->db->from('category_details');
		return $this->db->get()->result_array();
	}

		public function head($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('category_details',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

}

