<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends CI_Controller
{
    var $data;
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('DW-login') == false) {
            redirect(base_url('login'));
        } else {
            $this->load->library('encryption');
            $this->load->model('Login_model', 'mLogin');
            $this->load->model('User_model', 'mUser');
            $this->load->model('Kota_model', 'mKota');
            $this->load->library('form_validation');
            $this->userId = $this->session->userdata("DW-userId");
            $this->profileData = $this->mUser->myProfile($this->userId);
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
    }

    public function index()
    {
        $data = $this->data;
        $sqlIndex = $this->mKota->indexKota()->result();
        $data['title'] = 'List Kota';
        $data['tabTitle'] = 'DW | List Kota';
        $data['sidebarActive'] = 'kota';
        $data['content'] = 'back/listKota';
        $data['script'] = 'back/script/scrKota';
        $data['listKota'] = $sqlIndex;
        $data['role'] = $this->role;
        $this->load->view('back/index', $data);
    }

    public function editKota($idKota)
    {
        $data = $this->data;
        $data['title'] = 'Edit Kota';
        $data['tabTitle'] = 'DW | Edit Kota';
        $data['sidebarActive'] = 'kota';
        $data['content'] = 'back/editKota';
        $data['role'] = $this->role;
        $this->load->view('back/index', $data);
    }

    public function updateKota()
    {
    }

    public function deleteKota()
    {
    }
}
