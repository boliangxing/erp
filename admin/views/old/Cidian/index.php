<?php $this->load->view('header');?>

<div class="cl pd-5 bg-1 bk-gray mt-20">
 <a href="javascript:;" onclick="xs_add('添加','<?php echo site_url('Cidian/cidian_zong/100') ?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加总分类</a>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">



         <th width="100">分类等级</th>
          <th width="100">分类Id</th>
        	<th width="100">名称</th>


          <th width="100">操作</th>




			</tr>
		</thead>
		<tbody>
      <?php foreach($list as $row){ ?>
      <tr class="text-c">


          <td><?php echo substr($row['typeid'],0,1) ?> 级分类</td>
          <td><?php echo $row['typeid'] ?></td>
               <td><?php echo $row['tname'] ?></td>

              <td class="td-manage">
                <a title="添加子分类" href="javascript:;" onclick="cidian_add('添加子类别','<?php echo site_url('Cidian/cidian_add/'.$row['typeid']) ?>')"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                <a title="查看子分类" href="javascript:;" onclick="cidian_cx('查看子类别','<?php echo site_url('Cidian/cidian_cx/'.$row['typeid']) ?>')"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">查看子类</i></a>

              </td>
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

function cidian_add(title,url){
  var index = layer.open({
    type: 2,
    title: title,
    content: url
  });
  layer.full(index);
}
function cidian_cx(title,url){
  var index = layer.open({
    type: 2,
    title: title,
    content: url
  });
  layer.full(index);
}

</script>
