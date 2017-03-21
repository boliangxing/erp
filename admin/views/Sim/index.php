<?php $this->load->view('header');?>

<div class="cl pd-5 bg-1 bk-gray mt-20">
 <a href="javascript:;" onclick="xs_add('添加','<?php echo site_url('Sim/sim_add') ?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加SIM卡</a>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">id</th>
				 

        	<th width="100">串号</th>
          <th width="100">cid</th>
          <th width="100">手机号</th>
          <th width="100">dtuid</th>
          <th width="100">userr_id</th>
          <th width="100">userr</th>
          <th width="100">svpass</th>
          <th width="100">省</th>
          <th width="100">市</th>
          <th width="100">归属地 </th>

     <th width="100">添加时间</th>
          <th width="100">更新时间</th>
          <th width="100">starttime</th>
          <th width="100">exptime</th>
          <th width="100">余额 </th>
         <th width="100">套餐流量</th>
          <th width="100">剩余流量</th>
          <th width="100">已用流量</th>
          <th width="100">总消费</th>
          <th width="100">卡状态 </th>
<th width="100">来源</th>
          <th width="100">修改时间</th>
          <th width="100">充值时间</th>
          <th width="100">memo</th>
          <th width="100">最后连接时间 </th>
          <th width="100">回收</th>
          <th width="100">最后query时间</th>
    
 			</tr>
		</thead>
		<tbody>
      <?php foreach($list as $row){ ?>
      <tr class="text-c">
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['chuanhao'] ?></td>
              <td><?php echo $row['cid'] ?></td>
      <td><?php echo $row['mobile'] ?></td>
  <td><?php echo $row['dtuid'] ?></td>
  <td><?php echo $row['userr_id'] ?></td>
  <td><?php echo $row['userr'] ?></td>
        <td><?php echo $row['taocan'] ?></td>
<td><?php echo $row['svrpass'] ?></td>
<td><?php echo $row['sheng'] ?></td>
<td><?php echo $row['city'] ?></td>
<td><?php echo $row['guishu'] ?></td>
<td><?php echo $row['addtime'] ?></td>
<td><?php echo $row['retime'] ?></td>
<td><?php echo $row['starttime'] ?></td>
<td><?php echo $row['exptime'] ?></td>
<td><?php echo $row['yumoney'] ?></td>
<td><?php echo $row['dataflow'] ?></td>
<td><?php echo $row['yuflow'] ?></td>
<td><?php echo $row['usedflow'] ?></td>
<td><?php echo $row['zongxiaofei'] ?></td>
<td><?php echo $row['simstatus'] ?></td>
<td><?php echo $row['laiyuan'] ?></td>
<td><?php echo $row['uptime'] ?></td>

<td><?php echo $row['cztime'] ?></td>
<td><?php echo $row['memo'] ?></td>
<td><?php echo $row['lastlinktime'] ?></td>
<td><?php echo $row['huishou'] ?></td>
<td><?php echo $row['lastquerytime'] ?></td>
 
          </tr>
          <?php }?>



 		</tbody>
	</table>
	</div>
</div>
<?php $this->load->view('footer');?>

<script type="text/javascript">
function xs_add(title,url){
  var index = layer.open({
    type: 2,
    title: title,
    content: url
  });
  layer.full(index);
}


</script>
