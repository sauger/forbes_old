﻿<?php 
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
		use_jquery();
		js_include_tag('public','index');
		css_include_tag('public','index');
	?>
</head>
<body>
	<div id=ibody>
	<?php require_once('inc/top.inc.php');?>
	<?php 
		function get_news_url($news){
			return "/news/news.php?id={$news->id}";
		}
	?>
	<?php include '_index_content.php'; ?>	
	<?php require_once('inc/bottom.inc.php');?>
	</div>
</body>
</html>
