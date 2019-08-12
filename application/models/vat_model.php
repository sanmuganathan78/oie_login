<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vat_model extends CI_Model {

	public function add($data)
	{
		$this->db->insert('vat_detail',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

		public function select()
	{
		$this->db->select('*');
		$this->db->from('vat_detail');
		return $this->db->get()->result_array();
	}

}

