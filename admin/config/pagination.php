<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| 配置分页
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
*/

# 样式
$config['first_link'] = '首页';
$config['last_link'] = '末页';
$config['prev_link'] = '«';
$config['next_link'] = '»';
// $config['first_tag_open'] = '<li class="previous"><a href="#">';
// $config['first_tag_close'] = '</a></li>';

//当前页
$config['cur_tag_open'] = '<li class="active dh_pageLi"><a href="#">';
$config['cur_tag_close'] = '</a></li>';

//上一页
$config['prev_tag_open'] = '<li class="previous">';
$config['prev_tag_close'] = '</li>';

//下一页
$config['next_tag_open'] = '<li class="previous">';
$config['next_tag_close'] = '</li>';

// //去掉最后一页
// $config['last_link'] = FALSE;

// //去掉第一页
// $config['first_link'] = FALSE;

$config['first_tag_open'] = '<li class="previous">';
$config['first_tag_close'] = '</li>';

$config['last_tag_open'] = '<li class="previous">';
$config['last_tag_close'] = '</li>';

//数字页
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['use_page_numbers'] = FALSE;

$config['total_rows'] = 200;
$config['per_page'] = 5; 

/* End of file database.php */
/* Location: ./system/application/config/database.php */