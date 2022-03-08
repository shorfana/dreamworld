<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel extends CI_Controller
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
        $this->role = $this->session->userdata("DW-hakAkses");
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
        $data['title'] = 'List Hotel';
        $data['tabTitle'] = 'DW | List Hotel';
        $data['sidebarActive'] = 'hotel';
        $data['content'] = 'back/listHotel';
        $data['script'] = '../../assets/back/js/scrHotel';
        $data['role'] = $this->role;
        $this->load->view('back/index', $data);
    }
}
