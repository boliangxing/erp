<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {
    const PROTYPE = 'product_type';
    const PRODUCT = 'product';

    public function get_protype_info_byID($typeid){
        $sql = "SELECT * FROM ".self::PROTYPE." WHERE typeid = $typeid";
        return $this->db->query($sql)->row_array();
    }

    public function get_protype_list(){
        $sql = "SELECT * FROM ".self::PROTYPE;
        return $this->db->query($sql)->result_array();
    }

    public function get_protype_list_page($offset=0, $limit=0){
        $sql = "SELECT * FROM ".self::PROTYPE." ORDER BY seq DESC LIMIT $offset,$limit";
        return $this->db->query($sql)->result_array();
    }

    public function get_protype_num(){
        $sql = "SELECT * FROM ".self::PROTYPE;
        return $this->db->query($sql)->num_rows();
    }

    public function add_protype($data){
        $sql = "INSERT INTO ".self::PROTYPE." (typename, seq) VALUES ('{$data['typename']}', '{$data['seq']}')";
        return $this->db->query($sql);
    }

    public function edit_protype_byID($data, $typeid){
        $sql = "UPDATE ".self::PROTYPE." SET typename='{$data['typename']}', seq='{$data['seq']}' WHERE typeid = $typeid";
        return $this->db->query($sql);
    }

    public function del_protype_byIDS($protype_ids){
        $sql = "DELETE FROM ".self::PROTYPE." WHERE typeid in (".implode(",", $protype_ids).")";
        return $this->db->query($sql);
    }

    #---------------------------------------------------

    public function get_product_info($product_id){
        $sql = "SELECT * FROM ".self::PRODUCT." WHERE product_id = $product_id";
        return $this->db->query($sql)->row_array();
    }

    public function get_product_list_page($offset=0, $limit=0){
        $sql = "SELECT * FROM ".self::PRODUCT." LIMIT $offset,$limit";
        return $this->db->query($sql)->result_array();
    }

    public function get_product_num(){
        $sql = "SELECT * FROM ".self::PRODUCT;
        return $this->db->query($sql)->num_rows();
    }

    public function add_product($data){
        $sql = "INSERT INTO ".self::PRODUCT." 
        (product_name, planid, typeid, photo ,memo) 
        VALUES 
        ('{$data['product_name']}', '{$data['planid']}', '{$data['typeid']}', '{$data['photo']}', '{$data['memo']}')";
        return $this->db->query($sql);
    }

    public function edit_product_byID($data, $product_id){
        $sql = "UPDATE ".self::PRODUCT." SET 
        product_name = '{$data['product_name']}', 
        planid = '{$data['planid']}', 
        typeid = '{$data['typeid']}',
        photo = '{$data['photo']}' ,
        memo = '{$data['memo']}' 
        WHERE product_id = $product_id";
        return $this->db->query($sql);
    }

    public function del_product_byIDS($product_ids=array()){
        $sql = "DELETE FROM ".self::PRODUCT." WHERE product_id in (".implode(",", $product_ids).")";
        return $this->db->query($sql);
    }
}