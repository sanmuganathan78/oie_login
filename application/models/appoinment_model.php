<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appoinment_model extends CI_Model {

	public function add($data)
	{
		$this->db->insert('appoinment_detail',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

	
	public function select()
	{
		$this->db->select('*');
		$this->db->from('appoinment_detail');
		return $this->db->get()->result_array();
	}
}

