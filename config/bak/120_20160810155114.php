<?php $plan=array (
  'rule' => 
  array (
    'D0' => 
    array (
      'name' => '报警',
      'formula' => 'arr',
      'units' => '0:正常,1:断网,2:其他',
      'memo' => '0正常、其他 警报',
      'fieldname' => 'aLarm',
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
      'name' => '童锁',
      'formula' => 'arr',
      'units' => '1:锁,0未锁',
      'memo' => '',
      'fieldname' => 'lock',
    ),
    'D3' => 
    array (
      'name' => '从机连接状态',
      'formula' => '1',
      'units' => '',
      'memo' => '啊',
      'fieldname' => '',
    ),
    'D4' => 
    array (
      'name' => '主设备联网状态',
      'formula' => '1',
      'units' => '',
      'memo' => '0未连接tcp、1已连接tcp',
      'fieldname' => '',
    ),
    'D5' => 
    array (
      'name' => '设备登陆状态',
      'formula' => '1',
      'units' => '',
      'memo' => '',
      'fieldname' => '',
    ),
    'D6' => 
    array (
      'name' => '温度',
      'formula' => '/10',
      'units' => '℃',
      'memo' => '',
      'fieldname' => 'temp',
    ),
    'D7' => 
    array (
      'name' => '湿度',
      'formula' => '/10',
      'units' => '%',
      'memo' => '',
      'fieldname' => 'hum',
    ),
    'D8' => 
    array (
      'name' => 'XXX',
      'formula' => '1',
      'units' => '',
      'memo' => '',
      'fieldname' => '',
    ),
    'D9' => 
    array (
      'name' => 'XXXX',
      'formula' => '1',
      'units' => '',
      'memo' => '',
      'fieldname' => '',
    ),
  ),
  'output' => 
  array (
    0 => 'D0',
    1 => 'D1',
    2 => 'D2',
  ),
);