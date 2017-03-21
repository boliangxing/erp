<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library('pagination');
        $this->config->load('pagination');
    }
    public function caigou(){
        $this->load->helper('url');
        $this->load->model('Product_model');
        $data['list']=$this->Product_model->selectcg();
        $this->load->view('product/caigou',$data);
    }
    public function index(){
      $this->load->helper('url');
      $this->load->model('Product_model');
      $data['list']=$this->Product_model->select();
      $this->load->view('product/product_list',$data);

    }

    public function proadd(){
        $step = $this->input->get("step");
        switch($step){
        case '1' :
        $this->load->model('Product_model');
        $data['list']=$this->Product_model->selectAll();
        $this->load->view('product/step1',$data);
        break;
        case '2' :
        $post = $this->input->post();
        $this->load->view('product/step2', $post);
        break;
        case '3' :
        $post = $this->input->post();
        $name = $this->input->post('name');
        $num = $this->input->post('num');
        $plan_num = $this->input->post('plnum');
        $this->load->model('Product_model');
        $r=  $this->Product_model->selectpl($name,$num,$plan_num);
        if($r){
        $this->load->view('product/step3', $post);
        }else{
         echo '失败';
        }
        break;
        case '4' :
        $post = $this->input->post();
        $type=$this->input->post('type');
        $name=$this->input->post('name');
        $remark=$this->input->post('remark');
        $plnum=$this->input->post('plnum');
        for($i=0;$i<$plnum;$i++){
        $pname[$i]=$post['pname'][$i];
        $num[$i]=$post['kcn'][$i];
        if($num[$i]<0){
        $num[$i]=abs($num[$i]);
        $r= $this->db->query("INSERT INTO caigou ( pname,yname,num) VALUES ('$name',' $pname[$i]','$num[$i]')");
        }else{
        $r=$this->db->query("UPDATE yuanjian set num='$num[$i]' where name='$pname[$i]'");
        }
        }
        $this->db->query("INSERT INTO product ( type, name,remark) VALUES ('$type',' $name','$remark')");
        $this->load->view('product/step4');
        break;
        default :
        $this->load->view('product/proadd');
        }
    }



    public function ajaxChecknum(){
        $name = $this->input->get('name');
        $num = $this->input->get('num');
        $res = $this->db->query("SELECT num FROM yuanjian WHERE name='$name'  ")->row_array();
        if($res){
        echo json_encode($res);
        }
        }
}
