<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class xiaoshou extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('xiaoshou_model');

    }
    public function index(){
      $this->load->helper('url');


        $this->load->model('xiaoshou_model');
          $data['list']=$this->xiaoshou_model->select();

        $this->load->view('xiaoshou/index',$data);

    }
    public function xs_add(){
  $this->load->helper('url');
  if (IS_AJAX) {
$data=$this->input->post();
          $this->load->model('xiaoshou_model');
          $row=$this->xiaoshou_model->xs_add($data);
          if ($row) {
              //$json = array('status' => 1,'info' => '添加成功');
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
          $this->load->view('xiaoshou/xs_add');
      }


    }
}
