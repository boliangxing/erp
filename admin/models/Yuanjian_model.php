<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yuanjian_model extends CI_Model {

    public function select(){
    $sql="SELECT * FROM yuanjian   ";
    $result =$this->db->query($sql)->result_array();
    return $result;
    }
    public function selectyj($name,$typeid){
    $sql="select * from yuanjian where name='$name' and typeid='$typeid'  ";
    $result =$this->db->query($sql)->result_array();
    return $result;
    }
    public function yj_add($data){
    $this->db->insert('yuanjian',$data);
    return $this->db->insert_id();
    }
    public function type_select(){
    $sql="select typeid,tname from cidian where typeid like '1%' ";
    $result =$this->db->query($sql)->result_array();
    return $result;
   }
   public function selectt($tid){
   $sql="SELECT * FROM yuanjian where typeid=$tid ";
	 $result =$this->db->query($sql)->result_array();
	 return $result;
 }  
  public function selectany($name){
   $sql="SELECT * FROM yuanjian where  name like '%$name%'";
     $result =$this->db->query($sql)->result_array();
     return $result;
 }
 
    public function selectnull(){
   $sql="SELECT * FROM yuanjian  ";
     $result =$this->db->query($sql)->result_array();
     return $result;
 }

 }
