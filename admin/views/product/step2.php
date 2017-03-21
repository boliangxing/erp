<?php $this->load->view('header');?>
<body>
<div class="container-fluid">
<h1>第二步：设置参数配置</h1>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
    <span class="sr-only">60% 完成</span>
  </div>
</div>
<form action="<?php echo site_url('product/proadd') ?>?step=3" method="POST">
<!--
	步骤一数据
-->
<input type="hidden" name="type" value="<?php echo $type ?>">
<input type="hidden" name="product_name" value="<?php echo $product_name; ?>">
<input type="hidden" name="product_des" value="<?php echo $product_des; ?>">
<input type="hidden" name="plnum" value="<?php echo $plan_num; ?>">


 <table class="table table-border table-bordered table-hover">
    <thead>
        <tr>

            <th width="40">元件名称</th>
            <th width="40">数量</th>

         </tr>
    </thead>
    <tbody>
    	<?php $i=0; while($plan_num - $i > 0){  ?>
        <tr>
             <td><input type="text" style="width:60px;" class="form-control input-sm" name="name[<?php echo $i; ?>]" id="name" value=""></td>
            <td><input type="text" style="width:200px;" class="form-control input-sm" name="num[<?php echo $i; ?>]" id="num" value=""></td>

        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
<div class="clearfix">
	<p class="pull-right">
	    <button type="button" class="btn btn-primary" onclick="add()">添加一列</button>
	    <button type="button" class="btn btn-default" onclick="del()">删除一列</button>
	</p>
</div>
<hr>
<button class="btn btn-primary" type="submit">下一步</button> <button type="button" class="btn" onclick="history.go(-1)">返回上一步</button>
</form>
</div>
<?php $this->load->view('footer');?>
<script>
var plan_num = <?php echo $plan_num; ?>;
function getLastTr(){
	return
}

function add(){
    plan_num = plan_num + 1;
    var tpl =  '<tr>' +
                '<td><input type="text" style="width:60px;" class="form-control input-sm" name="name['+ plan_num +']" id="name" value=""></td>' +
                '<td><input type="text" style="width: 100px;" class="form-control input-sm" name="num['+ plan_num +']" id="num" value=""></td>' +
                 '</tr>';
    $("table").append(tpl);
}

function del(){
    obj = $("table tr:last");
    obj.remove();
	plan_num--;
}
</script>
</body>
</html>
