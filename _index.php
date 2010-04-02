<? 
		$catename=$db->query('SELECT name FROM fb_category where id='.$cid); ?>
		<div id=bread><a href="#"><?php echo $catename[0]->name; ?></div>
		<div id=bread_line></div>
		<?php
			$news = get_news_by_pos($catename[0]->name.'首页头条');
		?>
		<div id=l>
			<div id=common_head_title><a href="/news/news.php?id=<?php echo $news[0]->news_id; ?>"><?php echo $news[0]->title;?></a></div>
			<div id=common_head_title_pic>
				<a href="/news/news.php?id=<?php echo $news[0]->news_id; ?>"><img border=0 src="<?php echo $news[0]->photo_src;?>"></a>	
			</div>
			<div id=common_head_r>
				<div id=common_head_description><a href="/news/news.php?id=<?php echo $news[0]->news_id; ?>"><?php echo strip_tags($news[0]->description);?></a></div>
				<div id=common_head_list>
					<?php for($i=1; $i<count($news);$i++){ ?>
						<div class=common_head_list><a href="/news/news.php?id=<?php echo $news[$i]->news_id; ?>"><?php echo $news[$i]->short_title; ?></a></div>
					<?php } ?>
				</div>
			</div>
			
			
			<div class=common_box>
				<?php $news = get_news_by_pos($catename[0]->name.'首页'.$catename[0]->name.'文章');	?>
				<div class=caption>
					<div class=captions><?php echo $catename[0]->name; ?>文章</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				<?php for($i=0;$i<count($news);$i++){ ?>
					<div class=common_article_lis1><a href="/news/news.php?id=<?php echo $news[$i]->news_id; ?>"><?php echo $news[$i]->title; ?></a></div>
					<div class=common_article_description1><a href="/news/news.php?id=<?php echo $news[$i]->news_id; ?>"><?php echo strip_tags($news[$i]->description); ?></a></div>
				<? }?>
				
	
				<?php	$news = get_news_by_pos($catename[0]->name.'首页文章');	?>
				<div class=caption>
					<div class=captions style="width:30px;">文章</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				<?php  for($i=0;$i<count($news);$i++){ ?>
					<div class=common_article_lis2><a href="/news/news.php?id=<?php echo $news[$i]->news_id; ?>"><?php echo $news[$i]->short_title; ?></a></div>
				<?php } ?>
			</div>
			
			<div id=common_dash></div>
			
			<div class=common_box2 >
				<?php 
					$news = get_news_by_pos($catename[0]->name.'首页'.$catename[0]->name.'专题');
				?>
				<div class=caption>
					<div class=captions><?php echo $catename[0]->name; ?>专题</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				
				<div class=common_subject>
					<div class=common_subject_pic><a href="/news/news.php?id=<?php echo $news[0]->news_id; ?>"><img border=0 src="<?php echo $news[0]->photo_src; ?>"></a></div>
					<div class=common_subject_list><a href="/news/news.php?id=<?php echo $news[0]->news_id; ?>"><?php echo $news[0]->title; ?></a></div>
					<div class=common_subject_description><a href="/news/news.php?id=<?php echo $news[0]->news_id; ?>"><?php echo strip_tags($news[0]->description); ?></a></div>
				</div>
				<div class=common_subject>
					<div class=common_subject_pic><a href="/news/news.php?id=<?php echo $news[1]->news_id; ?>"><img border=0 src="<?php echo $news[1]->photo_src; ?>"></a></div>
					<div class=common_subject_list><a href="/news/news.php?id=<?php echo $news[1]->news_id; ?>"><?php echo $news[1]->title; ?></a></div>
					<div class=common_subject_description><a href="/news/news.php?id=<?php echo $news[1]->news_id; ?>"><?php echo strip_tags($news[1]->description); ?></a></div>
				</div>
				
				<?php for($i=2;$i<count($news);$i++){ ?>
					<div class=common_article_lis2><a href="/news/news.php?id=<?php echo $news[$i]->news_id; ?>"><?php echo $news[$i]->short_title; ?></a></div>
				<?php }?>
				
				<? $news = get_news_by_pos($catename[0]->name.'首页'.$catename[0]->name.'专栏');	?>
				<div class=caption style="margin-top:20px;">
					<div class=captions><?php echo $catename[0]->name; ?>专栏</div>
					<div class=line>|</div>
					<a href="" class=more></a>
				</div>
				<?php for($i=0;$i<count($news);$i++){ ?>
				<div class=common_list3><a href="/news/news.php?id=<?php echo $news[$i]->news_id; ?>"><?php echo $news[$i]->short_title; ?></a></div>
				<div class=common_description3><?php echo strip_tags($news[$i]->description); ?></div>
				<div class=common_writer>——<?php echo $news[$i]->author; ?>专栏</div>
				<?php } ?>
			</div>
		</div>
		
		
		<div id=right>
				<div id="right_inc" style="margin-top:10px;">
		  		<?php include "../right/ad.php";?>
		  		<?php include "../right/investment_list.php"?>
		  		<?php include "../right/favor.php"?>
		  		<?php include "../right/activities.php"?>
		  		<?php include "../right/article.php";?>
		  		
		  		
		 	</div>
			
		</div>
