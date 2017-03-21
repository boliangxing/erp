
<?php $this->load->view('header');?>

<form action="" method="post" class="form form-horizontal" id="form-agency-edit">

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>名称：</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="name"  value="<?php foreach ($list as $tmp) {    echo   $tmp['name'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
      <input type="hidden" id="id"  name="id" value="<?php foreach ($list as $tmp) {    echo   $tmp['id'];    ?>  <?php  } ?>"/>
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>数量</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="num"  value="<?php foreach ($list as $tmp) {    echo   $tmp['num'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
     </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>报警数量</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="bjnum"  value="<?php foreach ($list as $tmp) {    echo   $tmp['bjnum'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
     </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>备注</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="remark"  value="<?php foreach ($list as $tmp) {    echo   $tmp['remark'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
     </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>品牌</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="d0"  value="<?php foreach ($list as $tmp) {    echo   $tmp['d0'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
     </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>型号</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="d1"  value="<?php foreach ($list as $tmp) {    echo   $tmp['d1'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
     </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>封装类型	</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="d2"  value="<?php foreach ($list as $tmp) {    echo   $tmp['d2'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
     </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>供电电压	</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="d3"  value="<?php foreach ($list as $tmp) {    echo   $tmp['d3'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
     </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>工作温度	</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="d4"  value="<?php foreach ($list as $tmp) {    echo   $tmp['d4'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
     </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>耐压值	</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="d5"  value="<?php foreach ($list as $tmp) {    echo   $tmp['d5'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
     </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>最大功耗	</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="d6"  value="<?php foreach ($list as $tmp) {    echo   $tmp['d6'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
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
$("#form-agency-edit").Validform({
  tiptype:2,
  callback:function(form){
  var  id=$('input[name=id]').val();
var name=$('input[name=name]').val();
var num=$('input[name=num]').val();
var bjnum=$('input[name=bjnum]').val();
var remark=$('input[name=remark]').val();
var d0=$('input[name=d0]').val();
var d1=$('input[name=d1]').val();
var d2=$('input[name=d2]').val();
var d3=$('input[name=d3]').val();
var d4=$('input[name=d4]').val();
var d5=$('input[name=d5]').val();
var d6=$('input[name=d6]').val();


                    //var data = $("#form-scene-edit").serialize();
                    $.ajax({
                        type: "post",
                        url: "",
                        //datatype : 'script',
data:{
id:id,
name:name,
num:num,
bjnum:bjnum,
remark:remark,
d0:d0,
d1:d1,
d2:d2,
d3:d3,
d4:d4,
d5:d5,
d6:d6,
},
                        success: function(data){

                          if(data == 'ok'){

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
