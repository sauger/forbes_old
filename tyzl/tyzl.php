<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-城市首页</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('tyzl','top','bottom','right');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');
	?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　</a><a href="">城市首页</a></div>
		<div id=cyline></div>
		<div id=cy_left>
			<div id=search>专栏搜索：<select></select><input type="text"><button>搜索</button></div>
			<div id=cy_title>
				<?php 
				$db=get_db();
				$user=$db->paginate('select * from fb_user where role_name="author"',5);
				?>
				<div id=title_left></div>
				<div id=title_center>
					<div id=bt>特约专栏共有<?php echo count($user); ?>位作者</div>	
				</div>
				<div id=title_right></div>
			</div>
			<?php for($i=0;$i<count($user);$i++){ ?>
			<div class=cy_content>
				<div class=pic>
					<a href=""><img border=0 src="<?php echo $user[$i]->image_src; ?>"></a>	
				</div>
				<div class=pictitle>
					<a href=""><?php echo $user[$i]->nick_name; ?>专栏</a>	
				</div>
				<div class=piccontent>
					<a href=""><?php echo $user[$i]->descripition; ?></a>	
				</div>
			</div>
			<div class=newarticle>
				<div class=wz>最新专栏文章</div>
				<div class=wx>
					<div class="enterzl"><a href="">进入专栏>></a></div>	
				</div>
				<?php 
					$news=$db->query('select * from fb_news where author_id='.$user[$i]->id.' and is_adopt=1 order by priority asc, created_at desc limit 2');
				?>
				<div class=content>
					<div class="images"><a href=""><img border=0 src="/images/tyzl/sjt.jpg"></div>
					<div class=context><a href=""><?php echo $news[0]->title; ?></a></div>
				</div>
				<div class=content_dash></div>
				<div class=content>
					<div class="images"><a href=""><img border=0 src="/images/tyzl/sjt.jpg"></div>
					<div class=context><a href=""><?php echo $news[1]->title; ?></a></div>
				</div>
			</div>
			<div class=cy_dash></div>
			<?php } ?>
			<div id=cy_paginate><?php paginate(''); ?></div>
		</div>
	<? require_once('../inc/right.inc.php');?>
	<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>