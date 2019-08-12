<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	public function select()
	{
		$this->db->select('*');
		$this->db->where('startdate',date('Y-m-d'));
		$this->db->from('appoinment_detail');
		return $this->db->get()->result_array();
	}
	public function head()
	{
		$this->db->select('*');
		$this->db->where('startdate',date('Y-m-d',strtotime("+1 day")));
		$this->db->from('appoinment_detail');
		return $this->db->get()->result_array();
	}
	public function add()
	{
		$this->db->select('*');
		$this->db->where('startdate',date('Y-m-d',strtotime("+2 days")));
		$this->db->from('appoinment_detail');
		return $this->db->get()->result_array();
	}

	public function item()
	{
		$this->db->select('*');
		$this->db->from('additem');
		return $this->db->get()->result_array();
	}
}

