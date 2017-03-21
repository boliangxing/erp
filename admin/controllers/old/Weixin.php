<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('wechat_model');

        $sql = "SELECT * FROM wechat";
        $wechatInfo = $this->db->query($sql)->row_array();
        $a = array('token'=>$wechatInfo['Token'],'appID'=>$wechatInfo['appID'], 'appsecret'=>$wechatInfo['appsecret']);
        $this->load->library('wechat',array('token'=>$wechatInfo['Token'],'appID'=>$wechatInfo['appID'], 'appsecret'=>$wechatInfo['appsecret']));
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
            $this->load->view('weixin/setting',$data);
        }
    }

    //自定义菜单设置
    public function menu(){
        //获取历史自定义菜单数据
        //菜单数据文件
        // 
        $weinxin_menu_txt=$_SERVER["DOCUMENT_ROOT"]."/config/weixin_menu.txt";

        // var_dump($this->wechat->menuGet());
        if($_POST){
            $menuObj = json_decode($_POST['menu']);
            $menuArr = $this->objectToArray($menuObj);

            $file = fopen($weinxin_menu_txt, 'w');
            fwrite($file,$_POST['menu']);
            fclose($file);

            var_dump($this->wechat->menuCreate($menuArr));

        }else{

            //读取文件内容
            $file = fopen($weinxin_menu_txt, 'r');
            $menutxtdata=fread($file,filesize($weinxin_menu_txt));
            fclose($file);

            $data['menu'] =  $menutxtdata;
            $this->load->view('weixin/menu',$data);
        }

      

    }

    //关键词回复
    public function reply(){

        if($_POST){
            // $title = $_POST['title'];
            // $content = $_POST['content'];
            // $content = $_POST['url'];
            // 

            $filename = time();
            $config['upload_path'] = '../uploads/img/';
            $config['allowed_types'] = 'jpg|png';
            $config['file_name'] = $filename;
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('img')){
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);                  
            } 
            else{
                echo "<pre>";
                $data = $this->upload->data();
                // var_dump($data);exit;
                $fileInfo = "@{$data['full_path']};type=image;filename={$data['file_name']};filelength={$data['file_size']};content-type={$data['file_type']};Content-Disposition: form-data;";
                var_dump($this->wechat->uploadMaterialImage($fileInfo));

                exit;
            }


        }


        $this->load->view('weixin/reply');
    }

    public function objectToArray($e){
        $e=(array)$e;
        foreach($e as $k=>$v){
            if( gettype($v)=='resource' ) return;
            if( gettype($v)=='object' || gettype($v)=='array' )
                $e[$k]=(array)$this->objectToArray($v);
        }
        return $e;
    }

}
