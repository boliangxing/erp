<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bangong extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Bangong_model');

    }
    public function index(){
      $this->load->helper('url');


        $this->load->model('Bangong_model');
          $data['list']=$this->Bangong_model->select();

        $this->load->view('Bangong/index',$data);

    }
		public function jk(){
			$this->load->helper('url');


				$this->load->model('Sim_model');
					$data['list']=$this->Sim_model->select();
            echo json_encode($data);

		}
    public function bg_add(){
  $this->load->helper('url');
  if (IS_AJAX) {
$data=$this->input->post();
          $this->load->model('Bangong_model');
          $row=$this->Bangong_model->bg_add($data);
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

				  $data['list']=$this->Bangong_model->type_select();
          $this->load->view('Bangong/bg_add',$data);
      }


    }
}
