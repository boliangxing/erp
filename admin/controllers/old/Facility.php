<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facility extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('facility_model');
        $this->load->library('pagination');
        $this->config->load('pagination');
    }

    public function index(){
        // 分页
        $args = $this->uri->uri_to_assoc ();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];
        $config['base_url'] = site_url('facility/index/page');
        $config['total_rows'] = $this->facility_model->get_facility_num();
        $config['uri_segment'] = 4;
        $config['per_page'] = 10;
        $limit = $config['per_page'];

        $this->pagination->initialize($config); 
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $config['total_rows'];

        $data['facilityList'] = $this->facility_model->get_facility_page($offset,$limit);

        include('../config/product_conf.php'); //载入配置文件

        $data['product_conf'] = $product_conf;


        $this->load->view('facility/index',$data);
    }

    public function show(){
        $args = $this->uri->uri_to_assoc ();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];

        $fid = $args['fid'];
        $id = $args['id'];

        $startime = isset ( $args['startime'] ) ? str_replace("%20"," ",$args['startime']) :  date("Y-m-d H:i:s",strtotime("-1 day"));
        $endtime = isset ( $args['endtime'] ) ? str_replace("%20"," ",$args['endtime']) :  date("Y-m-d H:i:s");

        $config['base_url'] = site_url('facility/show/fid/'.$fid.'/id/'.$id.'/startime/'.$startime.'/endtime/'.$endtime.'/page/');
        $config['total_rows'] = $this->facility_model->get_facility_data_num($fid, $id, $startime, $endtime);
        $config['uri_segment'] = 12;
        $limit = 50;

        $this->pagination->initialize($config); 
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $config['total_rows'];

        $data['list'] = $this->facility_model->get_facility_data_page($fid, $id, $startime, $endtime, $offset, $limit);
        $data['info'] = array('fid'=>$fid, 'id'=>$id, 'startime'=>$startime, 'endtime'=>$endtime);
        $data['info']['fac'] = $this->facility_model->get_facilit_info_byfid($fid);
        $this->load->view('facility/show', $data);
    }

    public function showbak(){
        $this->load->model('data_model');
        $this->load->model('plan_model');

        $fid = $this->uri->segment(3);
        $facilityInfo = $this->facility_model->get_facility_byID($fid);
        $facilityData = $this->data_model->get_lastone($facilityInfo['plcid'], $fid);

        $planid = $facilityInfo['planid'];
        $parameData = $this->plan_model->get_parameShow_byID($planid);

        $facilityDataList = array();

        //解析start
        $i = 0;
        foreach($parameData as $parameList){
            
            $facilityDataList[$i]['parname'] = $parameList['parname'];
            /*
            switch($parameList['dbtype']){
                case 'simula' : 
                    $facilityDataList[$i]['parcode'] = 'D'.$parameList['parcode'];
                    //$facilityDataList[$i]['formula'] = substr($parameList['formula'],-1)!='r' ? $parameList['formula'] : substr($parameList['formula'],0,-1);
                    $facilityDataList[$i]['formula'] = $parameList['formula'] != 1 ? $parameList['formula'] : '';
                    $facilityDataList[$i]['units'] = $parameList['units'];
                    $facilityDataList[$i]['value'] = $facilityData['D'.$parameList['parcode']];
                    $facilityDataList[$i]['truevalue'] = eval("return {$facilityDataList[$i]['value']}{$facilityDataList[$i]['formula']};");
                    break;

                case 'switch' : 
                    $facilityDataList[$i]['parcode'] = 'D'.$parameList['parcode'];//'K'.substr_replace($parameList['parcode'],'',strpos($parameList['parcode'],'.'),1);
                    if($parameList['bjzt']){
                        $facilityDataList[$i]['bjzt'] = true;
                        $facilityDataList[$i]['bjinfo'] = array('bjnote' => $parameList['bjnote'],'bjtj' => $parameList['bjtj']);
                    }else{
                        $facilityDataList[$i]['bjzt'] = false;
                    }
                    foreach(explode(",",$parameList['units']) as $v1){
                        $v2 = explode(":",$v1);
                        //var_dump($v2);
                        if($v2[0] == $facilityData['D'.$parameList['parcode']])
                            $facilityDataList[$i]['truevalue'] = $v2[1];
                    }
                    
                break;

                default : $facilityDataList[$i]['value'] = '?';
            }
            $i++;
            */
            switch($parameList['formula']){
                case 'arr' :
                    foreach(explode(",",$parameList['units']) as $v1){
                        $v2 = explode(":",$v1);
                        //var_dump($v2);
                        if($v2[0] == $facilityData['D'.$parameList['parcode']])
                            $facilityDataList[$i]['value'] = $v2[1];
                    }
                    break;
                case '1' :
                     $facilityDataList[$i]['value'] = $facilityData['D'.$parameList['parcode']];
                     $facilityDataList[$i]['units'] = $parameList['units'];
                     break;
                default :
                    $facilityDataList[$i]['value'] = eval("return {$facilityData['D'.$parameList['parcode']]}{$parameList['formula']};");
                    $facilityDataList[$i]['units'] = $parameList['units'];

            }
            $i++;
        }
        unset($facilityData);
        //解析end
        $data['facilityDataList']=$facilityDataList;
        /*var_dump($facilityDataList);*/
        $this->load->view('facility/show',$data);
        /*var_dump($facilityInfo);*/
        // var_dump($parameInfo);

    }

    public function baojing(){
        
    }

    public function data(){
        $data = $this->facility_model->get_data_page();
        var_dump($data);
    }
}