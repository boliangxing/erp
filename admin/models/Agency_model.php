<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agency_model extends CI_Model {
	  public function selectAll(){
		$sql="SELECT * FROM agency ";
		$result =$this->db->query($sql)->result_array();
		return $result;
		}
    public function agency_add($data){
	  $this->db->insert('agency',$data);
 	  return $this->db->insert_id();
   }
		public function agency_del($id){
		$sql="DELETE FROM agency WHERE id='$id' ";
		$this->db->query($sql);
		return $this->db->query($sql);
		}
    public function selectAdd(){
    $sql="SELECT * FROM address";
    $result =$this->db->query($sql)->result_array();
    return $result;
    }
   public function selectp($id){
	 $sql="SELECT * FROM address where cparentid=$id and pparentid is null";
	 $result =$this->db->query($sql)->result_array();
	 return $result;
   }
  public function selectc($pid,$cid){
	$sql="SELECT * FROM address where cparentid=$cid and pparentid=$pid";
	$result =$this->db->query($sql)->result_array();
	return $result;
  }
  public function select($id){
	$sql="SELECT * FROM agency where id=$id ";
	$result =$this->db->query($sql)->result_array();
	return $result;
  }
  public function aup($id,$name,$lv,$address,$email,$remark){
  $sql="UPDATE agency SET name='$name',lv='$lv',address='$address',email='$email'
  ,remark='$remark' where id='$id'";
  $r =$this->db->query($sql);
  return $r;
}

}
