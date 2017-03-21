<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('plan_model');
        $this->load->model('plc_model');
        $this->load->library('pagination');
        $this->config->load('pagination');
    }

    public function index(){
        //读取一下PLC分类
        $args = $this->uri->uri_to_assoc ();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];
        $config['base_url'] = site_url('plan/index/page');
        $config['total_rows'] = $this->plan_model->get_plan_num();
        $config['uri_segment'] = 4;
        $limit = $this->config->config['per_page'];

        $this->pagination->initialize($config); 
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $config['total_rows'];

        $data['planList'] = $this->plan_model->get_plan_page($offset,$limit);

        $data['plcnameList'] = $this->plc_model->get_plctype_name();

        $data['num'] = $this->plan_model->get_plan_num();
    

        $this->load->view('plan/index',$data);
    }

    public function addplan(){
        if($_POST){
            $plcid = $this->input->post('plcid');
            $planname = $this->input->post('planname');

            echo $this->plan_model->add_plan_byPlcidPlanname($plcid,$planname) ? $this->db->insert_id() : 0;
        }
    }

    public function addplanbak(){
        $plcid=$this->input->get('plcid');
        
        if (IS_POST) {
            $post=$this->input->post();
            foreach ($post as $k => $v) {
                    $post[$k]=explode(' ,',$v);
            }
                    $data1=array();
                    $data2=array();
            foreach ($post as $k => $v) {
                    $planname=$v[0];
            }
                    $data1['planname']=$planname;
                    $data1['plcid']=$plcid;
                    $insert_id=$this->plan_model->add_plan('plan',$data1);
            foreach ($post as $key => $val) {
                    $data2['planid']=$insert_id;
                    $data2['parname']=$val[3];
                    $data2['dbtype']=$val[15];
                    $data2['parcode']=$val[2];
                    $data2['formula']=$val[8];
                    $data2['units']=$val[9];
                    $data2['ishow']=$val[10];
                    $data2['seq']=$val[1];
                    $row=$this->plan_model->add_plan('plan_parame',$data2);
            }
            if ($row) {
                        $json = array('status' => 1,'info' => '成功');
                        echo json_encode($json);
                    }else{
                        $json = array('status' => 0,'info' => '失败');
                        echo json_encode($json);
                    }
            
            
        }else{
            $data['plctinfoList']=$this->plc_model->get_lj_panel_page($plcid);
            $this->load->view('plan/addplan',$data);
        }
    }


    public function editplan(){
        $planid = $this->uri->segment(3);

        if($_POST){
            $planname = $this->input->post('planname');

            echo $this->plan_model->editplanName_byID($planid,$planname);
            exit();
        }
        $data['planInfo'] = $this->plan_model->get_plan_byID($planid);
        $this->load->view('plan/editplan',$data);
    }

    public function plandel(){
        if (IS_AJAX) {
            $data=$this->input->post();
            $row=$this->plan_model->del_planByid($data['id']);
            if ($row) {
                $json = array('status' => 1,'info' => '成功');
                //同时删除plan_parame
                $this->plan_model->del_plan_parame_byIDS(array($data['id']));
                echo json_encode($json);
            }else{
                $json = array('status' => 0,'info' => '失败');
                echo json_encode($json);
            }
        }
    }

    public function plansdel(){
        $planids = $this->input->post('planids');
        if(!empty($planids)){
            $planids = explode('&', $planids);
            foreach ($planids as $k => $v) {
                $planids[$k]=substr($v,8);
            }
            if ($planids) {
                $this->plan_model->del_plan_parame_byIDS($planids);
                exit;
               if($this->plan_model->del_plan_byPlanids($planids)){ 
                    $json = array('status' => 1,'info' => '成功');
                    //同时删除plan_parame
                    $this->plan_model->del_plan_parame_byIDS($planids);                    
                }else{
                    array('status' => 0,'info' => '失败') ;
                }
            }else{
                $json = array('status' => 0,'info' => '请选择');
            }
            echo json_encode($json);
        }else{
            $json = array('status' => 0,'info' => '失败');
            echo json_encode($json);
        }
    }


    # plan_parame

    public function plan_parame(){
        $this->load->model('plc_model');

        $data['planid'] = $this->uri->segment(3);
        $data['planinfo'] = $this->plan_model->get_plan_byID($data['planid']);
        $data['plan_parameList'] = $this->plan_model->get_plan_parame_byID($data['planid']);

        $plcid = $data['planinfo']['plcid'];
        //$data['plctypeinfo'] = $this->plc_model->get_plctype_byID($plcid);

        //plan_parcode 取自plan_parameList，用以选取的parcode 在 plc_panel 判断用户未选中的选项
        $plan_parcode = !empty($data['plan_parameList']) ? array_column($data['plan_parameList'], 'parcode') : NULL;
        $data['plcList'] = $this->plc_model->get_lj_panel_list_jiaoji_byID($plan_parcode, $plcid);


        $this->load->view('plan/plan_parame',$data);
    }

    public function add_plan_parame(){
        $data = $this->input->get();

        //checkdata
        //...
        
        if($this->plan_model->add_plan_parame($data)){
            echo $this->db->insert_id();
        }
    }

    public function change_plan_parame(){
        $id = $this->uri->segment(3);
        $data = $this->input->get();
        echo $this->plan_model->change_plan_parame($id,$data['name'],$data['value']);
    }

    public function del_plan_parame(){
        $id = $this->uri->segment(3);
        echo $this->plan_model->del_plan_parame_byID($id);
    }

    public function change_plan_parame_baojing(){
        $id = $this->input->get('id');
        $bjzt = $this->input->get('bjzt');

        echo $this->plan_model->change_plan_parame_baojing($id,$bjzt);
    }
}