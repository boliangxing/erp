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
						$d3=$this->input->post('d3');
								$d4=$this->input->post('d4');
										$d5=$this->input->post('d5');
												$d6=$this->input->post('d6');

						$r=$this->db->query("update yuanjian set name='$name' , num=$num ,bjnum=$bjnum,remark='$remark',d0='$d0',d1='$d1',d2='$d2'
            ,d3='$d3',d4='$d4',d5='$d5',d6='$d6'
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

		  $p=$this->Yuanjian_model->selectt($tid);
		echo json_encode($p);

		}
}
