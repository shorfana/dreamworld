<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		// $this->load->model("Login_model");
		$this->data = array(
			'header' => 'back/layout/header',
			// 'sidebarActive' => '',
			// 'myProfile' => $this->profileData,
			'content' => '',
			'footer' => 'back/layout/footer',
			'js' => 'back/layout/js',
			'alert' => 'back/layout/alert'
		);
	}

	public function index()
	{
		// $data = $this->data;
		// $data['title'] = 'Login';
		// $data['content'] = 'back/login';
		$this->load->view('back/login');
	}
}
