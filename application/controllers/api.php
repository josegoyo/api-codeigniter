<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require(APPPATH.'/libraries/REST_Controller.php');
require(APPPATH . '/libraries/Format.php');

class Api extends REST_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('validator_model');
	}  

	public function car_get()
	{
		$this->response($this->validator_model->validate_read_car()); 
	}

	public function car_post()
	{
		$car = array(
			'imei' => $this->input->get('imei'),
			'status' => $this->input->get('status')
		);
		$this->response($this->validator_model->validate_new_car($car)); 
	}

	public function car_put()
  	{
		$car = array(
	  		'imei' => $this->input->get('imei'),
	  		'status' => $this->input->get('status'),
	  		'id' => $this->uri->segment(3)
		);
    	$this->response($this->validator_model->validate_update_car($car)); 
	}

	public function car_delete()
	{
		$id = $this->uri->segment(3);
		$this->response($this->validator_model->validate_delete_car($car));
	}

}

?>
