<?php $this->load->view('header');?>

<div class="cl pd-5 bg-1 bk-gray mt-20">
 	<div class="mt-20">
    <div class="form-group">
        <label for="type">2级类型</label>
        <select name="leibie2" id="leibie2"><?php foreach($li as $row){?>

  <option value="<?php echo $row['typeid'];  ?>"><?php echo $row['tname'];  ?></option>

          <?php }?></select>


     </div>

    <div class="form-group">
        <label for="type">产品类型</label>
        <select name="type" id="type"><?php foreach($lixx as $row){?>

  <option value="<?php echo $row['typeid'];  ?>"><?php echo $row['tname'];  ?></option>

          <?php }?></select>


     </div>
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead id='ll'>

		</thead>
		<tbody class="ttt">


 		</tbody>
	</table>
	</div>
</div>
<?php $this->load->view('footer');?>

<script type="text/javascript">


_gets();
$('#leibie2').change(function (event){
_gets()
})

function _gets(){
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
$('#type ').html('');


for(var i=0;i<data.length;i++){
 var node='<option value='+data[i].typeid+'>'+data[i].tname+ ' </option>'

$('#type').append(node);

}
 },
 error: function(xhr, status, error) {
   console.log(xhr);
   console.log(status);
   console.log(error);
 }
});
}

























function xs_add(title,url){
  var index = layer.open({
    type: 2,
    title: title,
    content: url
  });
  layer.full(index);
}

$('#type').blur(function (event){
_get()
})

function _get(){
 var type_id=$('#type option:selected').val();

 $.ajax({

 type: "post",
 url: '<?php echo site_url('Yuanjian/Yuanjian_tid') ?>',
 dataType: 'json',
 cache: false,
 data:{

   tid:type_id,
 },

 success:function(data){


console.log(data);

$('.ttt').html('');

  $('#ll').html('');

  var ll=
  '<th >'+'元件名称'+'</th>'+
  '<th >'+'数量'+'</th>'+
  '<th >'+'报警数量'+'</th>'+
  '<th >'+'备注'+'</th>'+
  '<th >'+'品牌'+'</th>'+
  '<th>'+'型号'+'</th>'+
  '<th >'+'封装类型'+'</th>'+
  '<th >'+'供电电压'+'</th>'+
  '<th >'+'工作温度'+'</th>'+
  '<th >'+'耐压值'+'</th>'+
  '<th>'+'最大功耗'+'</th>'
+  '<th>'+'操作'+'</th>'
    $('#ll').append(ll);

for(var i=0;i<data.length;i++){


 // var node='<tr>'+'<td>'+data[i].typeid+ '</td>'+'<td>'+data[i].name+ '</td>'+
 // '<td>'+data[i].num+ '</td>'+'  <td>'+data[i].bjnum+ '</td>'+'<td>'+data[i].d0+ '</td>'+
 // '<td>'+data[i].d1+ '</td>'+'<td>'+data[i].d2+ '</td>'+'<td>'+data[i].d3+ '</td>'+
 // '<td>'+data[i].d4+ '</td>'+'<td>'+data[i].d5+ '</td>'+'<td>'+data[i].d6+ '</td>'+
 // '<td>'+data[i].d7+ '</td>'+
 //





 var node='<tr>'+

 '<td>'+'<input type="textbox" style="width:80px" name="name" value='+data[i].name+' >'+'</td>'+
 '<td>'+'<input type="textbox" style="width:80px"name="num" value='+data[i].num+' >'+'</td>'+
 '<td>'+'<input type="textbox" style="width:80px"name="bjnum" value='+data[i].bjnum+' >'+'</td>'+
 '<td>'+'<input type="textbox" style="width:80px"name="remark" value='+data[i].remark+' >'+'</td>'+
 '<td>'+'<input type="textbox" style="width:80px"name="d0" value='+data[i].d0+' >'+'</td>'+
 '<td>'+'<input type="textbox" style="width:80px"name="d1" value='+data[i].d1+' >'+'</td>'+
 '<td>'+'<input type="textbox"style="width:80px" name="d2" value='+data[i].d2+' >'+'</td>'+
 '<td>'+'<input type="textbox" style="width:80px"name="d3" value='+data[i].d3+' >'+'</td>'+
 '<td>'+'<input type="textbox" style="width:80px"name="d4" value='+data[i].d4+' >'+'</td>'+
 '<td>'+'<input type="textbox"style="width:80px" name="d5" value='+data[i].d5+' >'+'</td>'+
 '<td>'+'<input type="textbox"style="width:80px" name="d6" value='+data[i].d6+' >'+'</td>'+
  '<td>'+'<a href=" <?php echo site_url('Yuanjian/yj_edit')?>?name='+data[i].name+'&typeid='+data[i].typeid+'">'+'编辑'+'</a>'+'</td>'+
'</tr>'
$('.ttt').append(node);

}
 },
 error: function(xhr, status, error) {
   console.log(xhr);
   console.log(status);
   console.log(error);
 }
});
}
function agency_edit(title,url){
var index = layer.open({
type: 2,
title: title,
content: url
});
layer.full(index);


}





</script>
