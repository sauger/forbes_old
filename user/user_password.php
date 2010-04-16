<?php 
	require_once('../frame.php');
	require_login();
	$db = get_db();
	$uid = $_SESSION['user_id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-用户</title>
	<?php
		use_jquery();
		js_include_tag('public','user/user','jquery.colorbox-min');
		css_include_tag('html/user/user','public','colorbox');
	?>
</head>
<body>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>用户中心</div>
			<div id=title1><a style="color:#626262;" href="">个人中心</a> > <a href="" style="color:#246BB0;">个人基本信息</a> </div>
			<div id=line></div>
		</div>
		<div id=left>
			<div id=left_top>
				用户中心导航
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/html/user/c1a.gif">
					<img style="display:none" src="/images/html/user/c1b.gif">
				</div>
				<div class="left_text"><a href="user_info.php">个人基本信息</div></a>
				<div class="icon2"><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/html/user/c2a.gif">
					<img style="display:none" src="/images/html/user/c2b.gif">
				</div>
				<div class="left_text"><a href="user_order.php">订阅信息</a></div>
				<div class="icon2"><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list">
				<div class="icon">
					<img src="/images/html/user/c3a.gif">
					<img style="display:none" src="/images/html/user/c3b.gif">
				</div>
				<div class="left_text"><a href="user_favorites.php">我的收藏</a></div>
				<div class="icon2"><img src="/images/html/user/coin.gif"></div>
			</div>
			<div class="left_list2">
				<div class="iconb">
					<img style="display:none" src="/images/html/user/c4a.gif">
					<img style="display:inline" src="/images/html/user/c4b.gif">
				</div>
				<div class="left_text"><a href="user_password.php">修改登录密码</a></div>
				<div class="icon2" style="display:inline"><img src="/images/html/user/coin.gif"></div>
				
			</div>
		</div>
		<div class=right>
			<div class=right_title>
				<span style="float:left;display:inline">修改登录密码</span>
				<?php $log = $db->query("select * from fb_yh_log where yh_id=$uid order by id desc limit 2");?>
				<span class="r_t_right">亲爱的<?php echo $_SESSION['name'];?>：您上次登录的时间是 <?php if($db->record_count==2) echo $log[1]->time;else echo $log[0]->time;?></span>
			</div>
			<div class="right_text">
				<div style="margin-top:40px;" class="p_list"><label for="old_pass">原密码</label><input id="old_pass" type="password"></div>
				<div class="p_list"><label for="new_pass">新密码</label><input id="new_pass" type="password"></div>
				<div class="p_list"><label for="rnew_pass">确认新密码</label><input id="rnew_pass" type="password"></div>
				<button class="user_b" id="pass_b" type="button">设定</button>
			</div>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>