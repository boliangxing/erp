<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan_model extends CI_Model {
    const PLAN_PARAME = 'plan_parame';   //plc 控制板预设值
    const PLAN = 'plan';    //显示方案（读取方案）

    public function get_plan_list(){
      $sql = "SELECT * FROM ".self::PLAN;
      return $this->db->query($sql)->result_array();
    }

    public function get_plan_page($offset,$limit){
        $sql = "SELECT plan.planid,plan.planname,plan.xuhao,plctype.plcname FROM ".self::PLAN." plan LEFT JOIN plctype plctype ON plan.plcid = plctype.plcid ORDER BY xuhao LIMIT $offset,$limit";
        return $this->db->query($sql)->result_array();
    }


    public function get_plan_byID($planid){
        $sql = "SELECT plan.planid,plan.planname,plan.xuhao,plctype.plcname,plctype.plcid FROM ".self::PLAN." plan LEFT JOIN plctype ON plan.plcid = plctype.plcid WHERE planid = '$planid'";
        return $this->db->query($sql)->row_array();
    }

    public function add_plan($dbname,$data){
        $this->db->insert($dbname,$data); 
        return $this->db->insert_id();
    }

    public function add_plan_byPlcidPlanname($plcid,$planname){
        $sql = "INSERT INTO ".self::PLAN." (plcid,planname) VALUES ('$plcid','$planname')";
        return $this->db->query($sql);
    }

    public function del_planByid($id){
        $sql = "DELETE FROM plan WHERE planid = '$id'";
        return $this->db->query($sql);
    }

    public function del_plan_byPlanids($planids){
        $sql = "DELETE FROM plan WHERE planid in (".implode(',',$planids).')';
        return $this->db->query($sql);
    }

    public function get_plan_num(){
        $sql = "SELECT * FROM ".self::PLAN;
        return $this->db->query($sql)->num_rows();
    }

    public function get_parameShow_byID($planid){
        $sql = "SELECT * FROM ".self::PLAN_PARAME." WHERE planid = '$planid' AND ishow = 1 ORDER BY seq asc";
        return $this->db->query($sql)->result_array();
    }

    //not do
    public function editplanName_byID($planid,$planname){
        $sql = "UPDATE plan SET planname = '$planname' WHERE planid = '$planid'";
        return $this->db->query($sql);
    }


    /*-----------------------*/

    public function get_plan_parame_byID($planid){
        $sql = "SELECT * FROM ".self::PLAN_PARAME." WHERE planid = '$planid'";
        return $this->db->query($sql)->result_array();
    }
    
    public function add_plan_parame($data){
        $sql = "INSERT INTO ".self::PLAN_PARAME." 
                    ( planid,
                      parname,
                      dbtype,
                      parcode,
                      formula,
                      units,
                      bjzt,
                      bjtj,
                      bjnote,
                      ishow,
                      seq
                     ) VALUES (
                     '{$data['planid']}',
                     '{$data['parname']}',
                     '{$data['dbtype']}',
                     '{$data['parcode']}',
                     '{$data['formula']}',
                     '{$data['units']}',
                     '{$data['bjzt']}',
                     '{$data['bjtj']}',
                     '{$data['bjnote']}',
                     '{$data['ishow']}',
                     '{$data['seq']}'
                )";
        return $this->db->query($sql);
    }

    public function change_plan_parame($id,$name,$value){
        $sql = "UPDATE ".self::PLAN_PARAME." SET $name = '$value' WHERE id = '$id'";
        return $this->db->query($sql);
    }

    public function del_plan_parame_byID($id){
        $sql = "DELETE FROM ".self::PLAN_PARAME." WHERE id = '$id'";
        return $this->db->query($sql);
    }

    public function del_plan_parame_byIDS($planids = array()){
      $sql = "DELETE FROM ".self::PLAN_PARAME." WHERE planid in (".implode($planids).")";
      return $this->db->query($sql);
    }

    public function change_plan_parame_baojing($id,$bjzt){
        $sql = "UPDATE ".self::PLAN_PARAME." SET bjzt = '$bjzt' WHERE id = '$id'";
        return $this->db->query($sql);
    }
}