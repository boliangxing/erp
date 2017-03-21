<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

		public function login($user,$pwd){
            $sql="SELECT * FROM admin WHERE num='$user' AND pwd='$pwd'";

             //if ($row->num_rows()) {
              //  $ip=$this->input->ip_address();
              //  $this->db->set('login_ip',$ip);
          //      $this->db->set('login_time',date('Y-m-d H:i:s',time()));

            //    $this->db->set('login_hit','login_hit+1',false);
              //  $this->db->where('num', $user);
              //  $this->db->update('admin');

              //  return $row->num_rows();
          //  }else{
          //  }

 						$result =$this->db->query($sql)->result_array();
						return $result;
    	}






}
