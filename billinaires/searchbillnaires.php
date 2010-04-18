<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-富豪检索</title>
	<?php
		use_jquery();
		js_include_tag('right');
		css_include_tag('public','billinaires','right_inc');
	?>
</head>
<body>
	
	<div id=ibody>
		<? require_once('../inc/top.inc.php');?>
		<div id=bread><a href="#">富豪检索</a></div>
		<div id=bread_line></div>
		<div id=searchbillinaires_left>
			<div id=s_l_t>
				<div class=everydiv>富豪姓名　<input type="text"></div><div class=everydiv>年龄段　<select></select></div><div class=everydiv>资产规模　<select></select></div>
				<div class=everydiv>国　　籍　<select></select></div><div class=everydiv>行　业　<select></select></div>
				<div id=s_l_t_r><button></button></div>
			</div>
			<div id=s_l_title_left></div>
			<div id=s_l_title_center>
				<div id=wz>搜索结果如下</div>
			</div>
			<div id=s_l_title_right></div>
			<?php for($i=0;$i<4;$i++){ ?>
				<div class=icon1></div>
				<div class=content>刘永好　　60岁　　150亿　　中国　　房地产</div>
				<div class=dash></div>
			<?php } ?>
		</div>
		<div id=right>
				<div id="right_inc" style="margin-top:10px;">
		  		<?php include "../right/ad.php";?>
		  		<?php include "../right/investment_list.php"?>
		  		<?php include "../right/favor.php"?>
		  		<?php include "../right/activities.php"?>
		  		<?php include "../right/article.php";?>
				</div>
		</div>
		<? require_once('../inc/bottom.inc.php');?>
	</div>
	
</body>
</html>