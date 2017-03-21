<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Baojing_model extends CI_Model {
   public function get_baojing_page($offset,$limit){
        $sql = "SELECT * FROM baojing limit $offset,$limit";
        return $this->db->query($sql)->result_array();
    }
    public function get_baojing_num(){
        $sql = "SELECT * FROM baojing";
        return $this->db->query($sql)->num_rows();
    }
}