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
	<title>福布斯-新闻</title>
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
				<span style="color:#246BB0;"><?php echo strip_tags($news->short_title);?></span>
			</div>
			<div id=line></div>
		</div>
		<div id=news_content>
			<div id=center-left>
				<div id=title3>
					<div id="news_title">
					<?php echo $title;?>
					</div>
					<div id="top_info">记者：<?php echo $news->author;?>　　发布于：<?php echo substr($news->created_at,0,10);?></div>
					<div id=title2>
						<?php if(isset($english_news)){?>
							<div style="border-left:0" class="top_title"><img src="/images/html/news/zw.gif"><span class="top_span"><a href="news.php?id=<?php echo $id?>">正文</a></span></div>
							<div class="top_title"><img src="/images/html/news/ew.gif"><span class="top_span">English</span></div>
						<?php }else{?>
							<div style="border-left:0" class="top_title"><img src="/images/html/news/zw.gif"><span class="top_span">正文</span></div>
							<?php if(isset($english_id)){?>
							<div class="top_title"><img src="/images/html/news/ew.gif"><span class="top_span"><a href="news.php?id=<?php echo $id?>&lang=en">English</a></span></div>
							<?php }?>
						<?php }?>
						<div class="top_title"><img src="/images/html/news/fx.gif"><span class="top_span"><a href="">分享</a></span></div>
						<div class="top_title"><img src="/images/html/news/dy.gif"><span class="top_span"><a href="">打印</a></span></div>
<<<<<<< HEAD:news/news.php
						<div class="top_title"><img id="font_down" src="/images/html/news/font1.gif"><span class="top_span"><a href="">字体大小</a></span><img id="font_up" src="/images/html/news/font2.gif"></div>
=======
						<div class="top_title"><img id="font_down" src="/images/html/news/font3.gif"><span class="top_span"><a>字体大小</a></span><img id="font_up" src="/images/html/news/font2.gif"></div>
>>>>>>> d4009668675ad066c0503391cb684da16a76907e:news/news.php
						<div style="border-right:0" class="top_title">
							<?php if($news->pdf_src){?>
							<img src="/images/html/news/coin1.gif">
							<span class="top_span">
							<a target="_blank" href="<?php echo $news->pdf_src;?>" class="top_n">下载PDF格式</a>
							</span>
							<?php }?>
<<<<<<< HEAD:news/news.php
							<img style="margin-left:10px;" src="/images/html/news/coin2.gif"><span class="top_span"><a href="<?php echo $news->id;?>" class="top_n" id="a_collect">加入收藏</a></span>
=======
							<img style="margin-left:20px;" src="/images/html/news/coin2.gif"><span class="top_span"><a href="<?php echo $news->id;?>" class="top_n" id="a_collect">加入收藏</a></span>
>>>>>>> d4009668675ad066c0503391cb684da16a76907e:news/news.php
						</div>
					</div>
				</div>
				<div id="news_text">
					<div id="left_box">
						<div id="l_b_center">
							<div id="resource">来源于：福布斯中文网</div>
							<?php if($news->top_info!=''){?>
								<div id=text4>
									<?php echo $news->top_info?>
								</div>
							<?php }?>
							<?php
								if($news->author!=''){
									$record = $db->query("select id,short_title,title from fb_news where author='{$news->author}' and id!=$id limit 3");
									if(count($record)>0){
							?>
							<div id=right-div3>
								<div id=right-title3>
									该作者的其他文章
								</div>
								<div class=tar1>
									<a href="news_list.php?news_id=<?php echo $id?>&type=author"><img src="/images/html/news/tar1.gif"></a>
								</div>
								<div class=list1>
								<ul>
									<?php for($i=0;$i<count($record);$i++){?>
									<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
									<?php }?>
								</ul>
								</div>
							</div>
							<?php
									}
								}
							?>
								<?php
									if($news->related_news!=''){
										$record = $db->query("select id,title,short_title from fb_news where id in({$news->related_news})");
								?>
								<div class=right-div3>
									<div id=right-title3>
									推荐的 评论文章
									</div>
									<div class=tar1>
										<a href="news_list.php?news_id=<?php echo $id?>&type=related"><img src="/images/html/news/tar1.gif"></a>
									</div>
									<div class=list1>
									<ul>
										<?php for($i=0;$i<count($record);$i++){?>
										<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
										<?php }?>
									</ul>
									</div>
								</div>
								<?php }?>
								<div class="dash2"></div>
								<div class=right-div3>
									<div class=keywords>
										<?php 
											$keywords = explode(' ',$news->keywords);
											for($i=0;$i<count($keywords);$i++){
												if($i!=0)echo '、';
										?>
										<a href="news_list.php?keyword=<?php echo urlencode($keywords[$i]);?>"><?php echo $keywords[$i];?></a>
										<?php
											}
										?>
									</div>
									<div id="keyword_bottom">
										<div style="margin-left:0;" id=right-title3>
											文章的关键字：
										</div>
									</div>
								</div>
						</div>
					</div>
					<div id="roll"></div>
					<div id="picture6"><img src="/images/html/news/picture6.jpg"></div>
					<div id=text3>
						<?php echo get_fck_content($content);?>
					</div>
					<div id="paginate"><?php print_fck_pages($content);?></div>
				</div>
				<div class="dash"></div>
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
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
					<div id="comm" style="display:none;" class="list left_top">
					<ul>
						<?php
							$record = $db->query("select t1.id,t1.title,t1.short_title from fb_news t1 join fb_category t2 on t1.category_id=t2.id where t2.name='编辑推荐' and t1.is_adopt=1 order by t1.priority asc,t1.created_at desc limit 7");
							for($i=0;$i<count($record);$i++){
						?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
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
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo  strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
					<div id="ology" style="display:none;" class="list left_bottom">
					<ul>
						<?php
							$record = $db->query("select id,title,short_title from fb_news where is_adopt=1 and category_id in (select t1.id from fb_category t1 join fb_category t2 on t1.sort_id=t2.id where t2.name='商业') order by priority asc,created_at desc limit 7");
							for($i=0;$i<count($record);$i++){
						?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
						<?php }?>
					</ul>
					</div>
					<div id="business" style="display:none;" class="list left_bottom">
					<ul>
						<?php
							$record = $db->query("select id,title,short_title from fb_news where is_adopt=1 and category_id in (select t1.id from fb_category t1 join fb_category t2 on t1.sort_id=t2.id where t2.name='科技') order by priority asc,created_at desc limit 7");
							for($i=0;$i<count($record);$i++){
						?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
					</div>
					<div id="invest" style="display:none;" class="list left_bottom">
					<ul>
						<?php
							$record = $db->query("select id,title,short_title from fb_news where is_adopt=1 and category_id in (select t1.id from fb_category t1 join fb_category t2 on t1.sort_id=t2.id where t2.name='投资') order by priority asc,created_at desc limit 7");
							for($i=0;$i<count($record);$i++){
						?>
						<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>	
						<?php }?>
					</ul>
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
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>
<html>