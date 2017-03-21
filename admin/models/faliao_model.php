<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class faliao_model extends CI_Model {
    public function select(){
    $sql="SELECT * FROM faliao   ";
    $result =$this->db->query($sql)->result_array();
    return $result;
    }
    public function fl_add($data){
    $this->db->insert('faliao',$data);
    return $this->db->insert_id();
    }
    }
