<?php require_once('../frame.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<?php
			use_jquery();
			css_include_tag('register');
		?>
</head>
<body>
	<div id=register>
		<div id=title>请填写下列信息 <span style="color:red;">*</span>为必填项目</div>
		<table>
			<tr>
				<td class=td1><span style="color:red;">*</span>用 户 名：</td>
				<td class=td3><input class="txt" type="text"></td>
				<td class=td2>
					<div class="display1">4-20个字符，包含英文大小写字母和数字组成</div>
					<div class="display2"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">用户名可用</div></div>
					<div class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">用户名已存在</div></div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">*</span>邮　　箱：</td>
				<td class=td3><input class="txt" type="text"></td>
				<td class=td2>
					<div class="display1">邮箱作为您找回密码的唯一凭证，请填写真实有效地邮箱地址并妥善保管！</div>
					<div class="display2"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">邮箱填写正确</div></div>
					<div class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">邮箱格式不正确请重新填写</div></div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">*</span>登陆密码：</td>
				<td  class=td3><input class="txt" type="text"></td>
				<td class=td2>
					<div class="display1">请设置4-20个字符，包含英文大小写字母、数字和部分标点符号的组合</div>
					<div class="display2"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">密码可用</div></div>
					<div class="display3"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">出现不可用字符请修改密码</div></div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">*</span>确认密码：</td>
				<td class=td3><input class="txt" type="text"></td>
				<td class=td2></td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">*</span>行　　业：</td>
				<td class=td3><select class=sel1></select></td>
				<td class=td2></td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">*</span>职　　位：</td>
				<td  class=td3><select class=sel1></select></td>
				<td class=td2></td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">*</span>性　　别：</td>
				<td class=td3><div class=td4><input type="radio" name="sex">男</div><div class=td4><input type="radio" name=sex>女</div></td>
				<td class=td2></td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">*</span>所在区域：</td>
				<td class=td3><div class=td4><select class="sel2"></select></div><div class=td4><select class="sel2"></select></div></td>
				<td class=td2></td>
			</tr>
		</table>
		<hr>
		<table>
			<tr>
				<td class=td5>是否愿意订阅福布斯精华推荐（一周发送一次）：</td>
				<td class=td2><a href="">查看快闻板式</a></td>
			</tr>
			<tr>
				<td class=td5><input type="checkbox" checked=checked>我愿意订阅</td>
			</tr>
			<tr>
				<td class=td5><input type="checkbox">不，暂时不考虑</td>
			</tr>
			<tr>
				<td class=td5>是否愿意订阅福布斯分类文章（一周发送一次）：</td>
				<td class=td2><a href="">查看快闻板式</a></td>
			</tr>
			<tr>
				<td class=td5><input type="checkbox" checked=checked>富豪<input type="checkbox" class="ck">创业<input type="checkbox"  class="ck">商业<input type="checkbox" class="ck">科技</td>
			</tr>
			<tr>
				<td class=td5><input type="checkbox">投资<input type="checkbox" class="ck">生活</td>
			</tr>	
		</table>
		<hr>
		<table>
			<tr>
				<td class=td1 style="line-height:32px;"><span style="color:red;">*</span>注册验证码：</td>
				<td class=td3 style="line-height:32px;"><div id=yzm_input><input style="margin-top:5px;" type="text"></div><div id=yzm>1234</div></td>
				<td class=td2 style="line-height:32px;">
					<a href="">看不清楚？换张图片</a>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td class=td5 style="color:#999999; font-weight:normal;"><input type="checkbox" checked=checked>我接受福布斯中文网用户注册和使用协议</td>
				<td class=td2><a href="">查看协议</a></td>
			</tr>
			<tr>
				<td class=td5 ><button>确认并注册</button></td>
				<td class=td2></td>
			</tr>
		</table>
	</div>
</body>
</html>