<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		//$this->load->view('dashboard');
		redirect('/welcome/dashboard');
	}
	public function dashboard()
	{
		$this->load->view('dashboard');
	}
	public function member()
	{
		$data['roles'] = $this->db->get('role')->result();
		if($this->input->post()){
$this->form_validation->set_rules('fname', 'First Name', 'required');
$this->form_validation->set_rules('lname', 'Last Name', 'required');
$this->form_validation->set_rules('mobile', 'Mobile number', 'required');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('role_id', 'Role', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('member',$data);
			}
			else
			{
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$mobile = $this->input->post('mobile');
				$email = $this->input->post('email');
				$role_id = $this->input->post('role_id');

				$user = array(
					'role_id'=>$role_id,
					'fname'=>$fname,
					'lname'=>$lname,
					'mobile'=>$mobile,
					'email'=>$email,
					'password'=>sha1('123456'),

				);
				if($this->db->insert('user',$user)){
					$this->session->set_flashdata('message','User Save Successfully');
				}else{
					$this->session->set_flashdata('error','User Save Failed');
				}
				redirect('welcome/member');
			    //$this->load->view('formsuccess');
			}
		}else{
			$this->load->view('member',$data);
		}
	}
	public function member_view()
	{

		$data['members'] = $this->db->select('tab1.*,tab2.role_name')->join('role as tab2','tab1.role_id=tab2.id')->get('user as tab1')->result();
		$this->load->view('view_member',$data);
	}
}
