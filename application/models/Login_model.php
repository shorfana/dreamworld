<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function userAuth($usernameEmail,$password){
      $sql = $this->db->query("SELECT * FROM user WHERE (username='$usernameEmail'OR Email='$usernameEmail') AND Password='$password'");
      return $sql;
    }

    // RESET PASSWORD
    public function getUserInfo($userId){
      $query = $this->db->get_where('user',array('user_id'=>$userId),1);
      if ($this->db->affected_rows()>0) {
          $row = $query->row();
          return $row;
      }else{
          return false;
      }
  }

  public function getByEmail($email){
      $query = $this->db->get_where('user', array('email'=>$email),1);
      if ($this->db->affected_rows()>0) {
          $row = $query->row();
          return $row;
      }
  }

  public function insertToken($userId){
      $token = substr(sha1(rand()), 0, 30);
      $date = date('Y-m-d');
      $data = array(
          'Token'=>$token,
          'user_id'=>$userId,
          'date_created'=>$date
      );
      $query = $this->db->insert_string('token',$data);
      $this->db->query($query);
      return $token.$userId;
  }

  public function isTokenValid($token){
      $tkn = substr($token, 0, 30);
      $uid = substr($token, 30);
      $query = $this->db->get_where('token',array(
          'token.Token'=>$tkn,
          'token.user_id'=>$uid
      ),1);

      if ($this->db->affected_rows()>0) {
          $row = $query->row();
          $created = $row->date_created;
          $createdTS = strtotime($created);
          $today = date('Y-m-d');
          $todayTS = strtotime($today);

          if($createdTS !=$todayTS){
              return false;
          }
          $InfoId = $this->getUserInfo($row->user_id);
          return $InfoId;
      }else{
          return false;
      }
  }

  public function updatePassword($pass){
      // var_dump($pass);die;
      $this->db->where('user_id',$pass['user_id']);
      $this->db->update('user', array('password'=>$pass['password']));
  }
}
