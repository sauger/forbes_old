<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯首页</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('whyl','top','bottom','right','select2css');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　</a><a style="color:#666666;" href="">奢华　＞　</a><a href="">文化娱乐</a></div>
		<div id=cyline></div>
		<div id=whylleft>
		<div id=whyltitle>
			<div class=t_pic><img border=0 src="/images/index/square.jpg"></div>
			<div class=wz>文化娱乐　<span style="font-weight:normal;font-size:12px;">共2251篇</span></div>
			<div class=line>|</div>
			<div class=more><a href=""><img border=0 src="/images/index/more.jpg"></a></div>		
		</div>
		<div id=whylcontent>
			<div id=whylpic>
				<div id=whylpic_top><a href=""><img border=0 src="/images/whyl/one.jpg"></a></div>
				<div id=whylpic_bottom><a href="">《福布斯》  记者：小妹   发布于：2010-1-25</a></div>
			</div>
			<div id=whylpictitle><a href="">李宁公司网络营销渠道建设案例分析</a></div>
			<div id=whylpiccontent><a href="">1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。</a></div>
			<div id=whylpicinfo><a href="">详细>></a></div>
		</div>
		<?php for($i=0;$i<7;$i++){ ?>
		<div class=content_title <?php if($i==0){ ?>style="margin-top:40px;"<? }?>>
			<div class=content_title_left><a href="">李宁公司网络营销渠道建设案例分析</a></div>
			<div class=content_title_right>《福布斯》  记者：小妹   发布与：2010-1-25</div>
		</div>
		<div class=content_context>
			<a href="">导语：1990年，李宁有限公司从广东三水起步。1995年，李宁公司成为中国体育用品行业的领跑者。1998年，公司建立了本土公司第一家服装与鞋的产品设计开发中心，成为自主开发的中国体育用品公司。</a>	
		</div>
		<div class=content_dash></div>
		<? }?>
	</div>
	<? require_once('../inc/right.inc.php');?>
	<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>