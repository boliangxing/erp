<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bangong_model extends CI_Model {

  public function select(){

    $sql="SELECT * FROM bangong   ";

    $result =$this->db->query($sql)->result_array();
    return $result;


  }
public function bg_add($data){


  $this->db->insert('bangong',$data);
 return $this->db->insert_id();
}
public function type_select(){

$sql="select typeid,tname from cidian ";
$result =$this->db->query($sql)->result_array();

return $result;

}
}
