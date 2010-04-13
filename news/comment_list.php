<?php 
	require_once('../frame.php');
	$id = intval($_REQUEST['id']);
	if(!empty($id)){
		$news = new table_class('fb_news');
		if(!$news->find($id)){
			redirect('error.html');
			die();
		}else{
			$db = get_db();
			$db->query("select group_concat(industry_id separator ',') as ids from fb_news_industry where news_id=$id");
			if($db->move_first()){
				$industry_id = $db->field_by_name('ids');
			}
		}
	}else{
		redirect('error.html');
		die();
	}
	$title = $news->title;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo strip_tags($news->short_title);?>-福布斯中文网</title>
	<meta name="Keywords" content="<?php echo strip_tags($news->keywords);?>"/>
	<meta name="Description" content="<?php echo strip_tags($news->description);?>"/>
	<?php
		use_jquery();
		js_include_tag('news/news','public','right');
		css_include_tag('public','news','paginate','right_inc');
	?>
</head>
<body>
<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=bread>
				评论 > 
			<span style="color:#246BB0;"><?php echo strip_tags($news->title);?></span>				
		</div>
		<div id=bread_line></div>		
	
		<div id=l>
				<div id=news_title><?php echo $title;?></div>
				<input type="hidden" id=is_comment value='1'></input>
				<input type="hidden" value="<?php echo $id;?>" id=newsid></input>
				<div id=news_comment>
					<?php 
						$db = get_db();
						$count = $db->query("select count(id) as num from fb_comment where resource_id=$id");
						$count = $count[0]->num;
						$news = new table_class('fb_news');
						$news->find($id);
					?>
					
				<div id=comment_caption>
					<div id=comment_title>读者评论</div>
					<div id=comment_count>(共<?php echo $count;?>条)</div>
					<button id=comment_btn></button>
					<a href="<?php echo static_news_url($news);?>" id=comment_more>返回新闻原文</a>
				</div>
				
				<div class=publish_comment <?php if(isset($_SESSION['name'])){?>id='show_comment'<?php }?>>
						<textarea id=comment_text></textarea>
						<input type="radio" name="nick_name" id=hid_name value="hidden"><span>匿名</span>
						<input type="radio" checked="checked" id=has_name name="nick_name" value="name"><span>昵称</span>
						<input type="text" value="<?php echo $_SESSION['name']?>" id=nick_name></input>
						<button id=commit_submit>提交</button>
				</div>
				<div class=publish_comment <?php if(!isset($_SESSION['name'])){?>id='show_comment'<?php }?>>
						<div id=login_info>请先登录再发表评论</div>
						<span>用户名：</span><input type="text"  value="<?php echo $_SESSION['name']?>" id=user_name></input>
						<span>密码：</span><input type="password" value="<?php echo $_SESSION['name']?>" id=password></input>
						<button id=comment_login>登录</button>
				</div>
				<?php 
						$sql = "select t1.nick_name,t1.created_at,t1.comment,t1.id,t2.up,t2.down from fb_comment t1 left join fb_comment_dig t2 on t1.id=t2.comment_id where t1.resource_id=$id order by t1.created_at desc";
						$comment = $db->paginate($sql,10);
						$count = $db->record_count;
						for($i=0;$i<$count;$i++){
				?>
				<div class=comment_box>
						<div class=name><?php echo $comment[$i]->nick_name;?></div>
						<div class=time><?php echo $comment[$i]->created_at;?></div>
						<div class=support>
							<div name='<?php echo $comment[$i]->id;?>' class="up pointor">支持(</div><div class="up_count"><?php if(!$comment[$i]->up){echo '0';}else{echo $comment[$i]->up;};?></div><div>)</div>
							<div name='<?php echo $comment[$i]->id;?>' class="down pointor">反对(</div><div class="down_count"><?php if(!$comment[$i]->down){echo '0';}else{echo $comment[$i]->down;};?></div><div>)</div>
						</div>
						<div class=comment_content>
							<?php echo $comment[$i]->comment;?>
						</div>
				</div>
					<?php }?>
				</div>
				<div id=comment_paginate><?php paginate()?></div>
		</div>
	 	<div id=right_inc>
	 		<?php include "../right/ad.php";?>
	 		<?php include "../right/favor.php";?>
	 		<?php include "../right/four.php";?>
	 		<?php include "../right/rich.php";?>
	 		<?php include "../right/magazine.php";?>
	 	</div>

		<?php include "../inc/bottom.inc.php";?>

</div>
</body>
<html>