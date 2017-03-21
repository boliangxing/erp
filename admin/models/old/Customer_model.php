<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {

	  public function selectAll(){

			$sql="SELECT * FROM customer ";

			$result =$this->db->query($sql)->result_array();
			return $result;


		}
		public function selectLei(){

						$sql="SELECT * FROM customer_leibie ";

						$result =$this->db->query($sql)->result_array();
						return $result;

		}
		public function leibie_add($data){


 $this->db->insert('customer_leibie',$data);
return $this->db->insert_id();
		}

				public function leibie_del($id){
					$sql="DELETE FROM customer_leibie WHERE id='$id' ";
				$this->db->query($sql);
					return $this->db->query($sql);


				}

				public function selectLEIBIE($id){

					$sql="SELECT * FROM customer_leibie where id=$id ";
						$result =$this->db->query($sql)->result_array();
					return $result;

				}
				public function lup($id,$leibie){
				$sql="UPDATE customer_leibie SET leibie='$leibie'
		 where id='$id'";
				$r =$this->db->query($sql);
				return $r;


				}
 public function customer_add($data){

	 $this->db->insert('customer',$data);
 	return $this->db->insert_id();

 }




		public function customer_del($id){
			$sql="DELETE FROM customer WHERE id='$id' ";
		$this->db->query($sql);
			return $this->db->query($sql);


		}


public function select($id){
	$sql="SELECT * FROM customer where id=$id ";
		$result =$this->db->query($sql)->result_array();
	return $result;

}
public function cup($id,$name,$leibie,$remark){
$sql="UPDATE customer SET name='$name',leibie='$leibie'
,remark='$remark' where id='$id'";
$r =$this->db->query($sql);
return $r;


}
}
