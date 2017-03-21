<h2>调试</h2>
<select>
  <option value ="user">用户接口</option>
  <option value ="region">区域</option>
  <option value ="scene">情景</option>
  <option value ="facility">设备</option>
  <option value ="app">APP升级</option>
</select>
<div class="window" style="margin-top:20px;">
    <div class="user">
        <hr>
        <h6>用户接口调试</h6>
        <select>
          <option value ="get">get</option>
          <option value ="post">post</option>
          <option value ="put">put</option>
        </select>
        <input name="url" type="text" value="http://<?php echo $_SERVER['HTTP_HOST'];?>/V1/facility/index/1" size=100>
        <br>
        <input name="post" type="text"><br>
        <button onclick="Click('user')">提交</button><br>
    </div>
    <div class="region" style="display:none">
        <hr>
        <h6>区域接口调试</h6>
        <select>
          <option value ="get">get</option>
          <option value ="post">post</option>
          <option value ="put">put</option>
          <option value ="delete">delete</option>
        </select>
        <input name="url" type="text" value="http://<?php echo $_SERVER['HTTP_HOST'];?>/V1/room/index">
        <input name="post" type="text">
        <button onclick="Click('region')">提交</button>
    </div>
    <div class="scene" style="display:none">
        <hr>
        <h6>情景接口调试</h6>
        <select>
          <option value ="get">get</option>
<!--           <option value ="post">post</option>
          <option value ="put">put</option>
          <option value ="put">delete</option> -->
        </select>
        <input name="url" type="text" value="http://<?php echo $_SERVER['HTTP_HOST'];?>/V1/scene/index">
        <input name="post" type="text">
        <button onclick="Click('scene')">提交</button>
    </div>
    <div class="facility" style="display:none">
        <hr>
        <h6>设备接口调试</h6>
        <select>
          <option value ="get">get</option>
          <option value ="post">post</option>
          <option value ="put">put</option>
          <option value ="delete">delete</option>
<!--       <option value ="post">post</option>  -->
        </select>
        <input name="url" type="text" value="http://<?php echo $_SERVER['HTTP_HOST'];?>/V1/facility/index">
        <input name="post" type="text">
        <button onclick="Click('facility')">提交</button>
    </div>
    <div class="app" style="display:none">
        <hr>
        <h6>APP升级接口调试</h6>
        <select>
          <option value ="get">get</option>
        </select>
        <input name="url" type="text" value="http://<?php echo $_SERVER['HTTP_HOST'];?>/V1/app/index">
        <input name="post" type="text">
        <button onclick="Click('app')">提交</button>
    </div>
</div>

<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('select').change(function(){
        $('.user').hide();
        $('.region').hide();
        $('.scene').hide();
        $('.facility').hide();
        var type = $('select').val();
        switch(type){
            case 'user' : 
                $('.user').show();
                break;
            case 'region' :
                $('.region').show();
                break;
            case 'scene' :
                $('.scene').show();
                break;
            case 'facility' :
                $('.facility').show();
                break;
            case 'app' :
                $('.app').show(); 
            default :
                //dosth...
        }
    })

    function Click(type){
        var ajaxurl = $('.'+type+' [name="url"]').val();
        var ajaxtype = $('.'+type+' select').val();
        var ajaxdata = $('.'+type+' [name="post"]').val();;

        $.ajax({
            type: ajaxtype,
            url: ajaxurl,
            data: ajaxdata,
            default: 'application/form-data; charset=UTF-8',
            async: false,
            dataType: "html",
            success:function(data){
                console.log(data);
                alert(data);
            }
        });
    }
</script>