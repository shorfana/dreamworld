<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    var $data;
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('form_validation');
        $this->load->model("Login_model", 'mLogin');
        $this->load->model("User_model", 'mUser');
        $this->load->model("Kota_model", 'mKota');
        $this->load->model("Hotel_model", 'mHotel');
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

    public function loadTabelKota()
    {
        header('Content-Type: application/json');
        $data = $this->mKota->indexKota()->result();
        $json_data['data'] = $data;
        echo json_encode($json_data);
    }

    public function simpanKota()
    {
        header('Content-Type: application/json');
        if ($this->session->userdata("DW-login") == false) {
            redirect(base_url("problem/forbidden"));
        } else {
            $value = [
                'nama_kota' => $this->input->post('namaKota'),
            ];
            $this->mKota->simpanKota($value);
        }
    }

    public function ubahKota()
    {
        header('Content-Type: application/json');
        if ($this->session->userdata("DW-login") == false) {
            redirect(base_url("problem/forbidden"));
        } else {
            $idKota =  $this->input->post('idKota');
            $namaKota = $this->input->post('namaKota');
            $this->mKota->editKota($idKota, $namaKota);
        }
    }

    public function hapusKota()
    {
        header('Content-Type: application/json');
        if ($this->session->userdata("DW-login") == false) {
            redirect(base_url("problem/forbidden"));
        } else {
            $idKota =  $this->input->post('idKota');
            $this->mKota->hapusKota($idKota);
        }
    }

    public function listKota()
    {
        header('Content-Type: application/json');
        if ($this->session->userdata("DW-login") == false) {
            redirect(base_url("problem/forbidden"));
        } else {
            $data = $this->mKota->indexKota()->result_array();
            echo json_encode($data);
        }
    }
}
