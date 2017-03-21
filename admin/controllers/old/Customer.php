<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function index(){
      $this->load->helper('url');

        $this->load->helper('cookie');
        $this->load->model('Customer_model');
          $data['list']=$this->Customer_model->selectAll();

        $this->load->view('customer/index',$data);

    }
    public function leibie(){
      $this->load->helper('url');

        $this->load->helper('cookie');
        $this->load->model('Customer_model');
          $data['list']=$this->Customer_model->selectLei();

        $this->load->view('customer/leibie',$data);

    }
    public function leibie_add(){

      $this->load->helper('url');
      if (IS_AJAX) {
  $data=$this->input->post();
              $this->load->model('Customer_model');
              $row=$this->Customer_model->leibie_add($data);
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
          }else{
            $this->load->model('Customer_model');

                  $this->load->view('customer/leibie_add' );

    }

    }
    public function leibie_del(){
      $this->load->helper('url');
      $id=$this->input->post('id');
      $this->load->model('Customer_model');
      $row=$this->Customer_model->leibie_del($id);
      if ($row) {
          //$json = array('status' => 1,'info' => '添加成功');
        //  $data['list']=$this->Permission_model->selectAll();

        //$this->load->view('admin/permission/index',$data);
        //$json = array('status' => 1,'message' => '添加成功');
    // echo json_encode($json);
  echo "ok";

      }else{
          //$json = array('status' => 0,'message' => '添加失败');
    //   echo json_encode($json);
          //$this->load->view('admin/Permission/permission_add');
        echo "no";
      }

  }

  public function customer_add(){
    $this->load->helper('url');
    if (IS_AJAX) {
            $data=$this->input->post();
            $this->load->model('Customer_model');
            $row=$this->Customer_model->customer_add($data);
            if ($row) {
                //$json = array('status' => 1,'info' => '添加成功');
              //  $data['list']=$this->Permission_model->selectAll();

              //$this->load->view('admin/permission/index',$data);
        ECHO "添加成功";

            }else{
                $json = array('status' => 0,'info' => '添加失败');
              //  echo json_encode($json);
                //$this->load->view('admin/Permission/permission_add');
    echo '添加失败';
            }
        }else{
          $this->load->model('Customer_model');

                $this->load->view('customer/customer_add' );

  }
  }


public function leibie_edit(){

  $this->load->helper('url');
  if(IS_AJAX){

    $id=$this->uri->segment(3);
$leibie=$this->input->post('leibie');


$this->load->model('Customer_model');
$r=$this->Customer_model->lup($id,$leibie);
if($r){

echo "ok";
}else {
echo "no";
}
  }else {
    $id=$this->uri->segment(3);
    $this->load->model('Customer_model');
    $data['list']=$this->Customer_model->selectLEIBIE($id);

  $this->load->view('customer/leibie_edit',$data);
  }

}
public function customer_edit(){

  $this->load->helper('url');
  if(IS_AJAX){

    $id=$this->uri->segment(3);
$name=$this->input->post('name');
$leibie=$this->input->post('leibie');

$remark=$this->input->post('remark');
$this->load->model('Customer_model');
$r=$this->Customer_model->cup($id,$name,$leibie,$remark);
if($r){

echo "ok";
}else {
echo "no";
}
  }else {
    $id=$this->uri->segment(3);
    $this->load->model('Customer_model');
    $data['list']=$this->Customer_model->select($id);

  $this->load->view('customer/customer_edit',$data);
  }

}
}
