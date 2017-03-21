<?php $this->load->view('header');?>

<form action="" method="post" class="form form-horizontal" id="form-xs-add">

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>手机号</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="phone" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>通讯编号</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="txid" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>使用用户</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="shiyong" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>余额</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="yue" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>总消费</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="zongxf" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>操作时间</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="cztime" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>开通时间</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="kttime" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>到期续费</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="dqxufei" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>来源</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="laiyuan" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>状态</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="state" datatype="*" nullmsg="不能为空">
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
                            location.href="xiaoshou";

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
