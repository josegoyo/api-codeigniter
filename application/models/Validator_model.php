<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validator_model extends CI_Model
{
	public function validate_new_car($car)
	{
		/*required car params:
		- imei
		- status*/
		$valid = true;

		if($this->validate_is_null($car['imei']))
			$valid = false;
		if($this->validate_is_null($car['status']))
			$valid = false;

		return $valid;
	}

	public function validate_update_car($car){
		$res = array();

		if(!$this->validate_is_null($car['imei']))
			$res['imei'] = $car['imei'];
		if(!$this->validate_is_null($car['status']))
			$res['status'] = $car['status'];

		return $res;
	}

	public function validate_is_null($param)
	{
		return ($param === NULL) ? true : false;
	}
}

?>