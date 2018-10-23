<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	// index controller
	public function index()
	{
		$this->load->view('login');
	}
	public function checkAuth(){
		redirect('welcome');
	}
}
