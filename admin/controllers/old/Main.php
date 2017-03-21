<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
  public function index(){

    $this->load->helper('url');
      session_start();
if(isset($_SESSION['user'])){  $this->load->view('main');}else{
$this->load->view('login');
}

  }
    public function welcome(){
      $this->load->helper('url');

        $this->load->view('welcome');
    }
}
