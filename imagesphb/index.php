<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-图片排行榜</title>
	<?php
		use_jquery_ui();
		js_include_tag('select2css','picture_list/index');
		css_include_tag('jquery-ui','imagesphb','public','right');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　</a><a href="">富豪检索结果</a></div>
		<div id=cyline></div>
		<div id=phb_left>
			<div id=p_flash style="border:1px solid">
				<div id="control_panel">
					<div id="btns">
						<img src="/images/imagephb/prev.jpg" title="上一张" />
						<img src="/images/imagephb/pause.jpg" title="暂停" />
						<img src="/images/imagephb/next.jpg" title="下一张" />
					</div>
					<div id="slider"></div>
					<span style="float:right;line-height:24px;margin-left:80px;">播放速度</span>
				</div>
				<!-- 
				<img src="/images/imagephb/image_flash.jpg">
				 -->
				 	
			</div>
			<div id=email>
					<div id=pic><a border=0 href=""><img border=0 src="/images/imagephb/email.jpg"></a></div>
					<div id=wz><a href="">分享给好友</a></div>
			</div>
			<div id=p_r_t>
				<div id=title><a href="">健康乐活族的十大主张</a></div>
				<div id=content><a href="">　　这里的确是让人心旷神怡的地方，依山傍海，大自然的慷慨给了她清新幽雅的气质。与此同时，富于艺术美感的神户人，巧花心思，又在小小的天地里再创作出新的情趣和意境。<br>　　在很多人眼里，神户与太多的关键名词挂得上钩。美食，神户牛肉是全世界最贵的牛肉，号称吃口鲜嫩，入口即化；明星，今年藤原纪香把自己的蜜月放在了神户度过，让这个城市风光无比；即便是最让人害怕的名词———地震，当年的阪神大地震可是让地球也“晃了三晃”的。</a></div>
				<div id=cl><a href="">SHE个人主页</a></div>
			</div>
			<div id=p_r_b_title>
				<div id=wz>图片榜单推荐</div>
			</div>
			<?php for($i=0;$i<3;$i++){ ?>
			<div class=cl><a href="">·中国富豪最富豪最集中的10个城市</a></div>
			<?php } ?>
		</div>
	<? require_once('../inc/right.inc.php');?>
	<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>