<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function indexKota(){
        return $this->db->get('kota')->result();
    }
}
