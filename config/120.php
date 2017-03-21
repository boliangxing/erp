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
      'fieldname' => 'lock',
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
      'name' => '主设备联网状态',
      'formula' => 'arr',
      'units' => '0:未连接tcp,1:已连接tcp',
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
    1 => 'D6',
    2 => 'D7',
  ),
  'attached' => 
  array (
    'table' => '101',
    'rule' => 
    array (
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
        'units' => '0:无,1:紫外:2:负离子,3:紫外负离子',
        'memo' => '',
        'fieldname' => 'func',
      ),
      'D6' => 
      array (
        'name' => '粉尘',
        'formula' => '1',
        'units' => 'ug/m³',
        'memo' => '',
        'fieldname' => 'dust',
      ),
      'D7' => 
      array (
        'name' => '甲醛',
        'formula' => '1',
        'units' => 'ug/m³',
        'memo' => '',
        'fieldname' => 'formaldehyde',
      ),
      'D10' => 
      array (
        'name' => '滤网使用时间h',
        'formula' => '1',
        'units' => '小时',
        'memo' => '',
        'fieldname' => 'strainerusetime',
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
  ),
);