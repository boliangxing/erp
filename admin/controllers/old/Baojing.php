<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baojing extends Admin_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('baojing_model');
        $this->load->library('pagination');
        $this->config->load('pagination');
    }
    public function index(){
    	$args = $this->uri->uri_to_assoc ();
        $offset = empty ( $args['page'] ) ? '0' : $args['page'];
        $config['base_url'] = site_url('Baojing/index/page');
        $config['total_rows'] = $this->baojing_model->get_baojing_num();
        $config['uri_segment'] = 4;
        $limit = $this->config->config['per_page'];

        $this->pagination->initialize($config); 
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $config['total_rows'];

        $data['bjlist'] = $this->baojing_model->get_baojing_page($offset,$limit);

        $this->load->view('baojing/index',$data);
    }
}