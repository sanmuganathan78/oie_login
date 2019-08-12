<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model {

    public function add($data)
    {
        $this->db->insert('invoice_detail',$data);
        return $this->db->affected_rows()!=1? false:true;
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('invoice_detail');
        return $this->db->get()->result_array();
    }

    public function search_invoice()
    {
        if($this->input->post('fromdate')=='')
        {
            $fromdate='';
        }
        else
        {
            $fromdate=date('Y-m-d',strtotime($this->input->post('fromdate')));
        }
        if($this->input->post('todate')=='')
        {
            $todate='';
        }
        else
        {
            $todate=date('Y-m-d',strtotime($this->input->post('todate')));
        }
        if(@$fromdate)
        {
            $this->db->where('date >=',$fromdate);
        }
        if(@$todate)
        {
            $this->db->where('date <=',$todate);
        }
        return $query= $this->db->get('invoice_detail')->result_array();
    }


    
}

