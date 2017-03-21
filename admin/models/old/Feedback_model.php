<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_model extends CI_Model {
    const FEEDBACK = 'feedback';   //plc 控制板预设值

    public function get_feedback_page($offset, $limit){
        $sql = "SELECT f.*,u.nick FROM ".self::FEEDBACK." f LEFT JOIN users u ON f.uid = u.uid  WHERE status > 0 order by f.time desc LIMIT $offset,$limit";
        return $this->db->query($sql)->result_array();
    }

    public function get_feedback_num(){
        $sql = "SELECT * FROM ".self::FEEDBACK;
        return $this->db->query($sql)->num_rows();
    }

    public function del_feedback($id, $status){
        $sql = "UPDATE ".self::FEEDBACK." SET status = $status WHERE id = $id";
        return $this->db->query($sql);
    }
}