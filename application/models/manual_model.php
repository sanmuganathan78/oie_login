<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manual_model extends CI_Model {

    public function add($data)
    {
        $this->db->insert('manual_invoice',$data);
        return $this->db->affected_rows()!=1? false:true;
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('manual_invoice');
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
            $this->db->where('invoicedate >=',$fromdate);
        }
        if(@$todate)
        {
            $this->db->where('invoicedate <=',$todate);
        }
        return $query= $this->db->get('manual_invoice')->result_array();
    }


    public function head($hk)
    {
        $this->db->select('*');
        $this->db->where('id',$hk);
        $this->db->from('manual_invoice');
        return $this->db->get()->result_array();
    }

    public function update_invoice($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('manual_invoice',$data);
        return $this->db->affected_rows()!=1? false:true;
    }
}

