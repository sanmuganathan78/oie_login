<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {




    Public function get_customer_id()
    {
       $num =  $this->db->order_by('id','desc')
                        ->limit(1)
                        ->where('status',1)
                        ->get('addcustomer')
                        ->result_array();

        @$cusid=$num[0]['customerid'];
        $count=count($cusid);

        if($count=='0')
        {
            $gg="C00001";     
            $sales_no= $gg;
        }
        else 
        {
            $old_user_no = str_split($cusid,2);
            @$va = (string)($old_user_no[1].$old_user_no[2].$old_user_no[3].$old_user_no[4].$old_user_no[5])+1; 
            @$sales_length = strlen($va);
            if(@$sales_length == 1)
            {
                $sales_no = "C0000".$va;  
            }
            else if(@$sales_length == 2)
            {
                $sales_no = "C000".$va;      
            }
            else if(@$sales_length == 3)
            {   
                $sales_no = "C00".$va;   
            }
            else if(@$sales_length == 4)
            {    
                $sales_no = "C0".$va; 
            }
        }


        return $sales_no;
    }

	public function add($data)
	{
        if($_POST['dob'])
        {
            $dob=date('Y-m-d',strtotime($_POST['dob']));
        }
        else
        {
            $dob='';
        }

        
        $customerid=$_POST['customerid'];
        $customername=$_POST['customername'];
        $mobileno=$_POST['mobileno'];
        $email=$_POST['email'];
        $location=$_POST['location'];
        $address=$_POST['address'];



        $data=array(

            'date'=>date('Y-m-d'),  
            'customerid'=>$customerid,
            'customername'=>$customername,
            'dob'=>$dob,
            'anniversaryday'=>date('Y-m-d',strtotime($_POST['anniversaryday'])),
            'mobileno'=>$mobileno,
            'email'=>$email,
            'location'=>$location,
            'address'=>$address,
            'status'=>1
            );


		$this->db->insert('addcustomer',$data);
		return $this->db->affected_rows()!=1 ? false:true;
	}

	public function view_cus()
	{
		$this->db->select('*');
		$this->db->from('addcustomer');
		return $this->db->get()->result_array();
	}



	public function select($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('addcustomer',$data);
		return $this->db->affected_rows()!=1? false:true;
	}

	public function birthday()
	{
		$this->db->select('*');
		$this->db->where('dob',date('Y-m-d'));
		$this->db->from('addcustomer');
		return $this->db->get()->result_array();
	}


	public function anniversary()
	{
		$this->db->select('*');
		$this->db->where('anniversaryday',date('Y-m-d'));
		$this->db->from('addcustomer');
		return $this->db->get()->result_array();
	}

	    public function birthday_search()
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
        return $query= $this->db->get('addcustomer')->result_array();
    }

        public function anniversary_search()
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
        return $query= $this->db->get('addcustomer')->result_array();
    }



}


