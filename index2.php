<?php 
	session_start();
	require_once('frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯首页</title>
	<?php
		js_include_tag('top','select2css','index','bottom');
		css_include_tag('index','public');
	?>
</head>
<body>
	<? require_once('inc/top.inc.php');?>
	<div id=ibody>
		<? require_once('inc/bottom.inc.php');?>
	
	</div>
</body>
</html>
