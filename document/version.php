<h2>版本</h2>
<h4>APP下载地址</h4>
<span>网址：<?php echo "http://{$_SERVER['HTTP_HOST']}" ;?>/appdownload</span><br>

<h4>安卓APP</h4>
<table border="1" cellspacing="0" cellpadding="0">
    <tbody><tr>
        <th>参数</th><th>请求</th><th>说明</th><th>返回值</th>
    </tr>
    <tr>
        <td>type,version</td>
        <td>get</td>
        <td>type参数为APP类型，1:安卓，2:苹果。version为版本信息</td>
        <td>{static: "1", file: "http://jld3.139.hk/uploads/app/1_1.apk", remark: "请升级版本"}</td>
    </tr>
    <tr>
        <td colspan="4">
            <p><strong>安卓示例：</strong></p>
            <p>用户登录：发送version为1 GET请求域名/版本/app/index/1?version=1</p>
            <p>返回值：{static: "1", file: "http://jld3.139.hk/uploads/app/1_1.apk", remark: "请升级版本"}</p>
            <p>返回值说明：static:代表升级类型，1代表不提示升级，2代表提示升级，3代表强制升级，file 为下载地址，remark为备注信息</p>
        </td>
    </tr>
</tbody></table>