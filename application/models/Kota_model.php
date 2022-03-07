<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kota_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function indexKota()
    {
        return $this->db->get('kota');
    }

    public function simpanKota($value)
    {
        $this->db->insert('kota', $value);
    }

    public function editKota($idKota, $namaKota)
    {
        $data = array('nama_kota' => $namaKota);
        $this->db->where('id_kota', $idKota);
        $this->db->update('kota', $data);
    }

    public function hapusKota($idKota)
    {
        $this->db->where('id_kota', $idKota);
        $this->db->delete('kota');
    }

}
