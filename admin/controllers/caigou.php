<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class caigou extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('caigou_model');

    }
    public function rc(){
      $this->load->helper('url');


        $this->load->model('caigou_model');
          $data['list']=$this->caigou_model->selectrc();

        $this->load->view('caigou/rc_caigou',$data);

    }
}
