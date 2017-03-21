<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cidian_model extends CI_Model {

  public function select(){

    $sql="SELECT * FROM cidian  where typeid like '1%' order by typeid asc";

    $result =$this->db->query($sql)->result_array();
    return $result;


  }

  public function cidian_id($typeid){
    $sql="SELECT typeid,tname FROM cidian  where  typeid = '$typeid'";

    $result =$this->db->query($sql)->result_array();
    return $result;


  }
  public function cidian_cx($typeid){
    $sql="SELECT  * FROM cidian  where  typeid like '$typeid%' order by typeid asc";

    $result =$this->db->query($sql)->result_array();
    return $result;

  }
  public function cidian_cxs($typeid,$nn){
    $sql="SELECT  * FROM cidian  where  typeid like '$typeid%' and tname like '%$nn%' order by typeid asc";

    $result =$this->db->query($sql)->result_array();
    return $result;

  }
  public function cidian_zong($ptid){
  $sql="SELECT typeid FROM cidian  where  typeid like '$ptid%' order by id desc ";

    $result =$this->db->query($sql)->result_array();
    return $result;


  }
public function cidian_add($typeid,$tname){

    $sql="insert into cidian(typeid,tname) value($typeid,'$tname')";
    $result =$this->db->query($sql);
    return $result;
}

public function cidian_typeid($typeid){

  $sql="SELECT typeid FROM cidian  where  typeid like '$typeid%' order by typeid desc ";

  $result =$this->db->query($sql)->result_array();
  return $result;

}
}
