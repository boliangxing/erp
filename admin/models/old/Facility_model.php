<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facility_model extends CI_Model {
    const FACILITY = 'facility';

    public function get_facilit_info_byfid($fid){
        $sql = "SELECT * FROM facility WHERE fid = $fid";
        return $this->db->query($sql)->row_array();
    }

    public function get_facility_page(){
        $sql = "SELECT fid,f.cpuid,facname,ipaddr,phone,f.product_id,product_name,subfac,addtime,f.uptime,power FROM ".self::FACILITY." f LEFT JOIN users u ON f.uid = u.uid LEFT JOIN product p ON f.product_id = p.product_id LEFT JOIN online o ON f.cpuid = o.cpuid";
        return $this->db->query($sql)->result_array();
    }

    public function get_facility_data_page($fid, $product_id, $startime, $endtime, $offset, $limit){
        $sql = "SELECT * FROM fdata_".$product_id." WHERE fid = '$fid' AND uptime > '$startime' AND uptime < '$endtime' order by uptime desc limit $offset, $limit";
        return $this->db->query($sql)->result_array();
    }

    public function get_facility_data_num($fid, $product_id, $startime, $endtime){
        $sql = "SELECT count(1) as num FROM fdata_".$product_id." WHERE fid = $fid AND uptime > '$startime' AND uptime < '$endtime' order by uptime desc";
        $res = $this->db->query($sql)->row_array();
        return $res['num'];
    }

    public function get_facility_byID($fid){
        $sql = "SELECT * FROM ".self::FACILITY."  f LEFT JOIN product p ON f.product_id = p.product_id LEFT JOIN plan ON p.planid = plan.planid WHERE fid = '$fid'";
        return $this->db->query($sql)->row_array();
    }


    public function get_facility_num(){
        $sql = "SELECT * FROM ".self::FACILITY;
        return $this->db->query($sql)->num_rows();
    }
}