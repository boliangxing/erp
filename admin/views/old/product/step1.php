<?php $this->load->view('header');?>

<title>diyibu</title>
<body>
<div class="container-fluid" style="position:absolute;left:100px">

<h1>第一步：编辑产品</h1>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
    <span class="sr-only">30% 完成</span>
  </div>
</div>
<form action="<?php echo site_url('product/proadd') ?>?step=2" method="POST" enctype="multipart/form-data">
  <div class="form-group">
      <label for="type">产品类型</label>
      <select name="type" id="type"><?php foreach($list as $row){?>

<option value="<?php echo $row['typeid'];  ?>"><?php echo $row['tname'];  ?></option>

        <?php }?></select>


   </div><br/><br/><br/>

    <div class="form-group">
        <label for="name">产品名称</label>
        <input type="text" name="product_name" class="form-control" id="name" placeholder="产品信息的名称">
    </div><br/><br/><br/>
    <div class="form-group">
        <label for="des">产品备注</label>
        <input type="text" name="product_des" class="form-control" id="des" placeholder="产品信息的描述">
    </div><br/><br/><br/>

     <div class="form-group">
        <label id="plan_num_des" for="num" class="text-danger">请输入元件种类个数</label>
        <input type="text" name="plan_num" class="form-control" id="num" placeholder="产品信息的描述">
    </div><br/><br/><br/>
    <button type="submit" class="btn btn-primary">下一步</button>
</form>
</div>
<?php $this->load->view('footer');?>


<script>


$("form").submit(function(){
    type= $("[name='type']").val();

    product_name = $("[name='product_name']").val();
    product_des = $("[name='product_des']").val();
    if(   !product_name && !product_des){
 alert('请完整填写表格')
        return false;
    }


    plan_num = $("[name='plan_num']").val();
    if(plan_num < 1){
        $("#plan_num_des").text("数量不少于1个");
        $("[name='plan_num']").focus();
        return false;
    }


})
</script>
</body>
</html>
