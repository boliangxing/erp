  <?php $this->load->view('header');?>

<form action="" method="post" class="form form-horizontal" id="form-xs-add">

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>手机号</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="mobile" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>串号</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="chuanhao"  >
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>话费余额</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="yumoney" >
    </div>
    <div class="col-4"> </div>
  </div>
 
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>套餐流量</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="dataflow"  >
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>套餐说明</label>
    <div class="formControls col-5">
    <textarea name="taocan" style="width:200px;height:80px;"></textarea>
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>卡号来源</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="laiyuan" >
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>模块编号</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="dtuid" >
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>备注</label>
    <div class="formControls col-5">
    <textarea name="memo" style="width:200px;height:80px;"></textarea>
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>卡状态</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="simstatus" >
    </div>
    <div class="col-4"> </div>
  </div>
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>服务密码</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="svrpass"  >
    </div>
    <div class="col-4"> </div>
  </div>

    <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>账户状态</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="svrpass" >
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


</script>
