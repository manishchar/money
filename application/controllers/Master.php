<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	public function index()
	{
		//$this->load->view('dashboard');
		redirect('/welcome/dashboard');
	}
	public function gold()
	{
		$data['title']= "Add Gold";
		$data['page_title']= "Add Gold";
		$data['golds'] = $this->db->order_by('created_at','DESC')->get('gold')->result();
		if($this->input->post()){
$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('amount', 'Amount', 'required');
$this->form_validation->set_rules('qty', 'Quantity', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('add_gold',$data);
			}else{
				$name = $this->input->post('name');
				$amount = $this->input->post('amount');
				$qty = $this->input->post('qty');
				$type = $this->input->post('type');
				$gold = array(
					'gold_type'=>$type,
					'name'=>$name,
					'amount'=>$amount,
					'qty'=>$qty
				);
				if($this->db->insert('gold',$gold)){
					$this->session->set_flashdata('message','Record Add Successfully');
				}else{
					$this->session->set_flashdata('error','Record Save Failed');
				}
				redirect('master/gold');
			}
		}else{
			$this->load->view('add_gold',$data);
		}
	}


public function rd()
	{
		$data['title']= "Add RD";
		$data['page_title']= "Add RD";
		$data['rds'] = $this->db->get('mst_rd')->result();
		if($this->input->post()){
$this->form_validation->set_rules('rd_name', 'RD Name', 'required');
$this->form_validation->set_rules('rd_amount', 'RD Amount', 'required');
$this->form_validation->set_rules('rd_duration', 'RD Duration', 'required');
$this->form_validation->set_rules('rd_interest', 'RD Intrest', 'required');
$this->form_validation->set_rules('rd_principal', 'RD Principal', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('add_rd',$data);
			}else{
				$name = $this->input->post('rd_name');
				$amount = $this->input->post('rd_amount');
				$duration = $this->input->post('rd_duration');
				$interest = $this->input->post('rd_interest');
				$principal = $this->input->post('rd_principal');
				$rd = array(
					'name'=>$name,
					'amount'=>$amount,
					'duration'=>$duration,
					'interest'=>$interest,
					'principal'=>$principal
				);
				// print_r($rd);
				// die;
				if($this->db->insert('mst_rd',$rd)){
					$this->session->set_flashdata('message','Record Add Successfully');
				}else{
					$this->session->set_flashdata('error','Record Save Failed');
				}
				redirect('master/rd');
			}
		}else{
			$this->load->view('add_rd',$data);
		}
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
