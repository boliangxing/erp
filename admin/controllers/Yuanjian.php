<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yuanjian extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Yuanjian_model');
    }
  public function index(){
        $this->load->helper('url');
		    $this->load->model('Product_model');
        $this->load->model('Yuanjian_model');
        $data['list']=$this->Yuanjian_model->select();
				$data['li']=$this->Product_model->selectAll();
        $this->load->view('Yuanjian/index',$data);

    }
    public function yj_add(){
        $this->load->helper('url');
        if (IS_AJAX) {
        $data=$this->input->post();
        $this->load->model('Yuanjian_model');
        $row=$this->Yuanjian_model->yj_add($data);
        if ($row) {
        echo '添加成功';
        }else{
        $json = array('status' => 0,'info' => '添加失败');
        echo '添加失败';
        }
        }else {
			  $data['list']=$this->Yuanjian_model->type_select();
        $this->load->view('Yuanjian/yj_add',$data);
       }
       }
		public function yj_edit(){
			 $this->load->helper('url');
	     if(IS_POST){
			 $id=$this->input->post('id');
			 $name=$this->input->post('name');
		 	 $num=$this->input->post('num');
			 $bjnum=$this->input->post('bjnum');
		   $remark=$this->input->post('remark');
			 $d0=$this->input->post('d0');
		   $d1=$this->input->post('d1');
			 $d2=$this->input->post('d2');

		   $r=$this->db->query("update yuanjian set name='$name' , num=$num ,bjnum=$bjnum,remark='$remark',d0='$d0',d1='$d1',d2='$d2',price1='$price1',price2='$price2'
       
				where id='$id'");
       if($r){
	     echo "成功";
       }else{
       echo "失败";
       }
		   }else{
			$this->load->model('Yuanjian_model');
			$name=$this->input->get('name');
		  $typeid=$this->input->get('typeid');
	 	  $data['list']=$this->Yuanjian_model->selectyj($name,$typeid);
		  $this->load->view('Yuanjian/yj_edit',$data);

		}

		}

		 public function Yuanjian_tid(){
		 $this->load->helper('url');
		 $tid=$this->input->post('tid');
		 $this->load->model('Yuanjian_model');
		 if(!$tid){
 $p=$this->Yuanjian_model->selectnull();

		 }else{

		 	 $p=$this->Yuanjian_model->selectt($tid);
		 }
		
		 echo json_encode($p);

		}


		public function Yuanjian_any(){
				 $this->load->helper('url');
		 $name=$this->input->post('name');
		 		 	 $p=$this->Yuanjian_model->selectany($name);

 echo json_encode($p);
		}
}
