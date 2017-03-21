<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidian extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Cidian_model');

    }
    public function index(){
        $this->load->helper('url');
        $this->load->model('Cidian_model');
        $data['list']=$this->Cidian_model->select();
        $this->load->view('Cidian/index',$data);

    }
          public function cidian_zong(){
        $this->load->helper('url');
      	if (IS_POST) {
        $data=$this->input->post();
        $this->load->model('Cidian_model');


				$tname=$this->input->post('tname');
        $ptid=$this->input->post('ptid');
				$test=$this->Cidian_model->cidian_zong($ptid);
				if(!$test){
			  $typeid=1000;
				 }else{
      	$typeid=$test[0]['typeid']+1;
				 }

        $row=$this->Cidian_model->cidian_add($typeid,$tname);
        if ($row) {
       echo '添加成功';
        }else{
        $json = array('status' => 0,'info' => '添加失败');
       echo '添加失败';
          }
       }else {
      $data['typeid']=$this->uri->segment(3);
      $this->load->view('Cidian/cidian_zong',$data);
      }
					}

     public function cidian_add(){
     $this->load->helper('url');
    if (IS_AJAX) {
            $data=$this->input->post();
            $this->load->model('Cidian_model');
						$tname=$this->input->post('tname');
            $ptid=$this->input->post('ptid');
            $name=substr($ptid,0,1)+1;
            $typeid=$name.$ptid;
					  $test=$this->Cidian_model->cidian_typeid($typeid);

					 if(!$test){
					 $typeid=$typeid.'1';
					 }else{
					if($name==2){
					$s1=substr($test[0]['typeid'],0,5);
					$s2=substr($test[0]['typeid'],5)+1;
				  }elseif ($name==3) {
			   	if($ptid.length>=7){
					$s1=substr($test[0]['typeid'],0,8);
					$s2=substr($test[0]['typeid'],8)+1;
					}else{
          $s1=substr($test[0]['typeid'],0,7);
					$s2=substr($test[0]['typeid'],7)+1;
					}
					}
					$typeid=(string)$s1.(string)$s2;
					 }
          $row=$this->Cidian_model->cidian_add($typeid,$tname);
          if ($row) {
          echo $s1.'xxx'.$s2;
          }else{
          $json = array('status' => 0,'info' => '添加失败');
          echo '添加失败';
          }
				  }else {
          $typeid=$this->uri->segment(3);
			   	$data['list']=$this->Cidian_model->cidian_id($typeid);
          $this->load->view('Cidian/cidian_add',$data);
      }


    }

public function cidian_cx(){
       $this->load->model('Cidian_model');
		   $ptypeid=$this->uri->segment(3);
			 $name=substr($ptypeid,0,1)+1;
			 $typeid=$name.$ptypeid;
			 if($ptypeid==210011){
		   $nn='马达';
       $data['list']=$this->Cidian_model->cidian_cxs($typeid,$nn);
			 }else if ($ptypeid==210012) {
		   $nn='方案验证版';
       $data['list']=$this->Cidian_model->cidian_cxs($typeid,$nn);
 		   }else if ($ptypeid==210013) {
			 $nn='赠品';
       $data['list']=$this->Cidian_model->cidian_cxs($typeid,$nn);
 		   }else{
			 $data['list']=$this->Cidian_model->cidian_cx($typeid);
	  	 }
			 $this->load->view('Cidian/cidian_cx',$data);
}



}
