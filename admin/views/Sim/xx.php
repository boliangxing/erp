<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>客户信息</title>
<style>
	.fl{float: left;}
	.clear{clear: both;height: 0;overflow: hidden;}
	.kh{float: left;width: 35%;}
	.kh li{font-size: 15px;margin: 10px 0 10px 5%;width: 100%;}
	.kh li label{display: inline-block;width: 85px;text-align: right;}
	.kh li input{height: 35px;line-height: 35px;border:1px solid #999;padding: 0 10px;width: 200px;}
	.kh li input:hover,.kh li input:focus,.kh li select:focus,.kh li select:hover{border-color: #c20919;}
	.kh li select{width: 222px;height: 37px;line-height: 37px;padding: 0 10px;}
	#bbt:active {color: rgba(255, 255, 255, 0.4);background-color: #a80d1a;}
</style>
<style type="text/css">
	.pd-5 span{margin-right: 10px;}
	.hah input{height: 31px;line-height: 31px;border:1px solid #999;background: #f0f0f0;padding: 0 10px;font-size: 14px;color: #000;}
	.hah button{height: 33px;line-height: 33px;border:1px solid #999;background: #999;padding: 0 10px;font-size: 14px;color: #000;}
	.table-sort tbody{text-align: center;}
</style>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 客户管理 <span class="c-gray en">&gt;</span> 客户信息</a></nav>

<form action="" method="post" class="form form-horizontal" id="form-xs-add">

  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>手机号</label>
    <div class="formControls col-5">
      <input type="text" class="input-text Validform_error" value="" placeholder="" name="phone" datatype="*" nullmsg="不能为空">
    </div>
    <div class="col-4"> </div>
  </div>



<!-- 隐藏表单域，用来判断是更新还是提交 -->
<input type="hidden" name="customer_id" value="{$data.customer.customer_id}">
</form>

<form action="" method="POST">
<div class="page-container">
<h1 style="width: 23%;text-align: left;font-size: 16px;border-bottom:1px solid #999;height: 30px;line-height: 30px;padding: 10px 0;margin: 0 0 15px 30px;">客户信息</h1>


	<ul class="kh" >
		<li>
			<div>
				<label for="bt">客户名称：</label>
				<input type="text" placeholder="必填" id="bt" name="customer_name"
				 value="{$data.customer.customer_name}" datatype="*" nullmsg="不能为空">
			</div>
		</li>

		<li>
		<div>
			<label for="bt0">详细地址：</label>
			<input type="text" placeholder="请输入地址" id="bt0" name="customer_address" value="{$data.customer.customer_address}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt1">登录账户：</label>
			<input type="text" placeholder="请输入账号" id="bt1" name="clname" value="{$data.customer.clname}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt2">登录密码：</label>
			<input type="text" placeholder="请输入密码" id="bt2" name="clpass" value="{$data.customer.clpass}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt5">电话号码：</label>
			<input type="text" placeholder="请输入电话号码" id="bt5" name="customer_tel" value="{$data.customer.customer_tel}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt12">接受号码：</label>
			<input type="text" placeholder="请输入手机号" id="bt12" name="baojing_mobile" value="{$data.customer.baojing_mobile}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt11">传真号码：</label>
			<input type="text" placeholder="请输入传真号码" id="bt11" name="customer_fax" value="{$data.customer.customer_fax}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt19">注册资金：</label>
			<input type="text" placeholder="请输入注册资金" id="bt19" name="customer_money" value="{$data.customer.customer_money}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt10">网址：</label>
			<input type="text" placeholder="请输入网址" id="bt10" name="customer_web" value="{$data.customer.customer_web}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt9">邮箱：</label>
			<input type="text" placeholder="请输入邮箱" id="bt9" name="customer_email" value="{$data.customer.customer_email}">
			</div>
		</li>
	</ul>
	<ul class="kh">
		<li>
			<div>
			<label>客户类型：</label>
			<select name="ifuserr">
				<option value=1 <eq name="data.customer.ifuserr" value="1">selected</eq>>主客户</option>
				<option value=0 <eq name="data.customer.ifuserr" value="0">selected</eq>>使用用户</option>
			</select>
			</div>
		</li>
		<li>
		<div>
			<label>客户类别：</label>
			<select name="typeid" >
				<volist name="data.customer_type" id="vo">
				<option value="{$vo.typeid}" <eq name="data.customer.typeid" value="$vo.typeid">selected</eq>>{$vo.typename}</option>
				</volist>
		    </select>
		    </div>
		</li>
		<li>
			<div>
			<label>登录情况：</label>
			<select name="clogis">
				<option value=1 <eq name="data.customer.clogis" value="1">selected</eq>>允许登录</option>
				<option value=0 <eq name="data.customer.clogis" value="0">selected</eq>>禁止登录</option>
			</select>
			</div>
		</li>
		<li>
			<div>
			<label>公司性质：</label>
			<select name="customer_kind" id="customer_kind" value="1">
                <option value="国有企业" <eq name="data.customer.customer_kind" value="国有企业">selected</eq>>国有企业</option>
                <option value="其他" <eq name="data.customer.customer_kind" value="其他">selected</eq>>其他</option>
                <option value="未知性质" <eq name="data.customer.customer_kind" value="未知性质">selected</eq>>未知性质</option>
                <option value="有限责任公司" <eq name="data.customer.customer_kind" value="有限责任公司">selected</eq>>有限责任公司</option>
                <option value="私营企业" <eq name="data.customer.customer_kind" value="私营企业">selected</eq>>私营企业</option>
                <option value="大陆合资经营企业" <eq name="data.customer.customer_kind" value="大陆合资经营企业">selected</eq>>大陆合资经营企业</option>
                <option value="外资企业" <eq name="data.customer.customer_kind" value="外资企业">selected</eq>>外资企业</option>
                <option value="中外合资经营企业" <eq name="data.customer.customer_kind" value="中外合资经营企业">selected</eq>>中外合资经营企业</option>
                <option value="港、澳、台独资企业" <eq name="data.customer.customer_kind" value="港、澳、台独资企业">selected</eq>>港、澳、台独资企业</option>
              </select>
			</div>
		</li>
		<li>
			<div>
			<label>所属行业：</label>
			<select name="hangyeid" id="hangyeid">
				<volist name="data.hangye" id="vo">
                <option value="{$vo.typeid}" <eq name="data.customer.hangyeid" value="$vo.typeid">selected</eq>>{$vo.typename}</option>
                </volist>
		      </select>
			</div>
		</li>
		<li>
			<div>
			<label>沟通级别：</label>
			<select name="gtjb" id="gtjb">
		      <option value="良好" <eq name="data.customer.gtjb" value="良好">selected</eq>>良好</option>
		      <option value="很好" <eq name="data.customer.gtjb" value="很好">selected</eq>>很好</option>
		      <option value="一般" <eq name="data.customer.gtjb" value="一般">selected</eq>>一般</option>
		      <option value="差" <eq name="data.customer.gtjb" value="差">selected</eq>>差</option>
		     </select>
			</div>
		</li>
		<li>
			<div>
			<label>区域类型：</label>
			<select name="quyu" id="quyu">
		      <option value="国内客户" <eq name="data.customer.quyu" value="国内客户">selected</eq>>国内客户</option>
		      <option value="海外客户" <eq name="data.customer.quyu" value="国内客户">selected</eq>>海外客户</option>
		      </select>
			</div>
		</li>
		<li>
		<div>
			<label for="bt7">成立时间：</label>
			<input type="text" name="customer_ctime" placeholder="选择时间" id="bt7" onfocus="WdatePicker()" value="{$data.customer.customer_ctime|default=''|date='Y-m-d',###}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt8">更新时间：</label>
			<input type="text" name="customer_gtime" placeholder="选择时间" id="bt8" onfocus="WdatePicker()" value="{$data.customer.customer_gtime|default=''|date='Y-m-d',###}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt18">所在城市：</label>
			<select name="zoneid">
				<volist name="data.zone" id="vo">
				<option value="{$vo.zoneid}"<eq name="vo.zoneid" value="$data.customer.zoneid"> selected</eq>><eq name="vo.pid" value="1">└</eq>{$vo.zonename}</option>
				</volist>
			</select>
			</div>
		</li>
	</ul>
	<div class="clear"></div>
</div>
<div class="contact">
	<h1 style="width: 23%;text-align: left;font-size: 16px;border-bottom:1px solid #999;height: 30px;line-height: 30px;padding: 10px 0;margin: 0 0 15px 30px;">联系人</h1>
	<ul class="kh">
		<li>
		<div>
			<label for="bt20">姓名：</label>
			<input type="text" placeholder="请输入姓名" id="bt20" name="contact_name" value="{$data.contact.contact_name}">
			</div>
		</li>
		<li>
			<div>
			<label for="bt21">电话：</label>
			<input type="text" placeholder="请输入电话" id="bt21" name="contact_tel" value="{$data.contact.contact_tel}">
			</div>
		</li>
		<li>
			<div>
			<label for="bt22">传真：</label>
			<input type="text" placeholder="请输入传真" id="bt22" name="contact_fax" value="{$data.contact.contact_fax}">
			</div>
		</li>
		<li>
			<div>
			<label for="bt23">QQ号：</label>
			<input type="text" placeholder="请输入QQ号" id="bt23" name="contact_qq" value="{$data.contact.contact_qq}">
			</div>
		</li>
	</ul>
	<ul class="kh">
		<li>
			<div>
			<label>性别：</label>
			<select name="gender">
		      <option value="1" <eq name="data.contact.gender" value="1">selected</eq>>男</option>
		      <option value="0" <eq name="data.contact.gender" value="0">selected</eq>>女</option>
		      </select>
			</div>
		</li>
		<li>
		<div>
			<label for="bt24">手机：</label>
			<input type="text" placeholder="请输入手机号" id="bt24" name="contact_mob" value="{$data.contact.contact_mob}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt25">职位：</label>
			<input type="text" placeholder="请输入职位名称" id="bt25" name="contact_business" value="{$data.contact.contact_business}">
			</div>
		</li>
		<li>
		<div>
			<label for="bt26">邮箱：</label>
			<input type="text" placeholder="请输入邮箱" id="bt26" name="contact_email" value="{$data.contact.contact_email}">
			</div>
		</li>
	</ul>
	<div class="clear"></div>
	<button style="height:45px; line-height: 45px;width: 100px; background: #5a98de;color: #fff;margin-left: 121px;border-radius: 5px;border:0;font-size: 15px;margin-top:20px;margin-bottom: 20px;" id="bbt" type="submit">提交</button>
</div>

<!-- 隐藏表单域，用来判断是更新还是提交 -->
<input type="hidden" name="customer_id" value="{$data.customer.customer_id}">
</form>
<script type="text/javascript" src="__PUBLIC__/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="__PUBLIC__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/h-ui.admin/js/H-ui.admin.js"></script>
</body>
</html>
