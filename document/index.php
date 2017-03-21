<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>泽谷科技洁利达开发文档</title>
</head>
<link rel="stylesheet" href="css/style.css" />
<body class="warp">
    <h1 class="wrap">洁利达平台APP开发接口</h1>
    <div class="menu">
        <ul>
            <li><a href="home.html" target="main">首页</a></li>
            <li><a href="protocol.html" target="main">协议</a></li>
            <li><a href="domain.php" target="main">域名</a></li>
            <li><a href="version.php" target="main">版本</a></li>
            <li><a href="path.html" target="main">路径</a></li>
            <li><a href="data.html" target="main">数据请求</a></li>
                <ul>
                    <li><a href="data/user.html" target="main">用户</a></li>
                    <li><a href="data/room.html" target="main">区域</a></li>
                    <li><a href="data/scene.html" target="main">情景</a></li>
                    <li><a href="data/facility.html" target="main">设备</a></li>
                    <li><a href="data/weather.html" target="main">天气</a></li>
                    <li><a href="data/feedback.html" target="main">意见反馈</a></li>
                    <li><a href="data/sms.html" target="main">短信</a></li>
                </ul>
            <li><a href="info.html" target="main">信息过滤</a></li>
            <li><a href="code.html" target="main">状态码</a></li>
            <li><a href="error.html" target="main">错误处理</a></li>
            <li><a href="return.html" target="main">返回结果</a></li>
            <li><a href="auth.html" target="main">身份验证</a></li>
            <li><a href="test.php" target="main">调试</a></li>
        </ul>
    </div>

    <div class="content">
        <iframe name="main" id="mainframe"  src="home.html" frameborder="no" scrolling="no" height="10%"></iframe>
    </div>
<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    //注意：下面的代码是放在和iframe同一个页面调用,放在iframe下面
    $("#mainframe").load(function () {
        var mainheight = $(this).contents().find("body").height() + 30;
        $(this).height(mainheight);
    });
</script>

</body>
</html>

