<?php $this->load->view('header');?>

<form action="" method="post" class="form form-horizontal" id="form-xs-add">
  <div class="row cl">
    <label class="form-label col-3">商品类别</label>
    <div class="formControls col-5">
      <select class="select" name="typeid" size="1" id="typeid">

         <?php foreach($list as $row){?>
         <option  value="<?php echo $row['typeid']?>"><?php echo $row['tname']?></option>
     <?php } ?>


      </select>
   </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>商品名称</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="name" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>数量</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="num" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <div class="col-9 col-offset-3">
      <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
    </div>
  </div>
</form>
<?php $this->load->view('footer');?>

<script type="text/javascript">

$("#form-xs-add").Validform({
  tiptype:2,
  callback:function(form){
                    var data = $("#form-xs-add").serialize();
                    $.ajax({
                        type: "POST",
                        url: "",
                        datatype : 'script',
                        data:data,
                        success: function(data){
                          if(data == '添加成功'){
                            layer.msg("成功",{icon: 6,time:2000});
                            location.href="";

                          }else{
                            layer.msg("失败",{icon: 5,time:1000});
                          }
                        },
                        error: function () {
                          layer.msg("系统错误，请稍后重试！",{icon: 5,time:1000});
                        }
                    });
}

                  });


</script>
