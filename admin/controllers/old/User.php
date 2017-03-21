<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    /*
        用户列表

     */
    public function index(){
        $getArr = $this->input->get()?$this->input->get():$this->uri->uri_to_assoc();
        $this->load->library('pagination');       //导入分页类
        if (isset($getArr['start_time'])&&isset($getArr['last_time'])&&isset($getArr['title'])&&$getArr['title']!=='') {
            $config['base_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/admin/user/index/start_time/'.$getArr['start_time'].'/last_time/'.$getArr['last_time'].'/title/'.$getArr['title'].'/page/'; //导入分页类URL
            $config['total_rows'] = $this->user_model->get_user_num($getArr['start_time'],$getArr['last_time'],$getArr['title']);
        }elseif(isset($getArr['start_time'])&&isset($getArr['last_time'])){
            $config['base_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/admin/user/index/start_time/'.$getArr['start_time'].'/last_time/'.$getArr['last_time'].'/page/';
            $config['total_rows'] = $this->user_model->get_user_num($getArr['start_time'],$getArr['last_time']);
        }else{
            $config['base_url'] = site_url('user/index/page/'); //导入分页类URL
            $config['total_rows'] = $this->user_model->get_user_num();
        }
        $args = $this->uri->uri_to_assoc ();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];
        
        
        //$config['per_page'] = $this->config->config['per_page']; ; 
        $config['uri_segment'] = 4;
        $config['per_page'] = 10;
        $limit = $config['per_page'];

        $this->pagination->initialize($config); 
        $data['page'] = $this->pagination->create_links();
       
        if ($getArr) {
           if (isset($getArr['start_time'])&&isset($getArr['last_time'])&&isset($getArr['title'])) {
                $data['list'] = $this->user_model->get_user_page($getArr['start_time'],$getArr['last_time'],$getArr['title'],$offset,$limit);
                $this->load->view('user/index',$data);
            }elseif (isset($getArr['start_time'])&&isset($getArr['last_time'])) {
                $data['list'] = $this->user_model->get_user_page($getArr['start_time'],$getArr['last_time'],'',$offset,$limit);
                $this->load->view('user/index',$data);
            }elseif (isset($getArr['title'])) {
                $data['list'] = $this->user_model->get_user_page('','',$getArr['title'],$offset,$limit);
                $this->load->view('user/index',$data);
            }else{
                $data['list'] = $this->user_model->get_user_page('','','',$offset,$limit);
                $this->load->view('user/index',$data);
            }
            
        }else{
        $data['list'] = $this->user_model->get_user_page('','','',$offset,$limit);
        $this->load->view('user/index',$data);
        }
    }
    /*
    
    用户的资料不应该被修改，这个方法已经被注释了

    修改资料
     */
    public function edit(){
        $getArr = $this->uri->uri_to_assoc();
    	$data['info'] = $this->user_model->get_user_info($getArr['uid']);
        if (IS_AJAX) {
            $data=$this->input->post();
            $row=$this->user_model->update_user($data['uid'],$data);
            if ($row) {
                $json = array('status' => 1,'info' => '更新成功');
                echo json_encode($json);
               
            }else{
                $json = array('status' => 0,'info' => '更新失败');
                echo json_encode($json);
            }
    	
        }else{
            $this->load->view('user/edit',$data);
        }

    }

    /*
    修改密码
     */
    public function change_password(){
        $getArr = $this->uri->uri_to_assoc();
        $data['uid'] = $getArr['uid'];
        if (IS_AJAX) {
            $data=$this->input->post();
            $data['pwd'] = md5('jld'.$data['pwd']);

            $row=$this->user_model->update_user($data['uid'],$data);

            if ($row) {
                $json = array('status' => 1,'info' => '修改成功');
                echo json_encode($json);
               
            }else{
                $json = array('status' => 0,'info' => '修改失败');
                echo json_encode($json);
            }
        
        }else{
            $this->load->view('user/change_password',$data);
        }
        
    }
    
    /*
    修改启用，删除的状态   
     */
    public  function change_status(){
        $uid = $this->input->get('uid');
        $data['state'] =$this->input->get('status');
        $row=$this->user_model->update_user($uid,$data);
        if ($row) {
            $json = array('status' => 1,'info' => '成功');
            echo json_encode($json);
        }else{
            $json = array('status' => 0,'info' => '失败');
            echo json_encode($json);
        }
        
    }
    /*
    批量删除
     */
    public function datadel(){
        $uids = $this->input->post('uids');
        if(!empty($uids)){
            $uids = explode('&', $uids);
            foreach ($uids as $k => $v) {
                $uids[$k]=substr($v,5);
            }
            if ($uids) {
               $row=$this->user_model->uidsdel($uids);
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

    function get_url() {
        $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
        $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
        return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
        }


}
