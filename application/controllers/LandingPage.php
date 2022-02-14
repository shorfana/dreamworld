<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LandingPage extends CI_Controller
{
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->data = array(
			// 'header' => '',
			// 'navbar' => '',
			// 'sidebar' => '',
			// 'sidebarActive' => '',
			// 'myProfile' => ,
			// 'content' => '',
			// 'footer' => '',
			// 'js' => '',
			// 'title' => '',
			// 'tabTitle' => '',
			// 'alert' => ''
		);
	}

	public function index()
	{
		$data = $this->data;
		$data['title'] = 'LandingPage';
		$data['content'] = 'front/dashboard';
		$this->load->view('front/LandingPage');
	}
}
