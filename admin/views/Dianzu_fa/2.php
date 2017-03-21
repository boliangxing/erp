<?php $this->load->view('header');?>

<form action="<?php echo site_url('Dianzu_fa/add') ?>?step=3" method="POST">
<!--
	步骤一数据
-->
<Div style="margin-left:200px">
  <div class="row cl">
    <label class="form-label col-3">2级类别</label>
    <div class="formControls col-5">
      <select class="select" name="leibie2" size="1" id="leibie2">

         <?php foreach($list as $temp){?>

        <option  value="<?php echo $temp['typeid']?>"><?php echo $temp['tname']?></option>

    <?php } ?>



      </select>
    </div>
  </div>
<div class="row cl">
  <label class="form-label col-3">商品类别</label>
  <div class="formControls col-5">
    <select class="select" name="leibie" size="1" id="leibie">

       <?php foreach($li as $temp){?>

      <option  value="<?php echo $temp['typeid']?>"><?php echo $temp['tname']?></option>

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
  <label class="form-label col-3"><span class="c-red">*</span>报警数量</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="bjnum" datatype="*" nullmsg="不能为空">
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
  <label class="form-label col-3"><span class="c-red">*</span>品牌</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="canshu[<?php echo 0; ?>]" id="canshu[<?php echo 0; ?>]"datatype="*" nullmsg="不能为空">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>型号</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="canshu[<?php echo 1; ?>]" id="canshu[<?php echo 1; ?>]" datatype="*" nullmsg="不能为空">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>封装类型</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="canshu[<?php echo 2; ?>]" id="canshu[<?php echo 2; ?>]" datatype="*" nullmsg="不能为空">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>单个价格</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="price1" id="price1" datatype="*" nullmsg="不能为空">
  </div>
  <div class="col-4"> </div>
</div>
<div class="row cl">
  <label class="form-label col-3"><span class="c-red">*</span>整盘价格</label>
  <div class="formControls col-5">
    <input type="text" class="input-text" value="" placeholder="" name="price2" id="price2" datatype="*" nullmsg="不能为空">
  </div>
  <div class="col-4"> </div>
</div>
 
</br></br>
</br>
</br>

  
<hr>
<button class="btn btn-primary" type="submit">提交</button>
</form>

<?php $this->load->view('footer');?>
<script>


_get();
$('#leibie2').change(function (event){
_get()
})

function _get(){
 var tid=$('#leibie2 option:selected').val();

 $.ajax({

 type: "post",
 url: '<?php echo site_url('Dianzu_fa/getchange') ?>',
 dataType: 'json',
 cache: false,
 data:{

   tid:tid,
 },

 success:function(data){


console.log(data);
$('#leibie ').html('');


for(var i=0;i<data.length;i++){
 var node='<option value='+data[i].typeid+'>'+data[i].tname+ ' </option>'

$('#leibie').append(node);

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
