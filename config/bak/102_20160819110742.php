<?php $plan=array (
  'rule' => 
  array (
    'D0' => 
    array (
      'name' => '报警',
      'formula' => 'arr',
      'units' => '0:正常,1:断网,2:其他',
      'memo' => '',
      'fieldname' => '',
    ),
    'D1' => 
    array (
      'name' => '开关',
      'formula' => 'arr',
      'units' => '0:关机,1开机',
      'memo' => '',
      'fieldname' => 'power',
    ),
    'D2' => 
    array (
      'name' => '设置温度',
      'formula' => '/10',
      'units' => '℃',
      'memo' => '',
      'fieldname' => 'settemperature',
    ),
    'D3' => 
    array (
      'name' => '当前温度',
      'formula' => '/10-50',
      'units' => '℃',
      'memo' => '',
      'fieldname' => 'temperature',
    ),
    'D4' => 
    array (
      'name' => '阀门开关',
      'formula' => 'arr',
      'units' => '0:关,1:开',
      'memo' => '',
      'fieldname' => 'tap',
    ),
  ),
  'output' => 
  array (
    0 => 'D1',
    1 => 'D2',
    2 => 'D3',
    3 => 'D4',
  ),
);