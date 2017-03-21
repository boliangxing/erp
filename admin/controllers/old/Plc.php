<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plc extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('plc_model');
        $this->load->library('pagination');
        $this->config->load('pagination');
    }

    public function plctype(){

        //设置分页
        $args = $this->uri->uri_to_assoc ();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];
        $config['base_url'] = site_url('plc/plctype/page');
        $config['total_rows'] = $this->plc_model->get_plctype_num();
        //$config['per_page'] = $this->config->config['per_page']; ; 
        $config['uri_segment'] = 4;
        $limit = $this->config->config['per_page'];

        $this->pagination->initialize($config); 
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $config['total_rows'];

        $data['plctypeList'] = $this->plc_model->get_plctype_page($offset,$limit);
        $this->load->view('plc/plctype',$data);
    }

    public function plcinfo(){
        $plcid = is_numeric($this->uri->segment(3))?$this->uri->segment(3):$this->uri->segment(4);
        if (IS_POST) {
            $info=$this->input->post();
            $data=array($info['name']=>$info['val'],'uptime'=>time());
            $row=$this->plc_model->updata_lj_panelByid($info['id'],$data);
            if ($row) {
                $json = array('status' => 1,'info' => '更新成功');
                echo json_encode($json);
            }else{
                $json = array('status' => 0,'info' => '更新失败');
                echo json_encode($json);
            }
            
        }else{
            $data['plctinfoList']=$this->plc_model->get_lj_panel_page($plcid);
            $this->load->view('plc/plcinfo',$data);
        }
        
    }


    public function plcinfoadd(){
        if (IS_POST) {
            $data=$this->input->post();
            $data['uptime']=time();
            $row=$this->plc_model->add_lj_panel_info($data);
            if ($row) {
             redirect('/Plc/plcinfo/'.$data['plcid'], 'refresh');
            }else{
             echo "错误";
            }
        }else{
            $this->load->view('plc/plcinfoadd');
        }
       
    }

    public function delplcinfo(){
        if (IS_AJAX) {
            $data=$this->input->post();
            $row=$this->plc_model->del_lj_panelByid($data['id']);
            if ($row) {
                $json = array('status' => 1,'info' => '成功');
                echo json_encode($json);
            }else{
                $json = array('status' => 0,'info' => '失败');
                echo json_encode($json);
            }
        }
    }

    public function addplctype(){
        if(!empty($_POST)){
            $plcname = $this->input->post('plcname');
            
            echo $this->plc_model->add_plctype_byName($plcname);
            exit();
        }
        $this->load->view('plc/addplctype');
    }

    public function addplcdetail(){
        if(!empty($_POST)){

            $plcname = $this->input->post('plcname');
            $this->plc_model->add_plctype_byName($plcname);
            $plcid = $this->db->insert_id();

            //接收表单传来的值
            $panel = array(
                'seq'       => $this->input->POST('seq'),
                'parcode' => $this->input->POST('parcode'),
                'parname' => $this->input->POST('parname'),
                'formula' => $this->input->POST('formula'),
                'units' => $this->input->POST('units'),
                'ishow' => $this->input->POST('ishow'),
                'memo' => $this->input->POST('memo'),
                'dbtype' => $this->input->POST('dbtype'),
            );
            //添加方案的预设值
            $this->plc_model->add_panel_first_info($panel,$plcid);

            //添加表
            $this->load->model('data_model');
            $this->data_model->create_table($panel['parcode'], $plcid);

        }else{

            $plcname = $this->input->get('plcname');
            $Dnum = $this->input->get('Dnum');

            $createTable = $this->input->get('createTable'); 

            //正则判断Dnum格式...

            //解析Dnum
            $Drule = array();
            foreach(explode(",",$Dnum) as $D){
                $V = (explode("-",$D));
                switch(sizeof($V)){
                    case 1 :
                        $Drule[] = intval($V[0]);
                        break;
                    case 2 :
                        $V[0] >= $V[1] && exit('input error! every value must be biger');
                        while($V[0]<=$V[1]){
                            $Drule[] = intval($V[0]);
                            $V[0]++;
                        }
                        break;  
                    default : exit('input error');   
                }
                // 
            }
            $Drule = array_unique($Drule);
            sort($Drule);

            //解析结束
            
            $data = array(
                'plcname' => $plcname,
                'Drule' => $Drule,
                'createTable' => $createTable
            );

            $this->load->view('plc/addplcdetail',$data);
        }
    }

    public function editplctype(){
        if(!empty($_POST)){
            $plcname = $this->input->post('plcname');
            $plcid = $this->input->post('plcid');

            echo $this->plc_model->edit_plctype_plcnameByID($plcid,$plcname);
            exit();
        }
        $plcid = $this->uri->segment(3);
        $data['plc'] = $this->plc_model->get_plctype_byID($plcid);
        $this->load->view('plc/editplctype',$data);
    }

    public function delplctype(){
        $plcid = $this->input->post('plcid');
        echo $this->plc_model->del_plctype_byPlcid($plcid);
    }

    public function batchdelpcltype(){
        $plcids = $this->input->post('plcids');

        if(!empty($plcids)){
            $plcids = explode('&', $plcids);
            foreach ($plcids as $k => $v) {
                $plcids[$k]=substr($v,7);
            }
            if ($plcids) {
               $json = $this->plc_model->del_plctype_byPlcids($plcids) ? 
                            array('status' => 1,'info' => '成功') :
                            array('status' => 0,'info' => '失败') ;
            }else{
                $json = array('status' => 0,'info' => '请选择');
            }
            echo json_encode($json);
        }else{
            $json = array('status' => 0,'info' => '失败');
            echo json_encode($json);
        }
    }
}