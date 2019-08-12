<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dailysales_model extends CI_Model {

	
	public function invoice_search()
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



        if(@$_POST['itemname'])
        {
        	$itemname=$_POST['itemname'];
        	$this->db->where("FIND_IN_SET('$itemname',itemname)<>",0);

        }

        return $query= $this->db->get('invoice_detail')->result_array();
       	}

        public function add($data1)
    {
        $this->db->insert('sales_return',$data1);
        return $this->db->affected_rows()!=1? false:true;
    }

    public function select()
    {
        $this->db->select('*');
        $this->db->from('sales_return');
        return $this->db->get()->result_array();
    }

}

