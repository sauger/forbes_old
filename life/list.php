<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-奢侈品</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('scp','top','bottom','right');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　</a><a style="color:#666666;" href="">奢华　＞　</a><a href="">文化娱乐</a></div>
		<div id=cyline></div>
		<div id=scpleft>
			<div id=scpleft_t>
				<div id=scpleft_title>
					<div class=wz>奢侈品列表信息</div>
				</div>	
				<div id=scpleft_content_left></div>
				<div id=scpleft_content>
					<div id=pic><a href=""><img border=0 src="/images/scp/one.jpg"></a></div>
					<div id=pictitle><a href="">典藏版劳力士蚝式表</a></div>
					<div id=piccontent><a href="">细看典藏版劳力士蚝式表的表面，四个简洁的英文字跃现眼前：Superlative Chronometer Officially Certified。这意味着腕表机芯已成功通过瑞士精密时间测试中心15个昼夜的严格测试；意味着在不同环境及温度下，它均表现出极精确的优异性能；亦是它获得珍贵“ 官方鉴定认可计时” 荣誉的凭证。这，也是典藏版劳力士腕表一贯的标准。</a></div>
					<div id=picinfo><a href="">详细>></a></div>
				</div>
				<div id=scpleft_content_right></div>
			</div>
			<?php for($i=0;$i<6;$i++){ ?>
			<div class=scpleft_b>
				<div class=scpleft_b_l><a href=""><img border=0 src="/images/scp/one.jpg"></a></div>
				<div class=scpleft_b_r>
					<div class=pictitle><a href="">典藏版劳力士蚝式表</a></div>
					<div class=piccontent><a href="">细看典藏版劳力士蚝式表的表面，四个简洁的英文字跃现眼前：Superlative Chronometer Officially Certified。这意味着腕表机芯已成功通过瑞士精密时间测试中心15个昼夜的严格测试；意味着在不同环境及温度下...</a></div>
					<div class=picinfo><a href="">详细>></a></div>
				</div>
				<?php if($i<5){ ?>
				<div class=scp_left_dash></div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	<? require_once('../inc/right.inc.php');?>
	<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>