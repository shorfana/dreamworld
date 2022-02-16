<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model("Login_model");
		$this->load->library('form_validation');
		$this->load->model("User_model");
		$this->userId = $this->session->userdata("DW-userId");
		$this->profileData = $this->User_model->myProfile($this->userId);
		$this->role = $this->session->userdata("USF-hakAkses");
		$this->data = array(
			'header' => 'back/layout/header',
			'navbar' => 'back/layout/navbar',
			'sidebar' => 'back/layout/sidebar',
			// 'sidebarActive' => '',
			'myProfile' => $this->profileData,
			'content' => '',
			'footer' => 'back/layout/footer',
			'js' => 'back/layout/js',
			'alert' => 'back/layout/alert'
		);
	}

	public function index()
	{
		$data = $this->data;
		$data['title'] = 'Dashboard';
		$data['tabTitle'] = 'DW | Dashboard';
		$data['sidebarActive'] = 'dashboard';
		$data['content'] = 'back/dashboard';
		// $data['script'] = '';
		$data['role'] = $this->role;
		$this->load->view('back/index', $data);
	}
}
