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
		css_include_tag('html/culture/culture','public','paginate','right_inc');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>文章列表</div>
			<?php
				$category = new category_class('news');
				$parent_ids = $category->tree_map($cid);
			?>
			<div id=title1>
				<a href="/">福布斯中文网</a>
				<?php
					$len = count($parent_ids);
					for($i=$len-1;$i>0;$i--){
						$item = $category->find($parent_ids[$i]);
				?>>
				<a href="news_list.php?cid=<?php echo $parent_ids[$i];?>"><?php echo $item->name;?></a>
				<?php
					}
					$item = $category->find($parent_ids[0]);
				?>
				><span style="color:#246BB0; margin-left:8px;"><?php echo $item->name;?></span>
			</div>
			<div id=line></div>
		</div>
		<div id=l>
			<div id=l_t>
				<div id=l_t_t>
					<div id=l_t_t1>
						<?php echo $item->name;?>
					</div>
				</div>
				<?php
					$top_news = $db->query("select * from fb_news where category_id={$cid} and video_photo_src!='' and set_up=1 order by priority asc,created_at desc limit 1");
					if($db->record_count==1&&(empty($_REQUEST['page'])||($_REQUEST['page']==1))){
				?>
				<div id=l_t_m>
					<div id=picture>
						<img height="200" width="300" src="<?php echo $top_news[0]->video_photo_src?>">
					</div>
					<div id=l_t_m_r>
						<div id=l_t_m_r_t1>
							<a href="news.php?id=<?php echo $top_news[0]->id;?>"><?php echo $top_news[0]->title;?></a>
						</div>
						<div id=l_t_m_r_t2>
							<?php echo $top_news[0]->description;?>
						</div>
						<div id=l_t_m_r_t3>
							<a href="news.php?id=<?php echo $top_news[0]->id;?>">详细>></a>
						</div>
					</div>
					<div id=l_t_b>
						《福布斯》　记者：<?php echo $top_news[0]->author;?>　发布于：<?php echo substr($top_news[0]->created_at,0,10);?>
					</div>
				</div>
				<?php }?>
				<div id=l_m>
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
					<div class=l_m_t>
						<div class=l_m_t1>
							<div class=l_m_t2>
								<a title="<?php echo $record[$i]->title;?>" href="news.php?id=<?php echo $record[$i]->id;?>"><?php echo $record[$i]->title?></a>
							</div>
							<div class=l_m_t3>
								《福布斯》　记者：<?php echo $record[$i]->author;?>　发布于：<?php echo substr($record[$i]->created_at,0,10);?>
							</div>
							<div class=l_m_t4 >
								<?php echo $record[$i]->description;?>
							</div>
						</div>
						<div class="dash"></div>
					</div>
					<?php }?>
					<div id=page>
						<?php paginate();?>
					</div>
				</div>
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