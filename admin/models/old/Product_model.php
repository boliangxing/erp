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


  //
  //         $sql1="SELECT * FROM product_pl where name='$num[0]' ";
  //
  //       $res =$this->db->query($sql1)->result_array();
  //         if($res){
  //
  //        return $res;
  //  }else{
  //           $sqljia="insert into product_pl(name,num) VALUES('$num[0]',0)";
  //     	$this->db->query($sqljia);
  //             $sqlcha="SELECT * FROM product_pl where num>$name[0] ";
  //             $recha2 =$this->db->query($sql2)->result_array();
  //              return $recha2;
  // }
  //
  //



        }
    public function getProductPage($offset, $limit, $where = ''){
    	$sql = "SELECT * FROM ".self::PRODUCT." LIMIT $offset, $limit";
    	return $this->db->query($sql)->result_array();
    }

    public function getProductPageNum($where = ''){
    	$sql = "SELECT * FROM ".self::PRODUCT;
    	return $this->db->query($sql)->num_rows();
    }

    public function getProductInfoByID($product_id){
    	$sql = "SELECT * FROM ".self::PRODUCT." WHERE product_id = $product_id";
    	return $this->db->query($sql)->row_array();
    }

    public function updateProductByID($product_id, $data){
    	if(!empty($data['product_img'])){
    		$sql = "UPDATE ".self::PRODUCT." SET product_name = '{$data['product_name']}', product_des = '{$data['product_des']}', product_img = '{$data['product_img']}' WHERE product_id = $product_id";
    	}else{
    		$sql = "UPDATE ".self::PRODUCT." SET product_name = '{$data['product_name']}', product_des = '{$data['product_des']}' WHERE product_id = $product_id";
    	}

    	$this->db->query($sql);
    }
}
