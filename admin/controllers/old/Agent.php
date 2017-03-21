<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('agent_model');
        $this->load->library('pagination');
        $this->config->load('pagination');
    }
    /*
        用户列表

     */
    public function index(){
        $args = $this->uri->uri_to_assoc ();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];
        $config['base_url'] = site_url('agent/index/page');
        $config['total_rows'] = $this->agent_model->get_agent_num();
        $config['uri_segment'] = 4;
        $config['per_page'] = 10;
        $limit = $config['per_page'];

        $this->pagination->initialize($config); 
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $config['total_rows'];

        $data['list'] = $this->agent_model->get_agent_page($offset,$limit);
        $this->load->view('agent/index',$data);
    }

    /*
    编辑代理商
     */
    public function edit(){
        $getArr = $this->uri->uri_to_assoc();
        $data['info'] = $this->agent_model->get_agent_info($getArr['id']);
        if (IS_AJAX) {
            $data=$this->input->post();
            $row=$this->agent_model->update_agent($data['agent_id'],$data);
            if ($row) {
                $json = array('status' => 1,'info' => '更新成功');
                echo json_encode($json);
               
            }else{
                $json = array('status' => 0,'info' => '更新失败');
                echo json_encode($json);
            }
        
        }else{
            $this->load->view('agent/edit',$data);
        }
    }
    /*
    添加代理商
     */
    public function agent_add(){
        if (IS_POST) {
            $data=$this->input->post();
            $row=$this->agent_model->agent_add($data);
            if ($row) {
                $json = array('status' => 1,'info' => '添加成功');
                echo json_encode($json);
               
            }else{
                $json = array('status' => 0,'info' => '添加失败');
                echo json_encode($json);
            }
        }else{
            $this->load->view('agent/agent_add'); 
        }
    }
    /*
    删除代理
     */
    public function delagent(){
        $id = $this->input->post('agent_id');
        $row=$this->agent_model->del_agent($id);
        if ($row) {
            $json = array('status' => 1,'info' => '删除成功');
            echo json_encode($json);
           
        }else{
            $json = array('status' => 0,'info' => '删除失败');
            echo json_encode($json);
        }
    }

    public function datadel(){
        $agentids = $this->input->post('agentids');
        if(!empty($agentids)){
            $agentids = explode('&', $agentids);
            foreach ($agentids as $k => $v) {
                $agentids[$k]=substr($v,9);
            }
            if ($agentids) {
               $row=$this->agent_model->agentidsdel($agentids);
            }else{
                $json = array('status' => 0,'info' => '请选择');
                echo json_encode($json);
            }
            if ($row) {
            $json = array('status' => 1,'info' => '成功');
            echo json_encode($json);
            }else{
                $json = array('status' => 0,'info' => '失败');
                echo json_encode($json);
            }

        }else{
            $json = array('status' => 0,'info' => '失败');
            echo json_encode($json);
        }

      

    }

}
