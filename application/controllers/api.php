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
        $this->load->model('car_model');
    }  

	// CARS
	public function car_get()
	{
		$r = $this->car_model->read();
		$this->response($r); 
  	}

	public function car_put()
    {
		$id = $this->uri->segment(3);

		$data = array(
	  		'imei' => $this->input->get('imei'),
	  		'status' => $this->input->get('status')
		);

		$r = $this->car_model->update($id,$data);
        $this->response($r); 
	}

  	public function car_post()
  	{
		$data = array(
			'imei' => $this->input->get('imei'),
			'status' => $this->input->get('status')
		);

		$r = $this->car_model->insert($data);
		$this->response($r); 
  	}

	public function car_delete()
	{
		$id = $this->uri->segment(3);
		$r = $this->car_model->delete($id);
		$this->response($r); 
	}


}
?>
