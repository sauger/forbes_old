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
		js_include_tag('select2css');
		css_include_tag('searchfh','top','bottom','right');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　<a href="">富豪检索结果</a></div>
		<div id=cyline></div>
		<div id=searchfh_left>
			<div id=s_l_t>
				富豪姓名　<input type="text">　　年龄段　<select></select>　　资产规模　<select></select>
				<div id=s_l_t_l>国　籍　<select></select>　　行　业　<select></select></div>
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
	<? require_once('../inc/right.inc.php');?>
	<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>