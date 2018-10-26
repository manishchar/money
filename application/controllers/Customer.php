<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function index()
	{
		//$this->load->view('dashboard');
		$data['title']= "Add Customer";
		$data['page_title']= "Add Customer";
if(isset($_POST['save'])){
$this->form_validation->set_rules('fname', 'First Name', 'required');
$this->form_validation->set_rules('lname', 'Last Name', 'required');
$this->form_validation->set_rules('mobile', 'Mobile number', 'required');
$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('customer',$data);
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

				$this->db->trans_begin();
				if($this->db->insert('user',$user)){
					$this->session->set_flashdata('message','User Save Successfully');
				}else{
					$this->session->set_flashdata('error','User Save Failed');
				}
				if ($this->db->trans_status() === FALSE)
				{
				        $this->db->trans_rollback();
				}
				else
				{
				        $this->db->trans_commit();
				}
				redirect('customer');
			    //$this->load->view('formsuccess');
			}
		}else{
			$this->load->view('customer',$data);
		}
	}
	public function view_customer()
	{
		$data['title']= "View Customer";
		$data['page_title']= "View Customer";
		$data['customers']= $this->db->where('role_id',4)->get('user')->result();
		$this->load->view('view_customer',$data);
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
	public function addMoney(){
		//echo json_encode($_POST);
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$money = $this->input->post('money');

		$flag =$this->db->where('id',$id)->update('user',array('amount'=>$money));
		if($flag){
			$response = array('status'=>'success','message'=>'money add success');
		}else{
			$response = array('status'=>'failed','message'=>'money add failed');
		}
echo json_encode($response);
	}
}
