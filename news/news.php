<?php 
	require_once('../frame.php');
	$id = intval($_REQUEST['id']);
	if(!empty($id)){
		$news = new table_class('fb_news');
		if(!$news->find($id)){
			redirect('error.html');
			die();
		}
	}else{
		redirect('error.html');
		die();
	}
	$db = get_db();
	$db->query("select english_news_id from fb_news_relationship where chinese_news_id={$id}");
	if($db->move_first()){
		$english_id = $db->field_by_name('english_news_id');
	}
	if(strtolower($_GET['lang']) == 'en' && $english_id){
		$english_news = new table_class('fb_news');
		$english_news->find($english_id);
		$title = $english_news->title;
		$content = $english_news->content;
	}else{
		$title = $news->title;
		$content = $news->content;
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯新闻阅读页</title>
	<?php
		use_jquery();
		js_include_tag('news/news','select2css');
		css_include_tag('html/news/news','top','bottom','select2css');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<div id=top>
			<div id=title>福布斯新闻</div>
			<?php
				$category = new category_class('news');
				$parent_ids = $category->tree_map($news->category_id);
			?>
			<div id=title1>
				<a href="/">福布斯中文网</a> > 
				<?php
					$len = count($parent_ids);
					for($i=$len-1;$i>=0;$i--){
						$item = $category->find($parent_ids[$i]);
				?>
				<a href=""><?php echo $item->name;?></a> > 
				<?php
					}
				?>
				<span style="color:#246BB0;"><?php echo $news->short_title;?></span>
			</div>
			<div id=line></div>
		</div>
		<div id=news_content>
			<div id=center-left>
				<div id=title3>
					<span>
					<?php echo $title;?>
					</span>
					<div id=title2>
						<div id=t1>
						<?php if($english_id && $_GET['lang'] != 'en'){?>
							<a href="news.php?id=<?php echo $id?>&lang=en" class=nor5>English</a>
						<?php }?>
						<?php if($_GET['lang'] == 'en'){?>
							<a href="news.php?id=<?php echo $id?>" class=nor5>中文</a>
						<?php }?>
						&nbsp;
						</div>
						<div id=t2>
							<a href="" class=nor5>我要评论(0)</a>
						</div>
						<?php if($news->pdf_src){?>
						<a href="" class="nor">下载PDF格式</a>
						<?php }?>   
						<a href="" class="nor">加入收藏</a>
					</div>
				</div>
				
				<div id=text>
					<div id=text3>
						<div id="roll"></div>
						<?php if($news->ad_id){?>
						<div id=picture6>
							<img src="/images/html/news/picture6.jpg">
						</div>
						<?php }?>
						<div id="news_text"><?php echo $content;?></div>
					</div>
					<div id=text5>
						<div id=button>
							<input type="button" id=button4>
						</div>
					</div>
					<div id="text_dash"></div>
					<?php if($news->top_info!=''){?>
					<div id=text1>
						<div id=text2>
							<div id=text4>
								<?php echo $news->top_info?>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				<?php
					if($news->author!=''){
						$record = $db->query("select id,short_title,title from fb_news where author='{$news->author}' and id!=$id limit 3");
						if(count($record)>0){
				?>
				<div id=right-div3>
					<div id=right-title3>
						<div class=tar></div>该作者的其他文章
					</div>
					<div class=tar1>
						<a href="news_list.php?news_id=<?php echo $id?>&type=author"><img src="/images/html/news/tar1.gif"></a>
					</div>
					<div class=list1>
					<ul>
						<?php for($i=0;$i<count($record);$i++){?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo $record[$i]->title;?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
				</div>
				<div class="dash"></div>
				<?php
						}
					}
				?>
				<?php
					if($news->related_news!=''){
						$record = $db->query("select id,title,short_title from fb_news where id in({$news->related_news})");
				?>
				<div class=right-div1>
					<div id=right-title1>
					<div class=tar></div>推荐的 评论文章
					</div>
					<div class=tar1>
						<a href="news_list.php?news_id=<?php echo $id?>&type=related"><img src="/images/html/news/tar1.gif"></a>
					</div>
					<div class=list2>
					<ul>
						<?php for($i=0;$i<count($record);$i++){?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo $record[$i]->title;?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
				</div>
				<?php }?>
				<?php
					$record = $db->query("select id,title,short_title from fb_news where keywords like '%{$news->keywords}%' and id!=$id");
					if(count($record)>0){
				?>
				<div class=right-div1>
					<div id=right-title2>
					<div class=tar></div>关键字"<?php echo $news->keywords;?>"的评论文章
					</div>
					<div class=tar1>
						<a href="news_list.php?news_id=<?php echo $id?>&type=keywords"><img src="/images/html/news/tar1.gif"></a>
					</div>
					<div class=list2>
					<ul>
						<?php for($i=0;$i<count($record);$i++){?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo $record[$i]->title;?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
				</div>
				<?php }?>
		  </div>
			<div id=center-right>
				<div id=ad></div>
				<div class=left-div>
					<div id="left_title">
						<div style="background:url(/images/html/news/background1.jpg);" name="favor" class="left_top_title">最受欢迎</div><div style="margin-left:1px;" name="comm" class="left_top_title">编辑推荐</div>
					</div>
					<div id="favor" class="list left_top">
					<ul>
						<?php
							$record = $db->query("select t1.id,t1.title,t1.short_title from fb_news t1 join fb_category t2 on t1.category_id=t2.id where t2.name='最受欢迎' and t1.is_adopt=1 order by t1.priority asc,t1.created_at desc limit 7");
							for($i=0;$i<count($record);$i++){
						?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo $record[$i]->title;?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
					<div id="comm" style="display:none;" class="list left_top">
					<ul>
						<?php
							$record = $db->query("select t1.id,t1.title,t1.short_title from fb_news t1 join fb_category t2 on t1.category_id=t2.id where t2.name='编辑推荐' and t1.is_adopt=1 order by t1.priority asc,t1.created_at desc limit 7");
							for($i=0;$i<count($record);$i++){
						?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo $record[$i]->title;?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
				</div>
				<div class=left-div>
					<div id="left_title2">
						<div class="left_bottom_title" name="create" style="background:url(/images/html/news/background2.jpg);">创业</div><div name="ology" class="left_bottom_title">科技</div><div name="business" class="left_bottom_title">商业</div><div name="invest" class="left_bottom_title">投资</div>
					</div>
					<div id="create" class="list left_bottom">
					<ul>
						<?php
							$record = $db->query("select id,title,short_title from fb_news where is_adopt=1 and category_id in (select t1.id from fb_category t1 join fb_category t2 on t1.sort_id=t2.id where t2.name='创业') order by priority asc,created_at desc limit 7");
							for($i=0;$i<count($record);$i++){
						?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo $record[$i]->title;?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
					<div id="ology" style="display:none;" class="list left_bottom">
					<ul>
						<?php
							$record = $db->query("select id,title,short_title from fb_news where is_adopt=1 and category_id in (select t1.id from fb_category t1 join fb_category t2 on t1.sort_id=t2.id where t2.name='商业') order by priority asc,created_at desc limit 7");
							for($i=0;$i<count($record);$i++){
						?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo $record[$i]->title;?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
						<?php }?>
					</ul>
					</div>
					<div id="business" style="display:none;" class="list left_bottom">
					<ul>
						<?php
							$record = $db->query("select id,title,short_title from fb_news where is_adopt=1 and category_id in (select t1.id from fb_category t1 join fb_category t2 on t1.sort_id=t2.id where t2.name='科技') order by priority asc,created_at desc limit 7");
							for($i=0;$i<count($record);$i++){
						?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo $record[$i]->title;?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
					<div id="invest" style="display:none;" class="list left_bottom">
					<ul>
						<?php
							$record = $db->query("select id,title,short_title from fb_news where is_adopt=1 and category_id in (select t1.id from fb_category t1 join fb_category t2 on t1.sort_id=t2.id where t2.name='投资') order by priority asc,created_at desc limit 7");
							for($i=0;$i<count($record);$i++){
						?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo $record[$i]->title;?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
				</div>
				<div id=left-div1>
					<div class=left-title7>行业富豪</div>
					<div class=left-div2>
						<div class=div1-1>
							<div id=picture1></div>
							<div class=picture1-right>
						  <div class=tar3></div><b> 杨惠妍</b> 女 33岁<br/>
						  <a href="" class="nor1"> 鸿桂园</a> <font color="#999999">(房地产)</font><br/>
						  年度排名:<font color="#fc030b"><b>7</b></font> 今日排名:<font color="#fc030b"><b>9</b></font><br/>
						  个人财富:150亿<font color="#999999">(截止日期:2010-1-22)</font>
						  </div>
						</div>
						<div class=div1-1>
							<div id=picture2></div>
							<div class=picture1-right>
						  <div class=tar3></div><b> 杨惠妍</b> 女 33岁<br/>
						  <a href="" class="nor1"> 鸿桂园</a> <font color="#999999">(房地产)</font><br/>
						  年度排名:<font color="#fc030b"><b>7</b></font> 今日排名:<font color="#fc030b"><b>9</b></font><br/>
						  个人财富:150亿<font color="#999999">(截止日期:2010-1-22)</font>
						  </div>
						</div>
						<div id=div1-2>
							<div id=picture3></div>
							<div class=picture1-right>
						  <div class=tar3></div><b> 杨惠妍</b> 女 33岁<br/>
						  <a href="" class="nor1"> 鸿桂园</a> <font color="#999999">(房地产)</font><br/>
						  年度排名:<font color="#fc030b"><b>7</b></font> 今日排名:<font color="#fc030b"><b>9</b></font><br/>
						  个人财富:150亿<font color="#999999">(截止日期:2010-1-22)</font>
						  </div>
						</div>
					</div>
					<div id=left-div1>
					<div class=left-title7>福布斯杂志</div>
					<div class=left-div2>
						<div id=div2-1>
							<div id=picture4></div>
							<div id=div2-2 style="font-size:13px;">
							<b><font color="#3f3e78">福布斯2010/1</font></b><br/>
							<li>后危机时代更</li>
							<li>郎情带跟郎情带跟郎情带跟郎情带跟</li>
							</div>
						</div>
						<div id=div2-3>
							<font color="#0c78d0"><b>往期杂志查阅</b></font><br/>
							<select style="width:100px;"></select> <select style="width:80px;margin-left:30px;"></select><br/>
							<div id=button1><input type="button" id="button2"><input type="button" id="button3"><br/></div>
							<div align="right"><a href="" class="nor"><b>查看杂志列表>></b></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>
<html>