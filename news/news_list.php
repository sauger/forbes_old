<?php 
	require_once('../frame.php');
	$cid = intval($_REQUEST['cid']);
	if(empty($cid)){
		redirect('error.html');
		die();
	}
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-新闻列表</title>
	<?php
		use_jquery();
		js_include_tag('public','right');
		css_include_tag('news','public','right_inc');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=bread>
				<?php
					$category = new category_class('news');
					$parent_ids = $category->tree_map($cid);
					$c_id = $category->children_map($cid);
					$c_id = implode(',',$c_id);
					$len = count($parent_ids);
					for($i=$len-1;$i>0;$i--){
						$item = $category->find($parent_ids[$i]);
				?>
				<a href="news_list.php?cid=<?php echo $parent_ids[$i];?>"><?php echo $item->name;?></a>
				<?php
					}
					$item = $category->find($parent_ids[0]);
				?>
				><span style="color:#246BB0; margin-left:8px;"><?php echo $item->name;?></span>		
		</div>
		<div id=bread_line></div>
		
		<div id=l>
			<div class=news_caption>
					<?php $news_count = $db->query("select count(id) as num from fb_news where category_id in ($c_id)");?>
					<div class=captions><?php echo $item->name;?><span>共<?php echo $news_count[0]->num;?>篇</span></div>
			</div>
			<?php
					$top_news = $db->query("select * from fb_news where category_id in ($c_id) and video_photo_src!='' and set_up=1 order by priority asc,created_at desc limit 1");
					if($db->record_count==1&&(empty($_REQUEST['page'])||($_REQUEST['page']==1))){
				?>
			<div id=list_top>
					<div id=picture><img width="300" height="200"  src="<?php echo $top_news[0]->video_photo_src?>"></div>
					<div id=title><a href="news.php?id=<?php echo $top_news[0]->id;?>"><?php echo $top_news[0]->title;?></a></div>
					<div id=description><?php echo $top_news[0]->description;?></div>
					<div id=info>《福布斯》　记者：<?php echo $top_news[0]->author;?>　发布于：<?php echo substr($top_news[0]->created_at,0,10);?></div>
			</div>
			<?php }?>
			
			<div id=list_content>
					<?php
					if($db->record_count==1){
						$sql = "select id,author,created_at,title,description from fb_news where category_id=$cid and id!={$top_news[0]->id} order by priority asc,created_at desc";
					}else{
						$sql = "select id,author,created_at,title,description from fb_news where category_id=$cid order by priority asc,created_at desc";
					}
					$record = $db->paginate($sql,8);
					$count = count($record);
					for($i=0;$i<$count;$i++){
					?>
					<div class=list_box>
							<div class=title><a title="<?php echo $record[$i]->title;?>" href="news.php?id=<?php echo $record[$i]->id;?>"><?php echo $record[$i]->title?></a></div>
							<div class=info>《福布斯》　记者：<?php echo $record[$i]->author;?>　发布于：<?php echo substr($record[$i]->created_at,0,10);?></div>
							<div class=description ><?php echo $record[$i]->description;?></div>
					</div>
					<?php }?>
					<div id=page><?php paginate();?></div>
			</div>
		</div>	
		<div id="right_inc">
			<?php include "../right/ad.php";?>
			<?php include "../right/favor.php";?>
			<?php include "../right/four.php";?>
			<?php include "../right/forum.php";?>
			<?php include "../right/magazine.php";?>
		</div>
		<?php include "../inc/bottom.inc.php";?>
</div>
</body>
<html>