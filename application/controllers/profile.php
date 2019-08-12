<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
		if($this->session->userdata('login')=='')
		{
			redirect('login');
		}
	}
	public function index()
	{

		
		$data['profile']=$this->profile_model->select();

		$this->load->view('header');
		$this->load->view('company_profile',$data);
		$this->load->view('footer');
	}
	public function insert()
	{

				$d=array(
					'softwarename' =>$_POST['softwarename'],
					'companyname' =>$_POST['companyname'],
					'phoneno' =>$_POST['phoneno'],
					'emailid' =>$_POST['emailid'],
					'tinno' =>$_POST['tinno'],
					'website' =>$_POST['website'],
					'address1' =>$_POST['address1'],
					'address2' =>$_POST['address2'],
					'city' =>$_POST['city'],
					'pincode' =>$_POST['pincode'],
					'cstno' =>$_POST['cstno'],
					'status'=>1);

			$data=$this->db->get('profile')->result();

			if($data!='')
			{
				$profile=$this->db->get('profile')->result();

				foreach ($profile as $a)
					$id=$a->id;
				
				
				$result=$this->profile_model->update($id,$d);

				if($result==true)
				{
					$this->session->set_flashdata('msg','Profile updated successfully');
				redirect('profile');
				}
				else
				{
					$this->session->set_flashdata('msg1','No changes');
				redirect('profile');	
				}

			}

			else
			{
				$result=$this->profile_model->insert($d);

				if($result==true)
				{
					$this->session->set_flashdata('msg','Profile added successfully');
				redirect('profile');
				}
				else
				{
					$this->session->set_flashdata('msg1','Profile added successfully');
				redirect('profile');	
				}
			}
	}


	public	function image_upload()
	{

	

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '102400KB';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '1000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{
			$error = array('error' => $this->upload->display_errors());


			$this->load->view('header');
			$this->load->view('profile', $error);
			$this->load->view('footer');


		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			foreach($data as $hh)
			{
				$file=$hh['file_name'];


			}
			$g=array('date'=>date('Y-m-d'),'file_name'=>$file,'status'=>1);
				
			$data=$this->db->get('image_detail')->result();

			if($data!='')
			{
				$profile=$this->db->get('image_detail')->result();

				foreach ($profile as $a)
					$id=$a->id;
				
				
				$result=$this->profile_model->upload_image($id,$g);

				if($result==true)
				{
					$this->session->set_flashdata('msg','Image updated successfully');
				redirect('profile');
				}
				else
				{
					$this->session->set_flashdata('msg1','No changes');
				redirect('profile');	
				}

			}

			else
			{
				$result=$this->profile_model->image($g);

				if($result==true)
				{
					$this->session->set_flashdata('msg','Image added successfully');
				redirect('profile');
				}
				else
				{
					$this->session->set_flashdata('msg1','Image added successfully');
				redirect('profile');	
				}
			}





			// if($result==true)
			// {
			// 	$this->session->set_flashdata('msg','Image added successfully');
			// 	redirect('profile');
			// }
			// else
			// {
			// 	$this->session->set_flashdata('msg1','Image added unsuccessfully');
			// 	redirect('profile');
			// }
		}
	
}



}

