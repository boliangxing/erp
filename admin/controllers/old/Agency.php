<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agency extends CI_Controller {
    public function index(){
      $this->load->helper('url');

        $this->load->helper('cookie');
        $this->load->model('Agency_model');
          $data['list']=$this->Agency_model->selectAll();

        $this->load->view('agency/index',$data);

    }
    public function agency_del(){
      $this->load->helper('url');
      $id=$this->input->post('id');
      $this->load->model('Agency_model');
      $row=$this->Agency_model->agency_del($id);
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

  public function agency_add(){
    $this->load->helper('url');
    if (IS_AJAX) {
            $data=$this->input->post();
            $this->load->model('Agency_model');
            $row=$this->Agency_model->agency_add($data);
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
          $this->load->model('Agency_model');
          $data['address']=$this->Agency_model->selectAdd();

                $this->load->view('Agency/agency_add',$data);

  }
  }
public function agency_pid(){
  $this->load->helper('url');
  $id=$this->input->post('id');

  $this->load->model('Agency_model');

  $p=$this->Agency_model->selectp($id);
echo json_encode($p);


}
public function agency_cid(){
  $this->load->helper('url');
  $pid=$this->input->post('pid');
  $cid=$this->input->post('cid');

  $this->load->model('Agency_model');

  $p=$this->Agency_model->selectc($pid,$cid);
echo json_encode($p);

}


public function agency_edit(){

  $this->load->helper('url');
  if(IS_AJAX){

    $id=$this->uri->segment(3);
$name=$this->input->post('name');
$lv=$this->input->post('lv');
$address=$this->input->post('address');
$email=$this->input->post('email');
$remark=$this->input->post('remark');
$this->load->model('Agency_model');
$r=$this->Agency_model->aup($id,$name,$lv,$address,$email,$remark);
if($r){

echo "ok";
}else {
echo "no";
}
  }else {
    $id=$this->uri->segment(3);
    $this->load->model('Agency_model');
    $data['list']=$this->Agency_model->select($id);

  $this->load->view('agency/agency_edit',$data);
  }

}
}
