<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		//$this->load->view('dashboard');
		redirect('/welcome/dashboard');
	}

	public function purchase(){
		
		$userId = $this->input->post('userId');
		$goldId = $this->input->post('goldId');
		$buyQty = $this->input->post('buyQty');
		$gold_type = $this->input->post('gold_type');
		$purchaseAmount = $this->input->post('purchaseAmount');
		$remainingAmount = $this->input->post('remainingAmount');
		$user = userData($userId);
		if($gold_type == '1'){
			//gold
			$userUpdate = array(
				'amount'=>$remainingAmount,
				'gold'=>$user->gold+$buyQty
				);
			$head_id = '3';
		}else{
			//silver
			$userUpdate = array(
				'amount'=>$remainingAmount,
				'silver'=>$user->silver+$buyQty
				);
			$head_id = '4';
		}
		
	$purchase = array(
		'user_id'=>$userId,
		'gold_id'=>$goldId,
		'qty'=>$buyQty,
		'amount'=>$purchaseAmount,
		'created_date'=>date('Y-m-d h:m:s'),
	);

	$account[] = array(
		'user_id'=>$userId,
		'head_id'=>$head_id,
		'type'=>'dr',
		'amount'=>$purchaseAmount,
		'created_by'=>$this->session->userdata('login')['id'],
	);
	
	$account[] = array(
		'user_id'=>$userId,
		'head_id'=>'6',
		'type'=>'cr',
		'amount'=>$purchaseAmount,
		'created_by'=>$this->session->userdata('login')['id'],
	);

//echo json_encode($purchase);
//echo json_encode($account);die;
	$this->db->trans_begin();
	$this->db->insert_batch('account_entry',$account);
	$this->db->insert('purchase_detail',$purchase);
	$this->db->where('id',$userId)->update('user',$userUpdate);
	if ($this->db->trans_status() === FALSE)
	{
	    $this->db->trans_rollback();
	    $response = array('status'=>'failed','message'=>'Record Failed');
	}
	else
	{
	    $this->db->trans_commit();
	    $response = array('status'=>'success','message'=>'Record Save Successfully');
	}
	echo json_encode($response);
}
	public function getGoldPrice(){
		$type = $this->input->post("type");
		if($type == '1'){
			$result = getGold();
		}else if($type == '2'){
			$result = getSilver();
		}
		$data['gold'] =$result;
		//$data['user'] =$this->session->userdata('login')['id'];
		$data['user'] =userData($this->session->userdata('login')['id']);
		echo json_encode($data);
	}

	public function dashboard()
	{
		$data['title']= "Dashboard";
		$data['page_title']= "Dashboard";
		$this->load->view('dashboard');
	}
	public function member()
	{
		$data['roles'] = $this->db->where('active','1')->get('role')->result();
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
