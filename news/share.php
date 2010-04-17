<?php 
	require_once('../frame.php');
	$db = get_db();
	$_SESSION['news_share'] = rand_str();
	$news_id = intval($_GET['news_id']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-新闻分享</title>
	<?php
		use_jquery();
		js_include_tag('public','right','news/share');
		css_include_tag('news','public','right_inc');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=bread>
				<span style="color:#246BB0; margin-left:8px;">分享</span>		
		</div>
		<div id=bread_line></div>
		<div id=l>
			<div class="share_line">分享给好友，您可以输入好友昵称和邮件地址，将福布斯的精华文章和您的商务好友分享</div>
			<form action="share.post.php" method="post">
			<div class="share_line">
				<div class="share_mail"><span>好友邮件1:</span><input name="mail[]" class="input1" type="text"></div>
				<div class="share_name"><span>好友昵称1：</span><input name="name[]" class="input2" type="text"></div>
			</div>
			<div class="share_line">
				<div class="share_mail"><span>好友邮件2:</span><input name="mail[]" class="input1" type="text"></div>
				<div class="share_name"><span>好友昵称2：</span><input name="name[]" class="input2" type="text"></div>
			</div>
			<div class="share_line">
				<div class="share_mail"><span>好友邮件3:</span><input name="mail[]" class="input1" type="text"></div>
				<div class="share_name"><span>好友昵称3：</span><input name="name[]" class="input2" type="text"></div>
			</div>
			<div class="share_line"><button type="button" id=add>继续添加</button></div>
			<div style="margin-top:50px" class="share_line"><button type="submit">提交</button></div>
			<input type="hidden" name="session" value="<?php echo $_SESSION['news_share'];?>">
			<input type="hidden" name="news_id" value="<?php echo $news_id;?>">
			</form>
		</div>
		<div id="right_inc">
			<?php include "../right/ad.php";?>
		</div>
		<?php include "../inc/bottom.inc.php";?>
</div>
</body>
<html>