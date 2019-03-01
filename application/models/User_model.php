<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

  public function read(){
    $query = $this->db->query("select * from `users`");
    return $query->result_array();
  }

  public function insert($data){

    $this->username = $data['username']; // please read the below note
    $this->password  = $data['password'];
    $this->user_type = $data['user_type'];
         
    if($this->db->insert('users',$this)){    
       return 'Data is inserted successfully';
    }else{
       return "Error has occured";
    }

  }

  public function update($id,$data){

    $this->username = $data['username'];
    $this->password = $data['password'];
    $this->user_type = $data['user_type'];

    $result = $this->db->update('users', $this ,array('id_user' => $id));

    if($result) {
      return "Data is updated successfully";
    }else{
      return "Error has occurred";
    }
  }

  public function delete($id){
    $result = $this->db->query("delete from `users` where id_user = $id");

    if($result) {
      return "Data is deleted successfully";
    }else{
      return "Error has occurred";
    }
  }

}
?>