<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

		public function login($user,$pwd){
            $sql="SELECT * FROM admin WHERE num='$user' AND pwd='$pwd'";
 						$result =$this->db->query($sql)->result_array();
						return $result;
    	}
}
