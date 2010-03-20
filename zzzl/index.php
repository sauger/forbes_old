<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-特约作者</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('zzzl','top','bottom');
	?>
</head>
<body>
	<div id=ibody>
		<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　</a><a style="color:#666666;" href="">专栏　＞　</a><a style="color:#666666;" href="">特约记者　＞　</a><a href="">周其仁</a></div>
		<div id=cyline></div>
		<div id=zzzl_left>
			<div id=zzzl_left_t></div>
			<div id=zzzl_left_content>
					<div id=top>
						<div id=pic><a href=""><img border=0 src="/images/zzzl/one.jpg"></a></div>
						<div id=pictitle_left><a href="">朱长城</a></div>
						<div id=pictitle_right><button></button></div>
					</div>
					<div class=c_title>
						<div class=wz>专栏作者介绍</div>
					</div>
					<div id=c_content>
						<a href="">朱长城现居住北京毕业学校北京想知道朱长城博客,朱长城微博客,朱长城微博,朱长城照片,朱长城QQ,朱长城EMAIL,朱长城MSN,朱长城个人资料,朱长城联系方式等信息请关注朱长</a>	
					</div>
					<div id=c_c_b><a href="">朱长城</a></div>
					<div id=c_b_title>
						<div id=wz>按日期存档</div>
					</div>
					<?php for($i=0;$i<5;$i++){ ?>
						<div class=c_b_content><a href="">2010年1月</a></div>
					<?php } ?>
					<div class=c_title>
						<div class=wz>其他特约专栏作家</div>
					</div>
					<?php for($i=0;$i<3;$i++){ ?>
						<div class=b_b_left>
							<div class=b_pic><a href=""><img border=0 src="/images/zzzl/two.jpg"></a></div>
							<div class=b_pictitle><a href="">周庆兰</a></div>
						</div>
						<div class=b_b_right>
							<div class=b_pic><a href=""><img border=0 src="/images/zzzl/two.jpg"></a></div>
							<div class=b_pictitle><a href="">周庆兰</a></div>
						</div>
					<?php } ?>
			</div>
			<div id=zzzl_left_b></div>
		</div>
		<div id=zzzl_right>
			<div id=title>
				<div class=dq_title>专栏文章</div>
				<div class=other_title>专栏照片</div>
				<div class=other_title>专栏作者详细介绍</div>	
			</div>
			<?php for($i=0;$i<4;$i++){ ?>
				<div class=r_content>
					<div class=r_title>
						<div class=wz>·健康乐活族的十大主张</div>
						<div class=subtime>发表于：2010-1-31</div>	
					</div>
					<div class=r_read>阅读数 （20）    评论 （10）</div>
					<div class=r_context>
						<a href="">　　也越来越多人加入到乐活的生活中，那么你知道这群新新乐活族是有什么样的主张呢？让我们看看乐活人的新新主张。也越来越多人加入到乐活的生活中，那么你知道这群新新乐活族是有什么样的主张呢？让我们看看乐活人的新新主张。也越来越多人加入到乐活的生活中，那么你知道这群新新乐活族是有什么样的主张呢？让我们看看乐活人的新新主张。也越来越新。也越来越多人加入到乐活的生活中，那么你知道这群新新乐活族是有什么样的主张呢？让我们看看乐活人的新新主张。</a>	
					</div>
					<div class=r_dash></div>
				</div>
			<?php } ?>
		</div>
		<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>