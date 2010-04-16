<?php 
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
		js_include_tag('public','picture_list/index','right');
		css_include_tag('jquery-ui','imagesphb','public','right_inc');
		$db = get_db();
		$id = intval($_GET['id']);
		if(empty($id)){
			alert('非法操作');
			redirect('/');
		}
		$list = new table_class('fb_custom_list_type');
		$list->find($id);
		if($list->id <= 0 || $list->list_type != 4){
			alert('非法操作');
			redirect('/');
		}
		$items = $db->query("select name,image,comment from fb_picture_list_items where list_id ={$list->id}");
		$len = $db->record_count;
		for($i=0;$i<$len;$i++){
			$tmp['name'] = $items[$i]->name;
			$tmp['image'] = $items[$i]->image;
			$tmp['comment'] = str_replace("\r\n","",$items[$i]->comment);
			$tmp['comment'] = str_replace("\t","",$tmp['comment']);
			$litems[] = $tmp;
		}
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="/">福布斯中文网　＞　</a><a href="/list/list.php?id=9">图片排行榜</a>　＞　<span><?php echo $list->name;?></span></div>
		<div id=cyline></div>
		<div id=phb_left>
			<div id=p_flash>
				<div id="control_panel">
					<div id="btns">
						<img id="btn_prev" src="/images/imagephb/prev.jpg" title="上一张" />
						<img id="btn_play" src="/images/imagephb/pause.jpg" title="暂停" />
						<img id="btn_next" src="/images/imagephb/next.jpg" title="下一张" />
					</div>
					<div id="slider"></div>
					<span id="speed">播放速度</span>
				</div>
				<div id="picture_content">
					<img id="main_picture" width="359" height="359" src="<?php echo $items[0]->image;?>" />
				</div>
				<div id="picture_list">
					<img width="108" height="108" class="selected" src="<?php echo $items[0]->image;?>" />
					<img width="108" height="108" src="<?php echo $items[1]->image;?>" />
					<img width="108" height="108" src="<?php echo $items[2]->image;?>" />
				</div>
				
				<!-- 
				<img src="/images/imagephb/image_flash.jpg">
				 -->
				 	
			</div>
			<div id=email>
					<div id=pic><a href=""><img border=0 src="/images/imagephb/email.jpg"></a></div>
					<div id=wz><a href="">分享给好友</a></div>
			</div>
			<div id=p_r_t>
				<div id=title><a href=""><?php echo $items[0]->name?></a></div>
				<div id=content><a href="">　　<?php echo $items[0]->comment?></a></div>
				
			</div>
			<div id=p_r_b_title>
				<div id=wz>图片榜单推荐</div>
			</div>
			<?php 
			$db = get_db();
			$lists = $db->query("select name from fb_custom_list_type where list_type=4 and id != {$id} order by id desc limit 3");
			for($i=0;$i<3;$i++){ ?>
			<div class=cl><a href="">·<?php echo $lists[$i]->name;?></a></div>
			<?php } ?>
		</div>
		<input type="hidden" id="list_id" value="<?php echo $id;?>" />
		<div id="right_inc">
		 		<?php include "../right/ad.php";?>
		 		<?php include "../right/favor.php";?>
		 		<?php include "../right/four.php";?>
		 		<?php include "../right/magazine.php";?>
		</div>
	<? require_once('../inc/bottom.inc.php');?>
	</div>
</body>
</html>