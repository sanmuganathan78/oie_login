<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Tax extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         if($this->session->userdata('username')=='') {
            redirect('login');
        }
        $this->load->model('admin/Admin_model');

        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
          $data['vat']=$this->Admin_model->tax_select();
        $data['student']=$this->Admin_model->admin_tax_details();
        // print_r($datas);
        // exit;  
        $this->load->view('header');
        $this->load->view('tax');
        $this->load->view('footer');
    }

        Public function get_tax()
    {   

        
         $id=$_POST['tax_id'];

        // echo"<pre>";
        // print_r($id);

        $where=array('id'=>$_POST['tax_id']);
         $data = $this->db->get_where('vat_details',$where)->row();
         echo json_encode($data);

        

    }
    public function gettax()
    {
        $taxtype=$this->input->post('taxtype');
        $taxs=$this->db->where('taxpercentage',$taxtype)->get('vat_details')->result_array();
        // echo $this->db->last_query();
        // exit;
        if($taxs)
        {
            foreach ($taxs as $rows) 
            {
                $data['sgst']=$rows['sgst'];
                $data['cgst']=$rows['cgst'];
                $data['igst']=$rows['igst'];
            }
        }
        else
        {
                $data['sgst']='';
                $data['cgst']='';
                $data['igst']='';
        }

        echo json_encode($data); 
    }

    public function insert()
    {

        
        $data=
        array(
            'date'=>date('Y-m-d'),
            'taxtype' =>$_POST['taxtype'],
            'taxname' =>$_POST['taxname'],
            'taxpercentage'=>$_POST['taxtype'].' @ '.$_POST['taxname'].' %',
            'sgst' =>$_POST['sgst'],
            'cgst' =>$_POST['cgst'],
            'igst' =>$_POST['igst'],
            'status'=>1);
        $result=$this->Admin_model->add($data);
        // print_r($result);
        // exit; 
        if($result==true)
        {
            $this->session->set_flashdata('msg','Tax  Added Successfully!');
            redirect('admin/admin_tax');
        }
        else
        {
            $this->session->set_flashdata('msg1','Tax Added Unsuccessfully!');
            redirect('taxtype');
        }
        
    }
public function tax_details(){

        $this->load->view('includes/header');
        $this->load->view('admin/admin_taxreport');
        $this->load->view('includes/footer');
         

}
public function tax_edit(){

        $id=base64_decode($this->uri->segment(4));
        $data['row'] =$this->Admin_model->tax_edit_data($id);
        $this->load->view('includes/header');
        $this->load->view('admin/edit_tax',$data);
        $this->load->view('includes/footer');


    }

    // public function view()
    // {  
    //  $data['user']=$this->tax_model->select();
    //  $this->load->view('header');
    //  $this->load->view('addvat',$data);
    //  $this->load->view('footer1');
    // }

    // public function update()
    // {
    //  $id =$_POST['id'];
    //  $data=
    //  array(
    //      'date'=>date('Y-m-d'),
    //      'username' =>$_POST['username'],
    //      'name' =>$_POST['name'],
    //      'password' =>$_POST['password'],
    //      'status'=>1);
    //  $result=$this->user_model->user_update($id,$data); 
    //  if($result==true)
    //  {
    //      $this->session->set_flashdata('msg','User  Updated Successfully!');
    //      redirect('user');
    //  }
    //  else
    //  {
    //      $this->session->set_flashdata('msg1','No changes');
    //      redirect('user');
    //  }
    // }
    public function Tax_delete()
{
  $id=base64_decode($this->uri->segment(4));
  $data=array('status'=>0);
  
  $result=$this->Admin_model->delete_tax($data,$id);
  
// echo $this->db->last_query();
// exit;
  if($result) {

    $this->session->set_flashdata('msg', 'TAX deleted successfully!');
  } else {

    $this->session->set_flashdata('msg1', 'TAX not deleted!');

  }

redirect('admin/admin_tax');

}


    public function checkTax()
    {
        $taxtype = $this->input->post('taxtype');
        $taxname = $this->input->post('taxname');
        $checkExists=$this->db->where('taxname', $taxname)->where('taxtype', $taxtype)->count_all_results('vat_details');
        echo $checkExists;
    }
}

ob_flush();
?>
