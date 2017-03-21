<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dianzu_fa extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Dianzu_fa_model');

    }
		public function add(){
				$step = $this->input->get("step");

				switch($step){
						case '2' :
$post = $this->input->post();
//$typeid=$this->input->post('typeid');
					// $this->load->model('Dianzu_fa_model');
	//$data['list']=$this->Dianzu_fa_model->dz_select();

						$this->load->view('Dianzu_fa/2',$post);

								break;
case '3':
$leibie=$this->input->post('leibie');
$name=$this->input->post('name');
$num=$this->input->post('num');
$bjnum=$this->input->post('bjnum');
 $remark=$this->input->post('remark');


$canshu[0]=$this->input->post('canshu[0]');
$canshu[1]=$this->input->post('canshu[1]');
$canshu[2]=$this->input->post('canshu[2]');
$canshu[3]=$this->input->post('canshu[3]');
$canshu[4]=$this->input->post('canshu[4]');
$canshu[5]=$this->input->post('canshu[5]');
$canshu[6]=$this->input->post('canshu[6]');





	$r=$this->db->query("INSERT INTO yuanjian (typeid,name,num,bjnum,remark,d0,d1,d2,d3,d4,d5,d6) VALUES ($leibie,'$name','$num','$bjnum','$remark','$canshu[0]','$canshu[1]','$canshu[2]','$canshu[3]','$canshu[4]','$canshu[5]','$canshu[6]')");

	  $this->load->view('Dianzu_fa/3');


	break;

				}
		}
    public function dzfa_add(){
  $this->load->helper('url');
  if (IS_AJAX) {
$data=$this->input->post();
          $this->load->model('Dianzu_fa_model');
          $row=$this->Dianzu_fa_model->dz_add($data);
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

				$this->load->model('Product_model');
					$data['list']=$this->Product_model->selectAll();

          $this->load->view('Dianzu_fa/2',$data);
      }


    }
		public function getchange(){
  $this->load->helper('url');
			$tid=$this->input->post('tid');

			$this->load->model('Product_model');
			if($tid==210011){
			 $nn='马达';
		$r=$this->Product_model->selectAllForF($tid,$nn);
	 }else if ($tid==210012) {
			 $nn='方案验证版';
		$r=$this->Product_model->selectAllForF($tid,$nn);			# code...
		}else if ($tid==210013) {
			$nn='赠品';
		$r=$this->Product_model->selectAllForF($tid,$nn);			# code...
		}else{
		$r=$this->Product_model->selectAllForC($tid);

		}

			echo json_encode($r);
		}
}
