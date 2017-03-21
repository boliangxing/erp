<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wechat extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('wechat_model');
    }

    public function setting(){
        if($_POST){
            $data = array(
                'name'      => $this->input->post('name'),
                'account'   => $this->input->post('account'),
                'appid'     => $this->input->post('appid'),
                'appsecret' => $this->input->post('appsecret'),
                'token'     => $this->input->post('token')
            );

            if($this->wechat_model->getSetting()){
                //修改配置
                $json = $this->wechat_model->editSetting($data) ? 
                    array('status' => 1,'info' => '更新成功') :
                    array('status' => 0,'info' => '更新失败') ;
            }else{
                //新增配置
                $json = $this->wechat_model->WechatSetting($data) ?
                    array('status' => 1,'info' => '配置成功') :
                    array('status' => 0,'info' => '配置失败') ;
            }

            echo json_encode($json);
        }else{
            $data['setting'] = $this->wechat_model->getSetting();
            $this->load->view('wechat/setting',$data);
        }
    }
}
