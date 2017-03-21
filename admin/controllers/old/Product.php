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
    /*
    	产品添加封面描述
     */
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
    //print_r($r) ;
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
                //  echo $pname[$i]---,$num[$i];
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

    /*
    	产品列表
     */
    public function prolist(){
        //设置分页
        $args = $this->uri->uri_to_assoc ();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];
        $config['base_url'] = site_url('product/prolist/page');
        $config['total_rows'] = $this->product_model->getProductPageNum();
        $config['uri_segment'] = 4;
        $limit = $this->config->config['per_page'];
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $config['total_rows'];

        $data['proList'] = $this->product_model->getProductPage($offset, $limit);

    	$this->load->view('product/prolist', $data);
    }

    /*
        产品编辑
     */
    public function proedit(){
        $product_id = $this->input->get('product_id');
        $post = $this->input->post();
        if(!empty($post)){
            $data['product_name'] = $post['product_name'];
            $data['product_des'] = $post['product_des'];
            $data['product_img'] = false;

            if(!empty($_FILES['product_ico']['name'])){
                $file_name = time();

                $config['upload_path'] = '../uploads/product/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '100';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';
                $config['file_name'] = $file_name;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload( 'product_ico' )){
                     $err = $this->upload->display_errors();

                     var_dump($err);
                     exit;
                }
                $uploadsInfo = $this->upload->data();

                $data['product_img'] = ($uploadsInfo['file_name']);
            }

            $this->product_model->updateProductByID($product_id, $data);
        }
        $data['proInfo'] = $this->product_model->getProductInfoByID($product_id);

        $this->load->view('product/proedit', $data);
    }

    /*
        字段编辑
     */
    public function proplan(){
        $product_id = $this->input->get('product_id');
        $bak_product_id = $this->input->get('bak_product_id');


        if($_POST){
            $post = $this->input->post();

            foreach($post['parcode'] as $key => $val){

                $temp['rule'][$val]['name'] = $post['parname'][$key];
                $temp['rule'][$val]['formula'] = $post['formula'][$key];
                $temp['rule'][$val]['units'] = $post['units'][$key];
                $temp['rule'][$val]['memo'] = $post['memo'][$key];
                $temp['rule'][$val]['fieldname'] = $post['fieldname'][$key];
            }

            $temp['output'] = !empty($post['output']) ? $post['output'] : array();

            if($post['attached']){
                $temp['attached']['table'] = $post['attached'];

                foreach($post['aparcode'] as $key=>$val){
                    $temp['attached']['rule'][$val]['name'] = $post['aparname'][$key];
                    $temp['attached']['rule'][$val]['formula'] = $post['aformula'][$key];
                    $temp['attached']['rule'][$val]['units'] = $post['aunits'][$key];
                    $temp['attached']['rule'][$val]['memo'] = $post['amemo'][$key];
                    $temp['attached']['rule'][$val]['fieldname'] = $post['afieldname'][$key];
                }
            }

            if(@copy("../config/".$product_id.".php","../config/bak/".$product_id."_".date("YmdHis").".php")){
                $fp = fopen('../config/'.$product_id.".php", 'w');
                fwrite($fp, '<?php $plan='.var_export($temp, true).';');
                fclose($fp);
            }
        }

        //读取配置信息
        $filename = empty($bak_product_id) ? $product_id.'.php' : 'bak/'.$bak_product_id;
        include($_SERVER["DOCUMENT_ROOT"].'jld.139.hk/config/'.$filename);

        //读取历史备份文件
        $this->load->helper('file');
        $fileArr = get_filenames('../config/bak/');

        $data = $plan;
        $data['fileList'] = $fileArr;
        $data['product_id'] = $product_id;
        $data['bak_product_id'] = $bak_product_id;
        $this->load->view('product/proplan',$data);

    }

    /**
     * 验证
     */

    public function ajaxChecknum(){
        $name = $this->input->get('name');
          $num = $this->input->get('num');
        $res = $this->db->query("SELECT num FROM yuanjian WHERE name='$name'  ")->row_array();


         if($res){

  echo json_encode($res);
     }


          }
}
