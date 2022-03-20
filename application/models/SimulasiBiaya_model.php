<?php defined('BASEPATH') or exit('No direct script access allowed');

class SimulasiBiaya_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function indexHotel()
    {
        return $this->db->get('hotel');
    }

    public function simpanHotel($data)
    {
        $this->db->insert('hotel', $data);
    }

    public function updateHotel($idHotel, $data)
    {
        $this->db->where('id_hotel', $idHotel);
        $this->db->update('hotel', $data);
    }

    public function getHotel($idHotel)
    {
        $this->db->where('id_hotel', $idHotel);
        return $this->db->get('hotel')->row();
    }

    public function hapusHotel($idHotel)
    {
        $this->db->where('id_hotel', $idHotel);
        $this->db->delete('hotel');
    }
}
