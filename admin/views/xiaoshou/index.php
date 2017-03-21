<?php $this->load->view('header');?>

<div class="cl pd-5 bg-1 bk-gray mt-20">
 <a href="javascript:;" onclick="xs_add('添加','<?php echo site_url('xiaoshou/xs_add') ?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加销售单</a>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">销售编号</th>
				<th width="100">客户id</th>
        	<th width="100">商品名称</th>
				<th width="40">规格</th>
				<th width="90">数量</th>
        <th width="80">价格</th>
        <th width="100">税前价格</th>
          <th width="100">税率</th>
        <th width="40">价税总计</th>
        <th width="90">保质时间</th>
        <th width="80">发票信息</th>
        <th width="100">收款信息</th>
          <th width="100">经办人</th>
        <th width="40">备注</th>

			</tr>
		</thead>
		<tbody>
      <?php foreach($list as $row){ ?>
      <tr class="text-c">
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['cid'] ?></td>
              <td><?php echo $row['pname'] ?></td>
        <td><?php echo $row['guige'] ?></td>
  <td><?php echo $row['num'] ?></td>
  <td><?php echo $row['pirce'] ?></td>
  <td><?php echo $row['shuiqian'] ?></td>
        <td><?php echo $row['shuilv'] ?></td>
  <td><?php echo $row['jiashui'] ?></td>
<td><?php echo $row['baozhi'] ?></td>      
      <td><?php echo $row['fpdetails'] ?></td>
            <td><?php echo $row['shoukuan'] ?></td>
      <td><?php echo $row['jinbanren'] ?></td>
<td><?php echo $row['remark'] ?></td>




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
