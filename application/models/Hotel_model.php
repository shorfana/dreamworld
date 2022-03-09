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
        // $query = $this->db->query(
        //     "SELECT hotel.id_hotel,hotel.id_kota,hotel.harga_quad,hotel.harga_triple,hotel.harga_double,hotel.gambar_hotel, kota.nama_kota from hotel,kota WHERE hotel.id_kota=kota.id_kota"
        // );
        // return $query;
    }

    public function simpanHotel($data){
        $this->db->insert('hotel', $data);
    }
}
