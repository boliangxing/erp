<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class faliao extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('faliao_model');

    }
    public function index(){
      $this->load->helper('url');


        $this->load->model('faliao_model');
          $data['list']=$this->faliao_model->select();

        $this->load->view('faliao/index',$data);

    }
    public function fl_add(){
  $this->load->helper('url');
  if (IS_AJAX) {
$data=$this->input->post();
          $this->load->model('faliao_model');
          $row=$this->faliao_model->fl_add($data);
          if ($row) {
              $json = array('status' => 1,'info' => '添加成功');
            //  $data['list']=$this->Permission_model->selectAll();

            //$this->load->view('admin/permission/index',$data);
     echo '添加成功';

          }else{
              $json = array('status' => 0,'info' => '添加失败');
            //  echo json_encode($json);
              //$this->load->view('admin/Permission/permission_add');

  echo '添加失败';
          }
      }else {
        # code...
          $this->load->view('faliao/fl_add');
      }


    }
}
