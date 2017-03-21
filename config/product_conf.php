<?php
/*
主控产品和从机编号对应数据表名称

00 主控设备对应表名称 fdata_100
01 主控设备对应表名称 fdata_101
02 主控设备对应表名称 fdata_102
03 主控设备对应表名称 fdata_103



数据库表名称
//fdata_100空气管家,
//fdata_101 空气净化器主机
//fdata_102 地暖
//fdata_103 加湿器

//fdata_110 地暖控制面板
//fdata_120 空气盒子

*/





//100-109空气管家
$product_conf[100]=array('00'=>'100', '01'=>'101', '02'=>'102', '03'=>'103');




//110-119地暖控制盒, 只控制地暖102表
$product_conf[110]=array('00'=>'110', '01'=>'102');




//120-129空气盒子 只控制空气净化器101
$product_conf[120]=array('00'=>'120', '01'=>'101');