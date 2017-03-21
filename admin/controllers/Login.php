<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index(){
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->view('login');

    }
    public function test(){
    $this->load->helper('url');
    $this->load->helper('cookie');
    $this->load->view('test');
    }


    public function check(){
        $this->load->helper('url');
        $this->load->model('login_model');
        $user = $this->input->get('user');
        $pwd = $this->input->get('pwd');
        $r=$this->login_model->login($user,$pwd);
        if($r){
        session_start();
        $_SESSION['user'] = $r;
        echo 1;
        }else{
        echo   $user,$pwd;
        }
        }

    public function out(){
      $this->load->helper('url');
      session_start();
      unset($_SESSION['user']);
      echo "<script>location.href='../login'</script>";
      }
}
