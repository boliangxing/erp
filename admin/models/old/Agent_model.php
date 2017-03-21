<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent_model extends CI_Model {
    	
		public function get_agent_page($offset,$limit){
	        $sql = "SELECT * FROM agent limit $offset,$limit";
	        return $this->db->query($sql)->result_array();
    	}	

    	public function get_agent_num(){
	        $sql = "SELECT * FROM agent";
	        return $this->db->query($sql)->num_rows();
    	}
    	public function get_agent_info($id){
    		$sql="SELECT * FROM agent WHERE agent_id=".$id;
    		$result =$this->db->query($sql)->row_array();
    		return $result;
    	}
    	public function update_agent($agentid,$data){
	    	$where['agent_id'] = $agentid;
	        $result=$this->db->update('agent', $data, $where);
	        //返回值  
	        return $result;  
    	}
    	public function del_agent($id){
	    	$sql="DELETE FROM agent WHERE agent_id=".$id;
    		return $this->db->query($sql);
    	}
        public function agentidsdel($agentids){
        if ($agentids) {
            $sql = "DELETE FROM agent WHERE agent_id in (".implode(',',$agentids).')';
            return $this->db->query($sql);
        }else{
            return false;
        }
        }

        public function agent_add($data){
            $this->db->insert('agent',$data); 
            return $this->db->insert_id();
        }
       
    
    
}
