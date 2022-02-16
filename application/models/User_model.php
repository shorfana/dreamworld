<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function myProfile($userId)
    {   
        $this->db->where('user_id', $userId);
        return $this->db->get('user')->row();
    }

    public function saveProfile($userId, $value){
        $this->db->where('user_id', $userId)
        ->update('pengguna', $value);
    }

    public function changePassword($userId,$password){
        $this->db->set('Password', $password);
        $this->db->where('user_id', $userId);
        $this->db->update('pengguna');
    }

    public function userRow(){
        return $this->db->query("SELECT * FROM user ORDER BY userId DESC LIMIT 1");
    }

    // public function addUser($value){
    //     return $this->db->insert('pengguna',$value);
    // }

    // public function editUser($userId, $value){
    //     $this->db->where("userId",$userId);
    //     $this->db->update("pengguna",$value);
    // }

    // public function getUser($userId){
    //     $this->db->where('userId', $userId);
    //     return $this->db->get('pengguna')->row();
    // }
}
