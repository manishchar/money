<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	// index controller
	// index controller
	public function index()
	{
		$this->load->view('login');
	}
	public function checkAuth(){
		//print_r($_POST);
		$user = $this->db->where(array('email'=>$_POST['email'],'password'=>sha1($_POST['password'])))->get('user')->row();
		//echo $this->db->last_query();
		//print_r($user);
		//die;
		if(empty($user)){
			redirect('login');
		}else{
			$login = array(
				'id'=>$user->id,
				'email'=>$user->email,
				'role_id'=>$user->role_id,
				'fname'=>$user->fname,
			);
			$this->session->set_userdata('login',$login);
			redirect('welcome');
		}
		//redirect('welcome');
	}
	public function logout(){

		$this->session->unset_userdata('login');
		redirect('login');
	}
}
