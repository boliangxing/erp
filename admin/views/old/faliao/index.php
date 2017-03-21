<?php $this->load->view('header');?>

<div class="cl pd-5 bg-1 bk-gray mt-20">
 <a href="javascript:;" onclick="fl_add('添加','<?php echo site_url('faliao/fl_add') ?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加发料单</a>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">

				<th width="100">编号</th>
        	<th width="100">商品名称</th>
				<th width="40">元件名称</th>
				<th width="90">数量</th>
        <th width="80">备注</th>


			</tr>
		</thead>
		<tbody>
      <?php foreach($list as $row){ ?>
      <tr class="text-c">
        <td><?php echo $row['id'] ?></td>

              <td><?php echo $row['pname'] ?></td>
        <td><?php echo $row['yname'] ?></td>
  <td><?php echo $row['num'] ?></td>
  <td><?php echo $row['remark'] ?></td>





          </tr>
          <?php }?>

 		</tbody>
	</table>
	</div>
</div>
<?php $this->load->view('footer');?>

<script type="text/javascript">
function fl_add(title,url){
  var index = layer.open({
    type: 2,
    title: title,
    content: url
  });
  layer.full(index);
}


</script>
