<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends Admin_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('feedback_model');
        $this->load->library('pagination');
        $this->config->load('pagination');
    }

    public function index(){

    	$args = $this->uri->uri_to_assoc();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];
        $config['base_url'] = site_url('feedback/index/page');
        $config['total_rows'] = $this->feedback_model->get_feedback_num();
        $config['uri_segment'] = 4;
        $config['per_page'] = 10;
        $limit = $config['per_page'];
        
        $this->pagination->initialize($config); 
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $config['total_rows'];

        $data['feedbackList'] = $this->feedback_model->get_feedback_page($offset,$limit);

        $this->load->view('feedback/index', $data);

    }

    public function change_status(){
    	 $id = $this->input->get('id');
    	 $status = $this->input->get('status');
    	 if(!empty($id) && !empty($status)){
    	 	$row = $this->feedback_model->del_feedback($id, $status);

    	 	if ($row) {
	    	 	$json = array('status' => 1,'info' => '成功');
	    	 	echo json_encode($json);
    	 	}else{
    	 	    $json = array('status' => 0,'info' => '失败');
    	 	    echo json_encode($json);
    	 	}
    	 }
    }


    // public function index(){
    //     // 分页
    //     $args = $this->uri->uri_to_assoc ();
    //     $offset = empty ( $args['page'] ) ? '0' : $args['page'];
    //     $config['base_url'] = site_url('feedback/index/page');
    //     $config['total_rows'] = $this->facility_model->get_facility_num();
    //     $config['uri_segment'] = 4;
    //     $config['per_page'] = 10;
    //     $limit = $config['per_page'];

    //     $this->pagination->initialize($config); 
    //     $data['page'] = $this->pagination->create_links();
    //     $data['num'] = $config['total_rows'];

    //     $data['facilityList'] = $this->facility_model->get_facility_page($offset,$limit);

    //     $this->load->view('facility/index',$data);
    // }

}