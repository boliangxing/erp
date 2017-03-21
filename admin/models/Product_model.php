<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {
      const PRODUCT = 'product';
      public function select(){
      $sql="SELECT * FROM product   ";
      $result =$this->db->query($sql)->result_array();
      return $result;
      }
      public function selectcg(){
      $sql="SELECT * FROM caigou   ";
      $result =$this->db->query($sql)->result_array();
      return $result;
      }
      public function selectAllForC($tid){
      $sql="SELECT * FROM cidian  where typeid like '3$tid%' ";
      $result =$this->db->query($sql)->result_array();
      return $result;
      }
      public function selectAllForF($tid,$nn){
      $sql="SELECT * FROM cidian  where typeid like '3$tid%' and tname like '%$nn%' ";
      $result =$this->db->query($sql)->result_array();
      return $result;
     }
     public function selectAll(){
      $sql="SELECT * FROM cidian  where typeid like '21001%' ";
      $result =$this->db->query($sql)->result_array();
      return $result;
     }
    public function selectpl($name, $num,$plan_num){
    $res= array();
    for($i=0;$i<$plan_num;$i++){
    $sql="SELECT * FROM yuanjian where name='$name[$i]' ";
    $res =$this->db->query($sql)->result_array();
    if($res){
    $res=$res;
    }else{
    $sql="insert into product_pl(name,num) VALUES('$name[$i]','$num[$i]')";
    $sql2="insert into yuanjian(name,num) VALUES('$name[$i]',0)";
    $this->db->query($sql);
    $this->db->query($sql2);
    $sqlcha="SELECT * FROM yuanjian where name='$name[$i]'";
    $recha2 =$this->db->query($sqlcha)->result_array();
    $res=$recha2;
    }
    }
    return $res;

  }

}
