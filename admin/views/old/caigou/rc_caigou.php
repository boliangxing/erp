<?php $this->load->view('header');?>

<div class="cl pd-5 bg-1 bk-gray mt-20">

	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">采购编号</th>
				<th width="100">物件名称</th>
        	<th width="100">价格</th>
				<th width="40">数量</th>
				<th width="90">时间</th>


			</tr>
		</thead>
		<tbody>
      <?php foreach($list as $row){ ?>
      <tr class="text-c">
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['price'] ?></td>
        <td><?php echo $row['num'] ?></td>
  <td><?php echo $row['time'] ?></td>





          </tr>
          <?php }?>

 		</tbody>
	</table>
	</div>
</div>
<?php $this->load->view('footer');?>

<script type="text/javascript">



</script>
