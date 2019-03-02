<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_model extends CI_Model
{
  public function read()
  {
      $query = $this->db->get('cars');
      return $query->result_array();
  }

  public function insert($data)
  {
      $this->imei = $data['imei'];
      $this->status  = $data['status'];
      $this->create_at = date('Y-m-d');

      if($this->db->insert('cars',$this)){    
          return 'Data is inserted successfully';
      }else{
          return "Error has occured";
      }
  }

  public function update($id,$data)
  {
      $this->imei = $data['imei'];
      $this->status  = $data['status'];
      $this->create_at = date('Y-m-d');

      $result = $this->db->update('cars', $this ,array('id_car' => $id));

      if($result) {
          return "Data is updated successfully";
      }else{
          return "Error has occurred";
      }
  }

  public function delete($id)
  {
      $result = $this->db->query("delete from `cars` where id_car = $id");

      if($result) {
          return "Data is deleted successfully";
      }else{
          return "Error has occurred";
      }
  }

}

?>