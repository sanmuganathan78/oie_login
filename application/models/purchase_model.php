<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_model extends CI_Model {

	public function add($data)
	{
		$this->db->insert('purchase_detail',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

		public function select()
	{
		$this->db->select('*');
		$this->db->from('purchase_detail');
		return $this->db->get()->result_array();
	}
	        public function purchase_search()
    {
        if($this->input->post('fromdate')=='')
        {
            $fromdate='';
        }
        else
        {

        	$fromdate=str_replace('/', '-', $this->input->post('fromdate'));
        	$f=date('Y-m-d',strtotime($fromdate));


        }
        if($this->input->post('todate')=='')
        {
            $todate='';
        }
        else
        {
        	$todate=str_replace('/', '-', $this->input->post('todate'));
        	$t=date('Y-m-d',strtotime($todate));

        }
        if(@$fromdate)
        {
            $this->db->where('date >=',$f);
        }
        if(@$todate)
        {
            $this->db->where('date <=',$t);
        }
        return $query= $this->db->get('purchase_detail')->result_array();
    }

}

