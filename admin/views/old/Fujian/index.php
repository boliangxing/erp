<?php $this->load->view('header');?>

<div class="cl pd-5 bg-1 bk-gray mt-20">
 <a href="javascript:;" onclick="xs_add('添加','<?php echo site_url('Fujian/fj_add') ?>','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加附件</a>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">

        	<th width="100">附件名称</th>

				<th width="90">数量</th>


			</tr>
		</thead>
		<tbody>
      <?php foreach($list as $row){ ?>
      <tr class="text-c">

     <td><?php echo $row['name'] ?></td>

  <td><?php echo $row['num'] ?></td>




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
