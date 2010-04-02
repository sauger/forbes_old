<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	
	<title>福布斯-创业首页</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('tz','top','bottom','right_inc');
	?>
</head>
<body>
	<div id=ibody>
		<? 
			$db=get_db();
			$cid=$db->query('select id from fb_category where name="创业" and parent_id=0');
			$cid=$cid[0]->id;
			$nav=$db->query('select id from fb_navigation where name="创业"');
			$nav=$nav[0]->id;
			require_once('../inc/top.inc.php');
			include('../_index.php');
		 	require_once('../inc/bottom.inc.php');
		?>
	</div>
</body>
</html>