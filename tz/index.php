<?php 
	session_start();
	require_once('../frame.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯-投资首页</title>
	<?php
		use_jquery();
		js_include_tag('select2css');
		css_include_tag('tz','top','bottom');
	?>
</head>
<body>
	<div id=ibody>
	<? require_once('../inc/top.inc.php');?>
		<div id=cyindex></div>
		<div id=cytitle><a style="color:#666666;" href="">福布斯中文网　＞　<a href="#">投资首页</a></div>
		<div id=cyline></div>
		<?php 
			$db=get_db();
			$cate=$db->query('select * from fb_position where name="投资首页头条"');
			if($cate[0]->type=="category")
			{
				$news=$db->query('select photo_src,title,short_title,description,id from fb_news where category_id='.$cate[0]->category_id.' and is_adopt=1 order by priority asc,created_at desc limit '.$cate[0]->position_limit);
			}
			else if($cate[0]->type="news")
			{
				$news=$db->query('select n.photo_src,n.title,n.short_title,n.description,n.id from fb_news n inner join fb_position_relation r on n.id=r.news_id where r.position_id='.$cate[0]->id.' and n.is_adopt=1 order by r.priority asc, n.created_at desc limit '.$cate[0]->position_limit);	
			}
		?>
		<div id=tz_left>
			<div id=tz_l_t_title><a href="/news/news.php?id=<?php echo $news[0]->id; ?>"><?php echo $news[0]->title;?></a></div>
			<div id=tz_l_t_pic>
				<a href="/news/news.php?id=<?php echo $news[0]->id; ?>"><img border=0 src="<?php echo $news[0]->photo_src;?>"></a>	
			</div>
			<div id=tz_l_t_r>
				<div id=tz_l_t_r_t><a href="/news/news.php?id=<?php echo $news[0]->id; ?>"><?php echo get_fck_content($news[0]->description);?></a></div>
				<div id=tz_l_t_r_b><a href="/news/news.php?id=<?php echo $news[1]->id; ?>">·<?php echo $news[1]->short_title; ?></a>　<a href="/news/news.php?id=<?php echo $news[2]->id; ?>">·<?php echo $news[2]->short_title; ?></a><br>
					<a href="/news/news.php?id=<?php echo $news[3]->id; ?>">·<?php echo $news[3]->short_title; ?></a>　<a href="/news/news.php?id=<?php echo $news[4]->id; ?>">·<?php echo $news[4]->short_title; ?></a></div>
			</div>
			<?php 
				$cate=$db->query('select * from fb_position where name="投资首页投资文章"');
				if($cate[0]->type=="category")
				{
					$news=$db->query('select title,short_title,description,id from fb_news where category_id='.$cate[0]->category_id.' and is_adopt=1 order by priority asc,created_at desc limit '.$cate[0]->position_limit);
				}
				else if($cate[0]->type="news")
				{
					$news=$db->query('select n.title,n.short_title,n.description,n.id from fb_news n inner join fb_position_relation r on n.id=r.news_id where r.position_id='.$cate[0]->id.' and n.is_adopt=1 order by r.priority asc, n.created_at desc limit '.$cate[0]->position_limit);	
				}	
			?>
			<div id=tz_l_b_l>
				<div class=l_b_l_title>
					<div class=pic></div>
					<div class=wz>投资文章</div>
					<div class=l_b_sx>|</div>
					<div class=more><a href="/news/news_list.php?cid=<?php echo $category[0]->category_id; ?>"><img border=0 src="/images/index/more.jpg"></a></div>
				</div>
				<?php 
				for($i=0;$i<count($news);$i++){ ?>
					<div class=tz_l_b_l_t_title><a href=""><?php echo $news[$i]->title; ?></a></div>
					<div class=tz_l_b_l_t_content><a href=""><?php echo get_fck_content($news[$i]->description); ?></a></div>
				<?php } 
				$cate=$db->query('select * from fb_position where name="投资首页文章"');
				if($cate[0]->type=="category")
				{
					$news=$db->query('select title,short_title,description,id from fb_news where category_id='.$cate[0]->category_id.' and is_adopt=1 order by priority asc,created_at desc limit '.$cate[0]->position_limit);
				}
				else if($cate[0]->type="news")
				{
					$news=$db->query('select n.title,n.short_title,n.description,n.id from fb_news n inner join fb_position_relation r on n.id=r.news_id where r.position_id='.$cate[0]->id.' and n.is_adopt=1 order by r.priority asc, n.created_at desc limit '.$cate[0]->position_limit);	
				}	?>
				<div class=l_b_l_title>
					<div class=pic></div>
					<div class=wz>文章</div>
					<div class=l_b_sx>|</div>
					<div class=more><a href="/news/news_list.php?cid=<?php echo $cate[0]->category_id; ?>"><img border=0 src="/images/index/more.jpg"></a></div>
				</div>
				<?php 
		 		 for($i=0;$i<count($news);$i++){ ?>
					<div class=tz_l_b_l_b_content><a href="/news/news.php?id=<?php echo $news[$i]->id; ?>">·<?php echo $news[$i]->short_title; ?></a></div>
				<?php } ?>
			</div>
			<div id=tz_l_dash></div>
			<div id=tz_l_b_r>
				<?php $cate=$db->query('select * from fb_position where name="投资首页文章"');
				if($cate[0]->type=="category")
				{
					$news=$db->query('select photo_src,title,short_title,description,id from fb_news where category_id='.$cate[0]->category_id.' and is_adopt=1 order by priority asc,created_at desc limit '.$cate[0]->position_limit);
				}
				else if($cate[0]->type="news")
				{
					$news=$db->query('select n.photo_src n.title,n.short_title,n.description,n.id from fb_news n inner join fb_position_relation r on n.id=r.news_id where r.position_id='.$cate[0]->id.' and n.is_adopt=1 order by r.priority asc, n.created_at desc limit '.$cate[0]->position_limit);	
				}	
				
				?>
				<div class=l_b_l_title>
					<div class=pic></div>
					<div class=wz>投资专题</div>
					<div class=l_b_sx>|</div>
					<div class=more><a href="/news/news_list.php?cid=<?php echo $cate[0]->category_id; ?>"><img border=0 src="/images/index/more.jpg"></a></div>
				</div>
				<div class="tz_l_b_r_content">
					<div class=tz_l_b_r_pic><a href="/news/news.php?id=<?php echo $news[0]->id; ?>"><img border=0 src="<?php echo $news[0]->photo_src; ?>"></a></div>
					<div class=tz_l_b_r_pictitle><a href="/news/news.php?id=<?php echo $news[0]->id; ?>"><?php echo $news[0]->title; ?></a></div>
					<div class=tz_l_b_r_piccontent><a href="/news/news.php?id=<?php echo $news[0]->id; ?>"><?php echo get_fck_content($news[0]->description); ?></a></div>
				</div>
				<div class="tz_l_b_r_content">
					<div class=tz_l_b_r_pic><a href="/news/news.php?id=<?php echo $news[1]->id; ?>"><img border=0 src="<?php echo $news[1]->photo_src; ?>"></a></div>
					<div class=tz_l_b_r_pictitle><a href="/news/news.php?id=<?php echo $news[1]->id; ?>"><?php echo $news[1]->title; ?></a></div>
					<div class=tz_l_b_r_piccontent><a href="/news/news.php?id=<?php echo $news[1]->id; ?>"><?php echo get_fck_content($news[1]->description); ?></a></div>
				</div>
				<?php for($i=2;$i<count($news);$i++){ ?>
					<div class=tz_l_b_l_b_content><a href="/news/news.php?id=<?php echo $news[$i]->id; ?>">·<?php echo $news[$i]->short_title; ?></a></div>
				<?php } 
				$cate=$db->query('select * from fb_position where name="投资首页投资专栏"');
				if($cate[0]->type=="category")
				{
					$news=$db->query('select photo_src,title,short_title,description,id from fb_news where category_id='.$cate[0]->category_id.' and is_adopt=1 order by priority asc,created_at desc limit '.$cate[0]->position_limit);
				}
				else if($cate[0]->type="news")
				{
					$news=$db->query('select n.photo_src, n.title,n.short_title,n.description,n.id from fb_news n inner join fb_position_relation r on n.id=r.news_id where r.position_id='.$cate[0]->id.' and n.is_adopt=1 order by r.priority asc, n.created_at desc limit '.$cate[0]->position_limit);	
				}	?>
				<div class=l_b_l_title style="margin-bottom:5px;">
					<div class=pic></div>
					<div class=wz>投资专栏</div>
					<div class=l_b_sx>|</div>
					<div class=more><a href="/news/news_list.php?cid=<?php echo $cate[0]->category_id; ?>"><img border=0 src="/images/index/more.jpg"></a></div>
				</div>
				<?php for($i=0;$i<count($news);$i++){ ?>
				<div class=tz_l_b_r_b>
					<a href="/news/news.php?id=<?php echo $news[$i]->id; ?>"><span style="color:#003899; font-size:14px; font-weight:bold;"><?php echo $news[$i]->title; ?></span><br><?php get_fck_content($news[$i]->description); ?></a>	
				</div>
				<div class=tz_l_b_r_b_zl>——<?php echo $news[$i]->author; ?>专栏</div>
				<?php } ?>
			</div>
		</div>
		<div id=right>
			<a style="margin:0px; float:right; display:inline;" href=""><img border=0 width=317 height=265 src="/images/right/one.jpg"></a>
			<div id=r_t_title>
				<div id=wz>投资榜单</div>
				<div id=more><a href=""><img border=0 src="/images/index/c_r_t_more.gif"></a></div>	
			</div>
			<div id=r_t_l></div>
			<div id=r_t_c>
				<?php for($i=0; $i<4; $i++){ ?>
					<div class=content><a href="">·2009年度中国最佳投资企业榜单查看详细</a></div>
				<?php } ?>
			</div>
			<div id=r_t_r></div>
			<div id=r_title>
				<div class=title1>最受欢迎</div><div class=title2>编辑推荐</div>
			</div>
			<div id=r_content_left></div>
			<div id=r_content>
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
				<div class=content>
					<div class=images></div>
					<div class=context><a href="">沪二价空间空间升至升至10%沪价空升至10%</a></div>
				</div>
				
			</div>
			<div id=r_content_right></div>
			<div id=r_c_title>投资活动</div>
			<div id=r_c_l></div>
			<div id=r_c_c>
				<div class=content>
					<div class=pic><a href=""><img border=0 src="/images/tz/three.jpg"></a></div>
					<div class=pictitle><a href="">希腊总理：我们没有向<br>中国寻求援助</a></div>
				</div>
				<div class=content>
					<div class=pic><a href=""><img border=0 src="/images/tz/three.jpg"></a></div>
					<div class=pictitle><a href="">希腊总理：我们没有向<br>中国寻求援助</a></div>
				</div>
			</div>
			<div id=r_c_r></div>
			<div id=hy_r_b_title>
				<div id=wz>福布斯精华文章定制</div>	
			</div>
			<div id=hy_r_b_left></div>
			<div id=hy_r_b_center>
				<div id=content>
					<div id=content_t>
						<div id=content_t_l>
							订阅福布斯快闻　<input type="radio"><span style="font-size:12px; font-weight:normal; color:#666666;">我要定制</span>	
						</div>
						<div id=content_t_r>
							<button>定制</button>	
						</div>	
					</div>
					<div id=content_b>
						<div id=content_b_l>
							<span style="font-size:14px; color:#11579e; font-weight:bold;">订阅分类文章</span>
							<div class=cl><input type="radio">富豪　<input type="radio">创业　<input type="radio">商业</div>
							<div class=cl><input type="radio">投资　<input type="radio">生活</div>
						</div>
						<div id=content_b_r>
							<button>定制</button>	
						</div>	
					</div>	
				</div>	
			</div>
			<div id=hy_r_b_right></div>
		</div>
		<? require_once('../inc/bottom.inc.php');?>
		</div>
	</body>
</html>