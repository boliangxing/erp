<?php $this->load->view('header');?>

<div class="cl pd-5 bg-1 bk-gray mt-20">
		 <a href="javascript:;" onclick="customer_add('添加类别','<?php echo site_url('customer/customer_add') ?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加客户</a></span>

	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">序号</th>
				<th width="100">客户名称</th>
				<th width="40">客户类别</th>
				<th width="90">备注</th>

						<th width="100">操作</th>

			</tr>
		</thead>
		<tbody>
      <?php foreach($list as $row){ ?>
      <tr class="text-c">
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['leibie'] ?></td>
        <td><?php echo $row['remark'] ?></td>



         <td class="td-manage">
            <a title="删除" href="javascript:;" class="ml-5"  onclick="customer_del('<?php echo $row['name'] ?>','<?php echo $row['id'] ?>')"style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
						<a title="编辑" href="javascript:;" onclick="customer_edit('编辑类别','<?php echo site_url('customer/customer_edit/'.$row['id']) ?>')"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
</td>

          </tr>
          <?php }?>

 		</tbody>
	</table>
	</div>
</div>
<?php $this->load->view('footer');?>

<script type="text/javascript">

	function customer_add(title,url){
		var index = layer.open({
			type: 2,
			title: title,
			content: url
		});
		layer.full(index);
}
function customer_edit(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);


}
function customer_del(name,id){
layer.confirm('确认要删除【'+name+'】吗？',function(index){

		$.ajax({
		type:'post',
		url:'<?php echo site_url('customer/customer_del') ?>',
		dataType:'json',
		data:{
	  id:id



		},
		success:function(data){

		if(data==null){
		layer.msg('服务器端错误',{icon:2,time:2000});
		return;

		}
		if(data.status!=1){
		layer.msg(data.message,{icon:2,time:2000});
		return;

		}
		layer.msg(data.message,{icon:1,time:2000});
		location.replace(location.href);
		},
		error:function(xhr,status,error){


		//layer.msg('删除成功',{icon:2,time:2000});
		location.replace(location.href);

		},beforeSend:function(xhr){

		layer.load(0,{shade:false});

		},

		});

		return false;



	});


}
</script>
