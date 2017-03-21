<?php $this->load->view('header');?>

<div class="cl pd-5 bg-1 bk-gray mt-20">
 <a href="javascript:;" onclick="xs_add('添加','<?php echo site_url('Sim/sim_add') ?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加SIM卡</a>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">id</th>
				<th width="100">
          手机号</th>

        	<th width="100">通讯编号</th>
          <th width="100">使用用户</th>
          <th width="100">余额</th>
          <th width="100">总消费</th>
          <th width="100">操作时间</th>
          <th width="100">开通时间</th>
          <th width="100">到期续费</th>
          <th width="100">最后通讯</th>
          <th width="100">来源</th>
          <th width="100">状态 </th>




			</tr>
		</thead>
		<tbody>
      <?php foreach($list as $row){ ?>
      <tr class="text-c">
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['phone'] ?></td>
              <td><?php echo $row['txid'] ?></td>
      <td><?php echo $row['shiyong'] ?></td>
  <td><?php echo $row['yue'] ?></td>
  <td><?php echo $row['zongxf'] ?></td>
  <td><?php echo $row['cztime'] ?></td>
        <td><?php echo $row['kttime'] ?></td>
<td><?php echo $row['dqxufei'] ?></td>
<td><?php echo $row['zuihoutx'] ?></td>
<td><?php echo $row['laiyuan'] ?></td>
<td><?php echo $row['state'] ?></td>

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
