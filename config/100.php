<?php $plan=array (
  'rule' => 
  array (
    'D0' => 
    array (
      'name' => '报警',
      'formula' => 'arr',
      'units' => '0:正常,1:断网,2:其他',
      'memo' => '报警状态',
      'fieldname' => '',
    ),
    'D1' => 
    array (
      'name' => '开关',
      'formula' => 'arr',
      'units' => '0:关机,1:开机',
      'memo' => '',
      'fieldname' => 'power',
    ),
    'D2' => 
    array (
      'name' => '童锁',
      'formula' => 'arr',
      'units' => '1:锁,0:未锁',
      'memo' => '',
      'fieldname' => '',
    ),
    'D3' => 
    array (
      'name' => '从机连接状态',
      'formula' => '1',
      'units' => '',
      'memo' => '',
      'fieldname' => '',
    ),
    'D4' => 
    array (
      'name' => 'tcp',
      'formula' => '1',
      'units' => '',
      'memo' => '',
      'fieldname' => '',
    ),
    'D5' => 
    array (
      'name' => 'login',
      'formula' => '1',
      'units' => '',
      'memo' => '',
      'fieldname' => '',
    ),
    'D6' => 
    array (
      'name' => '温度',
      'formula' => '/10-50',
      'units' => '℃',
      'memo' => '',
      'fieldname' => 'temperature',
    ),
    'D7' => 
    array (
      'name' => '湿度',
      'formula' => '/10',
      'units' => '%',
      'memo' => '',
      'fieldname' => 'humidity',
    ),
    'D8' => 
    array (
      'name' => '粉尘',
      'formula' => '1',
      'units' => 'ug/m³',
      'memo' => '',
      'fieldname' => 'powder',
    ),
    'D9' => 
    array (
      'name' => '甲醛',
      'formula' => '1',
      'units' => 'ug/m³',
      'memo' => '',
      'fieldname' => 'formaldehyde',
    ),
  ),
  'output' => 
  array (
    0 => 'D1',
    1 => 'D6',
    2 => 'D7',
    3 => 'D8',
    4 => 'D9',
  ),
);