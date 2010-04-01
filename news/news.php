﻿<?php 
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
	<title><?php echo strip_tags($news->short_title);?>-福布斯中文网</title>
	<meta name="Keywords" content="<?php echo strip_tags($news->keywords);?>"/>
	<meta name="Description" content="<?php echo strip_tags($news->description);?>"/>
	<?php
		use_jquery();
		js_include_tag('news/news','public','right');
		css_include_tag('public','html/news/news','paginate','right_inc');
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
				<a href="news_list.php?cid=<?php echo $parent_ids[$i];?>"><?php echo $item->name;?></a> > 
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

						<div class="top_title"><img id="font_down" src="/images/html/news/font3.gif"><span class="top_span"><a>字体大小</a></span><img id="font_up" src="/images/html/news/font2.gif"></div>

						<div style="border-right:0" class="top_title2">
							<?php if($news->pdf_src!=''){?>
							<img src="/images/html/news/coin1.gif">
							<span class="top_span">
							<a target="_blank" href="<?php echo $news->pdf_src;?>" class="top_n">下载PDF格式</a>
							</span>
							<?php }?>
							<img style="margin-left:20px;" src="/images/html/news/coin2.gif"><span class="top_span"><a href="<?php echo $news->id;?>" class="top_n" id="a_collect">加入收藏</a></span>
						</div>
					</div>
				</div>
				<div id="news_text">
					<div id="left_box">
						<div id="l_b_center">
							<div id="resource">来源于：福布斯中文网</div>
							<?php if($news->top_info!=''){?>
								<div id="text4"><?php echo $news->top_info;?></div>
							<?php }?>
							<?php
								if($news->author!=''){
									$record = $db->query("select id,short_title,title from fb_news where author='{$news->author}' and id!=$id limit 3");
									if(count($record)>0){
							?>
							<div class=right-div3>
								<div class=right-title3>
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
									<div class=right-title3>
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
											$keywords2 = explode('　',$news->keywords);
											if(count($keywords)>count($keywords2)){
												for($i=0;$i<count($keywords);$i++){
													if($i!=0&&$keywords[$i]!='')echo '、';
										?>
										<a href="news_list.php?keyword=<?php echo urlencode($keywords[$i]);?>"><?php echo $keywords[$i];?></a>
										<?php
												}
											}else{
												for($i=0;$i<count($keywords2);$i++){
												if($i!=0&&$keywords2[$i]!='')echo '、';
										?>
										<a href="news_list.php?keyword=<?php echo urlencode($keywords2[$i]);?>"><?php echo $keywords2[$i];?></a>
										<?php
												}
											}
										?>	
									</div>
									<div id="keyword_bottom">
										<div style="margin-left:0;" class=right-title3>
											文章的关键字：
										</div>
									</div>
								</div>
						</div>
					</div>
					<?php if($news->ad_id){?>
					<div id="roll"></div>
					<div id="picture6"><img src="/images/html/news/picture6.jpg"></div>
					<?php }?>
					<div id=text3>
						<?php echo get_fck_content($content);?>
					</div>
					<div id="paginate">
						<?php print_fck_pages2($content);?>
					</div>
				</div>
				<div class="dash"></div>
				<div id="news_comment"></div>
		  	</div>
		  	<div id="right_inc">
		  		<?php include "../right/ad.php";?>
		  		<?php include "../right/favor.php";?>
		  		<?php include "../right/four.php";?>
		  		<?php include "../right/rich.php";?>
		  		<?php include "../right/magazine.php";?>
		  	</div>
		  	<input type="hidden" value="<?php echo $id;?>" id="newsid"></input>
		</div>
	</div>
</body>
<html>