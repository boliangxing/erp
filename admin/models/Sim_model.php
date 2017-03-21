<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sim_model extends CI_Model {

    public function select(){
    $sql="SELECT * FROM wyd_mobile   ";
    $result =$this->db->query($sql)->result_array();
    return $result;
    }
    public function sim_add($data){
    $this->db->insert('wyd_mobile',$data);
    return $this->db->insert_id();
    }
    }
