<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require(APPPATH.'/libraries/REST_Controller.php');
require(APPPATH . '/libraries/Format.php');

class Api extends REST_Controller
{

  public function __construct() {
    parent::__construct();
    $this->load->model('user_model');
  }   

  public function user_get(){
     $r = $this->user_model->read();
     $this->response($r); 
  }

  public function user_put(){
     $id = $this->uri->segment(3);

     $data = array(
        'username' => $this->input->get('username'),
        'password' => $this->input->get('password'),
        'user_type' => $this->input->get('user_type')
     );

      $r = $this->user_model->update($id,$data);
      $this->response($r); 
  }

  public function user_post(){
     $data = array(
        'username' => $this->input->get('username'),
        'password' => $this->input->get('password'),
        'user_type' => $this->input->get('user_type')
     );
     $r = $this->user_model->insert($data);
     $this->response($r); 
  }

  public function user_delete(){
     $id = $this->uri->segment(3);
     $r = $this->user_model->delete($id);
     $this->response($r); 
  }

}
?>
