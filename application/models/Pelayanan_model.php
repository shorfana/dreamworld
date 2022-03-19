<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function indexPelayanan()
    {
        return $this->db->get('pelayanan');
    }

    public function simpanPelayanan($value)
    {
        $this->db->insert('pelayanan', $value);
    }

    public function editPelayanan($idPelayanan, $jenisPelayanan, $hargaPelayanan)
    {
        $data = array('jenis_pelayanan' => $jenisPelayanan, 'harga_pelayanan' => $hargaPelayanan);
        $this->db->where('id_pelayanan', $idPelayanan);
        $this->db->update('pelayanan', $data);
    }

    public function hapusPelayanan($idPelayanan)
    {
        $this->db->where('id_pelayanan', $idPelayanan);
        $this->db->delete('pelayanan');
    }

}
