<?php $this->load->view('header');?>

<form action="" method="post" class="form form-horizontal" id="form-agency-add">
<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>名称：</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="name" datatype="*" nullmsg="商户名不能为空">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>电话：</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="phone" datatype="*" nullmsg="">
  </div>
  <div class="col-4"> </div>
</div>

<div class="row cl">
  <label class="form-label col-3">国家选择</label>
  <div class="formControls col-5">
    <select class="select" name="country" size="1" id="country">

       <?php foreach($address as $temp){?>
      <?php if($temp['pparentid']==Null&& $temp['cparentid']==Null){?>
      <option  value="<?php echo $temp['id']?>"><?php echo $temp['name']?></option>
    <?php } ?>
  <?php } ?>


    </select>
  </div>
</div>
<div class="row cl">
  <label class="form-label col-3">省/州选择</label>
  <div class="formControls col-5">
    <select class="select" name="province" id="province"size="1"  >




    </select>
  </div>
</div>
<div class="row cl">
  <label class="form-label col-3">城市选择</label>
  <div class="formControls col-5">
    <select class="select" name="city"  id="city" size="1">




    </select>
    </div>
</div>
<div id="province"></div>

<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>街道</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="address" datatype="*" nullmsg="">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>邮箱</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="email" datatype="*" nullmsg="">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3">等级选择</label>
  <div class="formControls col-5">
    <select class="select" name="lv"  id="city" size="1">
      <option>0</option>
      <option>1</option>
      <option>2</option>
<option>3</option>



    </select>
 </div>
</div>

<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>备注：</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="remark" datatype="*" nullmsg="商户名不能为空">
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

$("#form-agency-add").Validform({
  tiptype:2,
  callback:function(form){
                    var data = $("#form-agency-add").serialize();
                    $.ajax({
                        type: "POST",
                        url: "",
                        datatype : 'script',
                        data:{

                          name:$('input[name=name]').val(),
                          country:$('select[name=country] option:selected').html(),
                          province:$('select[name=province] option:selected').html(),
                          city:$('select[name=city] option:selected').html(),

                          phone:$('input[name=phone]').val(),
                          address:$('input[name=address]').val(),
                          email:$('input[name=email]').val(),
                          remark:$('input[name=remark]').val(),
                          lv:$('select[name=lv] option:selected').val()


                        },
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


_getagency();
$('#country').change(function (event){
_getagency()
})

function _getagency(){
 var country_id=$('#country option:selected').val();

 $.ajax({

 type: "post",
 url: '<?php echo site_url('agency/agency_pid') ?>',
 dataType: 'json',
 cache: false,
 data:{

   id:country_id,
 },

 success:function(data){


console.log(data);
$('#province').html('');
$('#city').html('');

for(var i=0;i<data.length;i++){
 var node='<option value='+data[i].id+'>'+data[i].name+ ' </option>'

$('#province').append(node);

}
 },
 error: function(xhr, status, error) {
   console.log(xhr);
   console.log(status);
   console.log(error);
 }
});
}

$('#province').change(function (event){
_getagencyByp()
})

function _getagencyByp(){
 var province_id=$('#province option:selected').val();
 var country_id=$('#country  option:selected').val();

 $.ajax({

 type: "post",
 url: '<?php echo site_url('agency/agency_cid') ?>',
 dataType: 'json',
 cache: false,
 data:{
   pid:province_id,
   cid:country_id,
 },
 success:function(data){


console.log(data);
$('#city').html('');
for(var i=0;i<data.length;i++){
 var node='<option>'+data[i].name+ ' </option>'

$('#city').append(node);

}
 },
 error: function(xhr, status, error) {
   console.log(xhr);
   console.log(status);
   console.log(error);
 }
});
}

</script>
