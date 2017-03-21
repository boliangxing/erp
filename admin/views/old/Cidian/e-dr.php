<?php $this->load->view('header');?>
        <form id="form1" name="form1"  method="post" enctype="multipart/form-data" action="<?php echo site_url('Sim/excel');?>">
        <div>
                <input id="File1" type="file" name="File1"/>
                <input  type="button" value="导入" />
        </div>
        </form>
 <?php $this->load->view('footer');?>
   <script>
function add_up()
{
    var obj = document.getElementById("File1");
   if(obj.value=="")
   {
      alert("请选择一个文件");
       return false;
      }
      else
      {form1.submit()}
}
   </script>
