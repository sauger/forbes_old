<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>用户注册</title>
	<?php
		use_jquery();
		js_include_tag('register/register');
		css_include_tag('register');
	?>
</head>
<body>
	<div id=register>
		<div id=title>请填写下列信息 <span style="color:red;">*</span>为必填项目</div>
		<form id="re_form" action="register.post.php" method="post">
		<table>
			<tr>
				<td class=td1><span style="color:red;">*</span>用 户 名：</td>
				<td class=td3><input class="txt" id="user_name" name="user[name]" type="text"></td>
				<td class=td2>
					<div id="user1" class="display1 name_check">4-20个字符，包含英文大小写字母和数字组成</div>
					<div id="user2" class="display2 name_check"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">用户名可用</div></div>
					<div id="user3" class="display3 name_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">用户名已存在请重新设置用户名</div></div>
					<div id="user4" class="display3 name_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">字符数超出限制</div></div>
					<div id="user5" class="display3 name_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">只能包含英文大小写字母和数字</div></div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">*</span>邮　　箱：</td>
				<td class=td3><input class="txt" name="user[email]" id="user_email" type="text"></td>
				<td class=td2>
					<div id="email1" class="display1 email_check">邮箱作为您找回密码的唯一凭证，请填写真实有效地邮箱地址并妥善保管！</div>
					<div id="email2" class="display2 email_check"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">邮箱填写正确</div></div>
					<div id="email3" class="display3 email_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">邮箱格式不正确请重新填写</div></div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">*</span>登陆密码：</td>
				<td  class=td3><input class="txt" id="user_pass" name="user[password]" type="password"></td>
				<td class=td2>
					<div id="pass1" class="display1 pass_check">请设置4-20个字符，包含英文大小写字母、数字和部分标点符号的组合</div>
					<div id="pass2" class="display2 pass_check"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">密码可用</div></div>
					<div id="pass3" class="display3 pass_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">出现不可用字符请修改密码</div></div>
					<div id="pass4" class="display3 pass_check"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">字符数超出限制</div></div>
				</td>
			</tr>
			<tr>
				<td class=td1><span style="color:red;">*</span>确认密码：</td>
				<td class=td3><input class="txt" id="password2" type="password"></td>
				<td class=td2>
					<div id="check_pass1" class="display2 pass_check2"><div class=pic><img src="/images/register/right.jpg"></div><div class="pic_content">输入一致</div></div>
					<div id="check_pass2" class="display3 pass_check2"><div class=pic><img src="/images/register/error.jpg"></div><div class="pic_content">请输入相同密码</div></div>
				</td>
			</tr>
		</table>
		<hr>
		<table>
			<tr>
				<td class=td5>是否愿意订阅福布斯精华推荐（一周发送一次）：</td>
				<td class=td2><a href="">查看快闻板式</a></td>
			</tr>
			<tr>
				<td class=td5><input type="checkbox" name="jhtj" id="order1">我愿意订阅</td>
			</tr>
			<tr>
				<td class=td5><input id="order2" type="checkbox">不，暂时不考虑</td>
			</tr>
			<tr>
				<td class=td5>是否愿意订阅福布斯分类文章（一周发送一次）：</td>
				<td class=td2><a href="">查看快闻板式</a></td>
			</tr>
			<tr>
				<td class=td5><input type="checkbox" name="fh" checked=checked>富豪<input type="checkbox" name="cy" class="ck">创业<input type="checkbox" name="sy"  class="ck">商业<input type="checkbox" name="kj" class="ck">科技</td>
			</tr>
			<tr>
				<td class=td5><input name="tz" type="checkbox">投资<input type="checkbox" name="sh" class="ck">生活</td>
			</tr>	
		</table>
		<hr>
		<table>
			<tr>
				<td class=td1 style="line-height:32px;"><span style="color:red;">*</span>注册验证码：</td>
				<td class=td3 style="line-height:32px;"><div id=yzm_input><input style="margin-top:5px;" id="rvcode" type="text"></div><div id=yzm><img id="pic" src="yz.php"></div></td>
				<td class=td2 style="line-height:32px;">
					<a style="cursor:pointer;" id="chang_pic">看不清楚？换张图片</a>
				</td>
				<div id="pic_value">
				<input type="hidden" id="h_p_value" value="">
				</div>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td class=td5 style="color:#999999; font-weight:normal;"><input type="checkbox" checked=checked>我接受福布斯中文网用户注册和使用协议</td>
				<td class=td2><a href="">查看协议</a></td>
			</tr>
			<tr>
				<td class=td5 ><button id="tj" type="button">确认并注册</button></td>
				<td class=td2></td>
			</tr>
		</table>
		</form>
	</div>
</body>
</html>