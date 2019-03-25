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
		$result = $this->db->insert('cars', $data);
		return ($result) ? 'Data is inserted successfully' : "Error has occured";
	}

	public function update($id,$data)
	{
		$result = $this->db->update('cars', $data, array('id_car' => $id));
		return ($result) ? "Data is updated successfully" : "Error has occurred";
  	}

	public function delete($id)
	{
		$result = $this->db->delete('cars', array('id_car' => $id));
		return ($result) ? "Data is deleted successfully" : "Error has occurred";
	}

}

?>