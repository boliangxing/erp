<?php $this->load->view('header');?>

<form action="" method="post" class="form form-horizontal" id="form-leibie-add">


  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>请输入类别名</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="leibie" datatype="*" nullmsg="名称不能为空">
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

$("#form-leibie-add").Validform({
  tiptype:2,
  callback:function(form){
                    var data = $("#form-leibie-add").serialize();
                 
                    $.ajax({
                        type: "POST",
                        url: "",
                        datatype : 'script',
                        data:data,
                        success: function(data){
                          if(data == '添加成功'){
                            layer.msg("成功",{icon: 6,time:2000});
                            //location.href="";

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











</script>
