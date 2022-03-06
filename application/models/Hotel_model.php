<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function indexKota(){
        return $this->db->get('kota')->result();
    }

    public function simpanKota($value){
        $this->db->insert('kota', $value);
    }
}
