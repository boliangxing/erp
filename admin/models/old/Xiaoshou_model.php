<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class xiaoshou_model extends CI_Model {

  public function select(){

    $sql="SELECT * FROM xiaoshou   ";

    $result =$this->db->query($sql)->result_array();
    return $result;


  }
public function xs_add($data){


  $this->db->insert('xiaoshou',$data);
 return $this->db->insert_id();
}

}
