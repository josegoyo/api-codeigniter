<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validator_model extends CI_Model
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('api/car_model');
	}  

	public function validate_read_car() 
	{
		return $this->car_model->read();
	}

	public function validate_new_car($car)
	{
		$valid = true;

		if($this->validate_is_null($car['imei']))
			$valid = false;
		if($this->validate_is_null($car['status']))
			$valid = false;

		$r = array();

		if($valid) {
			$r['message'] = $this->car_model->insert($car);
		}else{
			$r['error'] = 'You need to send all parameters to insert new car.';
		}

		return $r;
	}

	public function validate_update_car($car)
	{
		$update = array();

		if(!$this->validate_is_null($car['imei']))
			$update['imei'] = $car['imei'];
		if(!$this->validate_is_null($car['status']))
			$update['status'] = $car['status'];

		$r = $this->car_model->update($car['id'],$update);

		return $r;
	}

	public function validate_delete_car($id)
	{
		return $this->car_model->delete($id);
	}

	public function validate_is_null($param)
	{
		return ($param === NULL) ? true : false;
	}
}

?>