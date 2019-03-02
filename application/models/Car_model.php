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
		$data['create_at'] = date('Y-m-d');

		if($this->db->insert('cars', $data)){    
	  		return 'Data is inserted successfully';
		}else{
	  		return "Error has occured";
		}
	}

	public function update($id,$data)
	{
		$result = $this->db->update('cars', $data, array('id_car' => $id));

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