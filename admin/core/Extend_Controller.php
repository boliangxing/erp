<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->checkLogin();

    }

    private function checkLogin(){
        //$this->input->set_cookie('admin',1);
        session_start();
        if(!$_SESSION["user"]){
            //redirect('admin');
            echo "<script>window.parent.location='".site_url('login')."'</script>";
        }
        //echo 1;

    }
}
