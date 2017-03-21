
<?php $this->load->view('header');?>

<form action="" method="post" class="form form-horizontal" id="form-customer-edit">

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>名称：</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="name"  value="<?php foreach ($list as $tmp) {    echo   $tmp['name'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
      <input type="hidden" id="id"  name="id" value="<?php foreach ($list as $tmp) {    echo   $tmp['id'];    ?>  <?php  } ?>"/>
    </div>

    <div class="col-4"> </div>
  </div>



  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>类别：</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="leibie"   value="<?php foreach ($list as $tmp) {    echo   $tmp['leibie'];    ?>  <?php  } ?>" placeholder=""   datatype="*" nullmsg="不能为空">
     </div>

    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>备注：</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" name="remark"   value="<?php foreach ($list as $tmp) {    echo   $tmp['remark'];    ?>  <?php  } ?>" placeholder=""  datatype="*" nullmsg="不能为空">
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
$("#form-customer-edit").Validform({
  tiptype:2,
  callback:function(form){
  var  id=$('input[name=id]').val();
var name=$('input[name=name]').val();
var leibie=$('input[name=leibie]').val();

var remark=$('input[name=remark]').val();


                    //var data = $("#form-scene-edit").serialize();
                    $.ajax({
                        type: "post",
                        url: "",
                        //datatype : 'script',
data:{
id:id,
name:name,
leibie:leibie,

remark:remark,
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
