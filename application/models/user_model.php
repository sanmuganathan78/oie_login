<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function add($data)
	{
		$this->db->insert('login',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

	public function view_user()
	{
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}


	public function head($re)
	{
		$this->db->select('*');
		$this->db->where('id',$re);
		$this->db->from('login');
		return $this->db->get()->result_array();
	}

	public function select($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('login',$data);
		return $this->db->affected_rows()!=1? false:true;
	}
}


