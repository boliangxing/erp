<?php $this->load->view('header');?>

<form action="" method="post" class="form form-horizontal" id="form-xs-add">

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>销售编号</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="id" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>客户id</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="cid" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>商品名称</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="pname" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>规格</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="guige" datatype="*" nullmsg="不能为空">
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
    <label class="form-label col-3"><span class="c-red">*</span>价格</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="pirce" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>税前价格</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="shuiqian" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>税率</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="shuilv" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>价税总计</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="jiashui" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>保质时间</label>
    <div class="text-c">
          <div class="formControls col-5">
  		<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" name="baozhi" class="input-text Wdate" style="width:120px;position:absolute;top:0px;left:0px">

  		<input type="hidden" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">


  	</div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>发票信息</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="fpdetails" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>收款信息</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="shoukuan" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>经办人</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="jinbanren" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>备注</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="remark" datatype="*" nullmsg="不能为空">
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
