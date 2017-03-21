<?php $this->load->view('header');?>

<form action="<?php echo site_url('Cidian/cidian_zong') ?>" method="post" class="form form-horizontal" id="form-xs-add">

  <input type="hidden" name="ptid"value="<?php  echo $typeid; ?>"/>


  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>名称</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="tname" datatype="*" nullmsg="不能为空">
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
