<?php $this->load->view('header');?>
<body>
<div class="container-fluid"  >

<h1>方案配置 预览：</h1>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
    <span class="sr-only">90% 完成</span>
  </div>
</div>

<table class="table table-border table-bordered table-hover">
    <thead>
        <tr>
            <th style="text-align: center;" colspan="2"><?php echo $product_name; ?> <span class="text-danger">（type：<?php echo $type; ?> ）</span></th>
        </tr>
    </thead>
    <tbody>
        <tr>
             <td style="width:100%"><?php echo $product_des; ?></td>
        </tr>
    </tbody>
</table>
 <form action="<?php echo site_url("product/proadd") ?>?step=4" method="POST">
<table class="table table-border table-bordered table-hover">
    <thead>
        <tr>


            <th width="40">元件名称</th>

            <th width="40">数量</th>
            <th width="40">生产后库存剩余量</th>

        </tr>
    </thead>
    <tbody>
    <?php for($i=0;$i<$plnum;$i++){ ?>
        <tr>
            <td><input type="text"  style="width:60px;" class="form-control input-sm" name="pname[<?php echo $i ?>]" id="name<?php echo $i ?>" value="<?php echo $name[$i]?>"></td>
            <td><input type="text"  style="width: 100px;" class="form-control input-sm" name="num<?php echo $i ?>" id="num<?php echo $i ?>" value="<?php echo $num[$i]?>"></td>
            <td><input type="text"  style="width: 100px;" class="form-control input-sm" name="kcn[<?php echo $i ?>]" id="kcn<?php echo $i ?>" value=""></td>

               </tr>
    <?php } ?><input type="hidden" name="plnum"value="<?php echo $plnum; ?>">
    </tbody>
</table>

 <table class="table table-border table-bordered table-hover">

    <thead>
        <tr>
            <th colspan="2">备注</th>
        </tr>
    </thead>
    <tbody>
        <tr>


        <tr>
            <td>备注</td>
            <td><input type="text" class="form-control" name="remark"  value="<?php echo $product_des; ?>" readonly>
            <input type="hidden" class="form-control" name="type" value="<?php echo $type; ?>" >

          <input type="hidden" class="form-control" name="name" value="<?php echo $product_name; ?>"></td>

        </tr>
		<tr>
			<td colspan="2"><button id='qq'class="btn btn-primary" type="submit">确认方案，并添加产品</button> <button type="button" class="btn" onclick="history.go(-1)">返回上一步</button></td>
		</tr>
    </tbody>
</form>
</table>

</div>
<?php $this->load->view('footer');?><script>


  ajaxChecknum();
  function ajaxChecknum(){
    <?php for($i=0;$i<$plnum;$i++){ ?>
     name =  $("[name='pname[<?php echo $i ?>]']").val();
          num =  $("[name='num<?php echo $i ?>']").val();

     $.ajax({
         type: "GET",
         url:  "<?php echo site_url('product/ajaxChecknum') ?>",
         data: {name:name,num:num},
         dataType: "json",
         success: function(data){

             if(data.num>=$("#num<?php echo $i ?>").val()){
                 //返回焦点
                //  $("[name='id']").focus();
                //  $("#idrepeat").removeClass("hidden").addClass("show")


            $("#num<?php echo $i ?>").css('color','black');
  $("#kcn<?php echo $i ?>").val(data.num-$("#num<?php echo $i ?>").val());
          }else {
                //  $("#idrepeat").removeClass("show").addClass("hidden")

       $("#num<?php echo $i ?>").css('color','red');
        $("#kcn<?php echo $i ?>").val(data.num-$("#num<?php echo $i ?>").val());

             }
         }
     })
  <?php } ?>
  };






</script>
</body>

</html>
