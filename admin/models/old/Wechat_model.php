<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wechat_model extends CI_Model {

    public function getSetting(){
        $sql = "SELECT * FROM wechat";
        return $this->db->query($sql)->row_array();
    }

    public function editSetting($data){
        $sql = "UPDATE wechat set name = '{$data['name']}', account = '{$data['account']}', appID = '{$data['appid']}', appsecret = '{$data['appsecret']}', Token = '{$data['token']}'";
        return $this->db->query($sql);
    }

    public function WechatSetting($data){
        $sql = "INSERT INTO wechat (name, appID, appsecret, account, Token) VALUES ('{$data['name']}', '{$data['appid']}', '{$data['appsecret']}', '{$data['account']}', '{$data['token']}')";
        return $this->db->query($sql);
    }
}

