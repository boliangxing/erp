<?php $plan=array (
  'rule' => 
  array (
    'D0' => 
    array (
      'name' => '报警',
      'formula' => '1',
      'units' => '0:正常,1:断网,2:其他',
      'memo' => '报警状态',
      'fieldname' => 'alarm',
    ),
    'D1' => 
    array (
      'name' => '开关',
      'formula' => '1',
      'units' => '0:关机,1开机',
      'memo' => '',
      'fieldname' => 'power',
    ),
    'D2' => 
    array (
      'name' => '档位',
      'formula' => '1',
      'units' => '1:1档,2:2档,3:3档,4:4档',
      'memo' => '',
      'fieldname' => 'gears',
    ),
    'D3' => 
    array (
      'name' => '功能',
      'formula' => '1',
      'units' => '0:无,1:紫外:2:负离子,3紫外负离子',
      'memo' => '0:无,1:紫外:2:负离子,3紫外负离子',
      'fieldname' => 'func',
    ),
    'D4' => 
    array (
      'name' => '模式',
      'formula' => '1',
      'units' => '0:手动,1:自动,2:静音',
      'memo' => '',
      'fieldname' => 'mode',
    ),
    'D5' => 
    array (
      'name' => '童锁',
      'formula' => '1',
      'units' => '1:锁,0未锁',
      'memo' => '',
      'fieldname' => 'lock',
    ),
    'D6' => 
    array (
      'name' => '粉尘',
      'formula' => '1',
      'units' => 'ug/m³',
      'memo' => '',
      'fieldname' => 'pm',
    ),
    'D7' => 
    array (
      'name' => '甲醛',
      'formula' => '1',
      'units' => 'ug/m³',
      'memo' => '',
      'fieldname' => 'hcho',
    ),
    'D8' => 
    array (
      'name' => '定时时间s',
      'formula' => '1',
      'units' => '秒',
      'memo' => '',
      'fieldname' => 'time',
    ),
    'D9' => 
    array (
      'name' => '运行时间h',
      'formula' => '1',
      'units' => '小时',
      'memo' => '',
      'fieldname' => 'rtime',
    ),
    'D10' => 
    array (
      'name' => '滤网使用时间h',
      'formula' => '1',
      'units' => '小时',
      'memo' => '',
      'fieldname' => 'stime',
    ),
    'D11' => 
    array (
      'name' => '定时剩余时间s',
      'formula' => '1',
      'units' => '秒',
      'memo' => '',
      'fieldname' => 'rmtime',
    ),
  ),
  'output' => 
  array (
    0 => 'D1',
    1 => 'D2',
    2 => 'D3',
    3 => 'D6',
    4 => 'D7',
    5 => 'D10',
  ),
);