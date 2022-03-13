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
        // $this->load->library('upload'    );
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


    // HOTEL
    // LOAD TABEL
    public function loadTabelHotel()
    {
        header('Content-Type: application/json');
        $data = $this->mHotel->indexHotel()->result();
        $json_data['data'] = $data;
        echo json_encode($json_data);
    }

    // SIMPAN HOTEL
    public function simpanHotel()
    {
        // header('Content-Type: application/json');
        if ($this->session->userdata("DW-login") == false) {
            redirect(base_url("problem/forbidden"));
        } else {
            $path = null;
            $config['upload_path'] = FCPATH . 'assets/back/img/hotel';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $config['file_name']        = $this->input->post('namaHotel');
            $config['overwrite']        = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $data = [
                    "nama_hotel" => $this->input->post('namaHotel'),
                    "id_kota" =>  $this->input->post('idKota'),
                    "harga_quad" => $this->input->post('hargaQuad'),
                    "harga_triple" => $this->input->post('hargaTriple'),
                    "harga_double" => $this->input->post('hargaDouble'),
                ];
                $this->mHotel->simpanHotel($data);
                // echo json_encode($data);
            } else {
                $namaGambar = $this->upload->data('file_name');
                $path = 'assets/back/img/hotel/' . $namaGambar;
                chmod($path, 0777);

                $data = [
                    "id_kota" =>  $this->input->post('idKota'),
                    "nama_hotel" => $this->input->post('namaHotel'),
                    "harga_quad" => $this->input->post('hargaQuad'),
                    "harga_triple" => $this->input->post('hargaTriple'),
                    "harga_double" => $this->input->post('hargaDouble'),
                    "gambar_hotel" => $namaGambar
                ];
                $this->mHotel->simpanHotel($data);
                // echo json_encode($data);
            }
        }
    }

    public function updateHotel()
    {
        header('Content-Type: application/json');
        if ($this->session->userdata("DW-login") == false) {
            redirect(base_url("problem/forbidden"));
        } else {
            $idHotel = $this->input->post('idHotel');

            $path = null;
            $config['upload_path'] = FCPATH . 'assets/back/img/hotel';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $config['file_name']        = $this->input->post('namaHotel');
            $config['overwrite']        = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $data = [
                    "id_kota" =>  $this->input->post('idKota'),
                    "nama_hotel" => $this->input->post('namaHotel'),
                    "harga_quad" => $this->input->post('hargaQuad'),
                    "harga_triple" => $this->input->post('hargaTriple'),
                    "harga_double" => $this->input->post('hargaDouble'),
                ];
                $this->mHotel->updateHotel($idHotel, $data);
                echo json_encode($data);
            } else {
                $namaGambar = $this->upload->data('file_name');
                $path = 'assets/back/img/hotel/' . $namaGambar;
                chmod($path, 0777);

                $data = [
                    "id_kota" =>  $this->input->post('idKota'),
                    "nama_hotel" => $this->input->post('namaHotel'),
                    "harga_quad" => $this->input->post('hargaQuad'),
                    "harga_triple" => $this->input->post('hargaTriple'),
                    "harga_double" => $this->input->post('hargaDouble'),
                    "gambar_hotel" => $namaGambar
                ];
                $this->mHotel->updateHotel($idHotel, $data);
                echo json_encode($data);
            }
        }
    }

    public function getHotel(){
        header('Content-Type: application/json');
        if ($this->session->userdata("DW-login") == false) {
            redirect(base_url("problem/forbidden"));
        } else {
            $idHotel =  $this->input->post('idHotel');
            $data = $this->mHotel->getHotel($idHotel);
            echo json_encode($data);
        }
    }

    public function hapusHotel()
    {
        header('Content-Type: application/json');
        if ($this->session->userdata("DW-login") == false) {
            redirect(base_url("problem/forbidden"));
        } else {
            $idHotel =  $this->input->post('idHotel');
            $this->mHotel->hapusHotel($idHotel);
        }
    }
}
