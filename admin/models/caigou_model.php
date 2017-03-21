<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class caigou_model extends CI_Model {

  public function selectrc(){
  $sql="SELECT * FROM rc_caigou   ";
  $result =$this->db->query($sql)->result_array();
  return $result;
  }
  }
