<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
	var $data;
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('DW-login') == false) {
			redirect(base_url('login'));
		} else {
			$this->load->library('encryption');
			$this->load->model("Login_model",'mLogin');
			$this->load->library('form_validation');
			$this->load->model("User_model",'mUser');
			$this->userId = $this->session->userdata("DW-userId");
			$this->profileData = $this->mUser->myProfile($this->userId);
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
	}

	public function index()
	{
		$data = $this->data;
		$data['title'] = 'Pengaturan';
		$data['tabTitle'] = 'DW | Pengaturan';
		$data['sidebarActive'] = 'pengaturan';
		$data['content'] = 'back/pengaturan';
		// $data['script'] = '';
		$data['role'] = $this->role;
		$this->load->view('back/index', $data);
	}
}
