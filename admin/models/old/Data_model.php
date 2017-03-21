<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model {
    const DATA = 'zgdata_plcid8';

    public function create_table($parcode,$plcid=1){

        $tablename = 'zgdata_plcid'.$plcid.'_'.date('Ym',time());

        $sql = "create table $tablename (
                id int not null primary key auto_increment,
                fid varchar(50) not null,
                instime datetime not null,
                uptime datetime not null,";
        foreach($parcode as $val){
            $sql.=" $val mediumint(5) ,";
        }
        $sql = substr($sql,0,-1).')';
        echo $this->db->query($sql);
    }

    public function get_data_name_byPlcID($plcid){
        $sql = "SHOW TABLES LIKE 'zgdata_plcid".$plcid."_%'";
        $result=$this->db->query($sql)->row_array();
        return current($result);
    }

    public function get_lastone($plcid = 0, $fid = 0){
        $tablename = $this->get_data_name_byPlcID($plcid);
        $sql = "SELECT * FROM $tablename WHERE fid = $fid ORDER BY instime DESC LIMIT 1";
        return $this->db->query($sql)->row_array();
    }
    
    public function get_data_num(){
        $sql = "SELECT * FROM ".self::DATA;
        return $this->db->query($sql)->num_rows();
    }
    public function get_data_page($offset,$limit){
        $sql = "SELECT * FROM ".self::DATA." limit $offset,$limit";
        return $this->db->query($sql)->result_array();
    }
}