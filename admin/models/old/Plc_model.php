<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plc_model extends CI_Model {
    const PLCTYPE = 'plctype';  //plc 控制版
    const PANEL = 'panel';   //plc 控制板预设值

    # PLCTYPE TABLE

    public function get_plctype_byID($plcid){
        $sql = "SELECT * FROM ".self::PLCTYPE." WHERE plcid = '$plcid'";
        return $this->db->query($sql)->row_array();
    }

    public function get_plctypeids(){
        $sql = "SELECT plcid FROM ".self::PLCTYPE;
        return $this->db->query($sql)->result_array();
    }

    public function get_plctype_page($offset,$limit){
        $sql = "SELECT * FROM ".self::PLCTYPE." limit $offset,$limit";
        return $this->db->query($sql)->result_array();
    }

    public function get_plctype_num(){
        $sql = "SELECT * FROM ".self::PLCTYPE;
        return $this->db->query($sql)->num_rows();
    }

    public function get_plctype_name(){
        $sql = "SELECT plcid,plcname FROM ".self::PLCTYPE;
        return $this->db->query($sql)->result_array();
    }

    public function add_plctype_byName($plcname){
        $sql = "INSERT INTO ".self::PLCTYPE." (plcname) VALUES ('$plcname')";
        return $this->db->query($sql);
    }


    public function edit_plctype_plcnameByID($plcid,$plcname){
        $sql = "UPDATE ".self::PLCTYPE." SET plcname = '$plcname' WHERE plcid = '$plcid'";
        return $this->db->query($sql);
    }

    public function del_plctype_byPlcid($plcid){
        $sql = "DELETE FROM ".self::PLCTYPE ." WHERE plcid = '$plcid'";
        return $this->db->query($sql);
    }

    public function del_plctype_byPlcids($plcidArr){
        $sql = "DELETE FROM ".self::PLCTYPE ." WHERE plcid in (".implode(',',$plcidArr).')';
        return $this->db->query($sql);
    }

    # PLNEL TABLE

    public function get_lj_panel_list_jiaoji_byID($parcode = array(), $plcid){
        if(empty($parcode)){
            $sql = "SELECT * FROM ".self::PANEL." WHERE plcid = '$plcid'";
        }else{
            $parcodeStr = !empty($parcode) ? implode("','",$parcode) : '';
            $sql = "SELECT * FROM ".self::PANEL." WHERE plcid = '$plcid' AND parcode not in ('$parcodeStr')";
        }

        return $this->db->query($sql)->result_array();
    }

    public function get_lj_panel_page($plcid){
         $sql = "SELECT * FROM panel WHERE plcid=".$plcid." ORDER BY seq asc";
        return $this->db->query($sql)->result_array();
    }

    public function updata_lj_panelByid($id,$data){
        $where['id'] = $id;
        $result=$this->db->update('panel', $data, $where);
        //返回值  
        return $result; 
    }

    public function add_lj_panel_info($data){
        $result=$this->db->insert('panel', $data); 
        return $result; 
    }

    public function add_panel_first_info($data,$plcid){
        $sql = '';

        foreach($data['seq'] as $key=>$val){
            $sql .= "('".$plcid."',";
            $sql .= "'".$data['seq'][$key]."',";
            $sql .= "'".substr($data['parcode'][$key],1)."',";
            $sql .= "'".$data['parname'][$key]."',";
            $sql .= "'".$data['formula'][$key]."',";
            $sql .= "'".$data['units'][$key]."',";
            $sql .= "'".(isset($data['ishow'][$key]) ? 1 : 0)."',";
            $sql .= "'".$data['memo'][$key]."',";
            $sql .= "'".$data['dbtype'][$key]."',";
            $sql .= "'".$data['fileidname'][$key]."'),";
        }
        
        $sql = "INSERT INTO ".self::PANEL." (plcid, seq, parcode, parname, formula, units, ishow, memo, dbtype) VALUES ".substr($sql,0,-1);
        $this->db->query($sql);

    }

    public function del_lj_panelByid($id){
        $sql = "DELETE FROM panel WHERE id = '$id'";
        return $this->db->query($sql);
    }

    public function get_lj_panel_plcids(){
        $sql = "SELECT distinct plcid FROM panel ORDER BY plcid asc";
        return $this->db->query($sql)->result_array();
    }
}