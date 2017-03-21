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

</div>
</br></br>
</br>
</br>

 <table class="table table-border table-bordered table-hover">


  <thead>
        <tr>

            <th width="40">单位名 </th>
                <th width="40">中文字段名 </th>
            <th width="40">参数</th>



         </tr>
    </thead>
    <tbody>

    <?php for ($i=0;$i<7;$i++) { ?>
        <tr>

             <td><input type="text" readonly="true" tyle="width:60px;" class="form-control input-sm"  value="d<?php echo $i?>"></td>
             <td><input type="text" readonly="true"  style="width:200px;" class="form-control input-sm"  value="<?php
                   switch($i){ case '0':echo '品牌';    break;   case '1': echo '型号';    break; case '2': echo '封装类型'; break; case '3': echo '工作温度'; break; case '4':
                   echo '供电电压'; break;case '5': echo '耐压值'; break;case '6':echo '最大功耗'; break;
                   }
             ?>"></td>
             <td><input type="text" style="width:260px;" class="form-control input-sm" name="canshu[<?php echo $i; ?>]" id="canshu[<?php echo $i; ?>]" value=""></td>


        </tr>
<?php } ?>

    </tbody>
</table>

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
