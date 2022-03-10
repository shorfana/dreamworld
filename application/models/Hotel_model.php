<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function indexHotel(){
        $this->db->select('*');
        $this->db->from('hotel');
        $this->db->join('kota', 'hotel.id_kota = kota.id_kota');
        return $this->db->get();
        // return $this->db->query("SELECT hotel.*, kota.nama_kota from hotel, kota where hotel.id_kota = kota.id_kota");
    }

    public function simpanHotel($data){
        $this->db->insert('hotel', $data);
    }
}
