<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dianzu_fa_model extends CI_Model {

  public function dzfa_add($data){
  $this->db->insert('Dianzu_fa',$data);
  return $this->db->insert_id();
  }
  public function dz_select(){
  $sql="select * from Dianzu_fa";
  $result =$this->db->query($sql)->result_array();
  return $result;
  }
  public function type_select(){
  $sql="select * from cidian where typeid like '1%' ";
  $result =$this->db->query($sql)->result_array();
  return $result;
 }
 }
