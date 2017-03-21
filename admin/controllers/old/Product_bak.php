<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library('pagination');
        $this->config->load('pagination');
    }

    public function protypelist(){
        //设置分页
        $args = $this->uri->uri_to_assoc ();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];
        $config['base_url'] = site_url('product/protypelist/page');
        $config['total_rows'] = $this->product_model->get_protype_num();
        $config['uri_segment'] = 4;
        $limit = $this->config->config['per_page'];

        $this->pagination->initialize($config); 
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $config['total_rows'];

        $data['protypeList'] = $this->product_model->get_protype_list_page($offset,$limit);


        $this->load->view('product/protypelist', $data);
    }

    public function protypeadd(){
        if($_POST){
            $data = array(
                'typename' => $this->input->post('typename'),
                'seq' => $this->input->post('seq')
            );
            echo $this->product_model->add_protype($data) ?
                json_encode(array('status'=>1,'info'=>'添加成功')):
                json_encode(array('status'=>0,'info'=>'添加失败'));
            exit();
        }

        $this->load->view('product/protypeadd');
    }

    public function protypeedit(){
        $args = $this->uri->uri_to_assoc ();
        $typeid = $args['typeid'];

        if($_POST){
            $data = array(
                'typename' => $this->input->post('typename'),
                'seq' => $this->input->post('seq')
            );

            echo $this->product_model->edit_protype_byID($data,$typeid) ?
                json_encode(array('status'=>1,'info'=>'修改成功')):
                json_encode(array('status'=>0,'info'=>'修改失败'));  
            exit;
        }

        $data['protypeList'] = $this->product_model->get_protype_info_byID($typeid);
        $this->load->view('product/protypeedit',$data);
    }

    public function protypedel(){
        $typeid = $this->input->post('typeid');


        if(!empty($typeid)){
            $typeid = explode('&', $typeid);
            foreach ($typeid as $k => $v) {
                $typeid[$k]=substr($v,7);
            }
            //var_dump($producttype_ids);exit;
            if ($typeid) {
                echo $this->product_model->del_protype_byIDS($typeid) ?
                    json_encode(array('status'=>1,'info'=>'删除成功')):
                    json_encode(array('status'=>0,'info'=>'删除失败'));;
            }else{
                $json = array('status' => 0,'info' => '请选择');
                echo json_encode($json);
            }

        }else{
            $json = array('status' => 0,'info' => '失败');
            echo json_encode($json);
        }
    }

    public function prolist(){
        //设置分页
        $args = $this->uri->uri_to_assoc ();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];
        $config['base_url'] = site_url('product/prolist/page');
        $config['total_rows'] = $this->product_model->get_product_num();
        $config['uri_segment'] = 4;
        $limit = $this->config->config['per_page'];

        $this->pagination->initialize($config); 
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $config['total_rows'];

        $data['proList'] = $this->product_model->get_product_list_page($offset,$limit);

        $this->load->view('product/prolist', $data);
    }


    public function proadd(){
        if($_POST){
            //接收数据
            $data = array(
                'product_name' => $this->input->post('product_name'),
                'planid'       => $this->input->post('planid'),
                'typeid'       => $this->input->post('typeid'),
                'photo'        => $this->input->post('photo'),
                'memo'         => $this->input->post('memo')
            );

            echo $this->product_model->add_product($data) ?
                json_encode(array('status'=>1,'info'=>'添加成功')):
                json_encode(array('status'=>0,'info'=>'添加失败'));
            exit();
        }
        $this->load->model('plan_model');

        $data['protype'] = $this->product_model->get_protype_list();
        $data['planList'] = $this->plan_model->get_plan_list();
        $this->load->view('product/proadd', $data);
    }

    public function proedit(){
        $args = $this->uri->uri_to_assoc ();
        $product_id = $args['product_id'];

        if($_POST){
            //接收数据
            $data = array(
                'product_name' => $this->input->post('product_name'),
                'planid'       => $this->input->post('planid'),
                'typeid'       => $this->input->post('typeid'),
                'photo'        => $this->input->post('photo'),
                'memo'         => $this->input->post('memo')
            );

            echo $this->product_model->edit_product_byID($data, $product_id) ?
                json_encode(array('status'=>1,'info'=>'修改成功')):
                json_encode(array('status'=>0,'info'=>'修改失败'));
            exit();
        }

        $this->load->model('plan_model');

        $data['protypeList'] = $this->product_model->get_protype_list();
        $data['proinfo'] = $this->product_model->get_product_info($product_id);
        $data['planList'] = $this->plan_model->get_plan_list();

        $this->load->view('product/proedit', $data);
    }

    public function prodel(){
        $product_ids = $this->input->post('product_id');


        if(!empty($product_ids)){
            $product_ids = explode('&', $product_ids);
            foreach ($product_ids as $k => $v) {
                $product_ids[$k]=substr($v,11);
            }

            if ($product_ids) {
                echo $this->product_model->del_product_byIDS($product_ids) ?
                    json_encode(array('status'=>1,'info'=>'删除成功')):
                    json_encode(array('status'=>0,'info'=>'删除失败'));;
            }else{
                $json = array('status' => 0,'info' => '请选择');
                echo json_encode($json);
            }

        }else{
            $json = array('status' => 0,'info' => '失败');
            echo json_encode($json);
        }

    }
}