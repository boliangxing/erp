<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fujian_model extends CI_Model {

  public function select(){

    $sql="SELECT * FROM fujian   ";

    $result =$this->db->query($sql)->result_array();
    return $result;


  }
public function fj_add($data){


  $this->db->insert('fujian',$data);
 return $this->db->insert_id();
}
public function type_select(){

$sql="select typeid,tname from cidian ";
$result =$this->db->query($sql)->result_array();

return $result;

}
}
