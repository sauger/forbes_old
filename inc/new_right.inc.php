<?php
	require_once('../frame.php');
	$db= get_db();
	use_jquery();
	js_include_tag('right');
	css_include_tag('right_inc');
?>
<div id="right_inc">
	<div id="right_ad"><img border=0 width=317 height=265 src="/images/right/one.jpg"></div>
	<div id="r_t_title">
		<div id=wz>投资榜单</div>
		<div id=more><a href=""><img border=0 src="/images/right/c_r_t_more.gif"></a></div>	
	</div>
	<div id=r_t_l></div>
	<div id=r_t_c>
		<?php
			$record = get_news_by_pos('投资榜单','公共右侧');
			for($i=0;$i<count($record);$i++){
		?>
			<div class=content><li><a href=""><?php echo $record[$i]->name;?></a></li></div>
		<?php } ?>
	</div>
	<div id=r_t_r></div>
	<div class="left_title">
		<div style="background:url(/images/right/background1.jpg); color:#000000;" name="favor" class="left_top_title article_list">最受欢迎</div>
		<div style="margin-left:1px;" name="comm" class="left_top_title article_list">编辑推荐</div>
	</div>
	<div id="favor" class="right_box left_top">
		<ul>
			<?php
			$record = get_news_by_pos('最受欢迎','公共右侧');
			for($i=0;$i<count($record);$i++){
			?>
			<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
			<?php }?>
		</ul>
	</div>
	<div id="comm" style="display:none;" class="right_box left_top">
		<ul>
			<?php
			$record = get_news_by_pos('编辑推荐','公共右侧');
			for($i=0;$i<count($record);$i++){
			?>
			<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
			<?php }?>
		</ul>
	</div>
	<div class="bottom_line"></div>
	<div class="left_div">
		<div id="left_title2">
			<div class="left_bottom_title" name="create" style="background:url(/images/right/background2.jpg); color:#000000;">创业</div>
			<div name="ology" class="left_bottom_title">科技</div>
			<div name="business" class="left_bottom_title">商业</div>
			<div name="invest" class="left_bottom_title">投资</div>
		</div>
		<div id="create" class="list left_bottom">
			<ul>
				<?php
				$record = get_news_by_pos('创业','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
		<div id="ology" style="display:none;" class="list left_bottom">
			<ul>
				<?php
				$record = get_news_by_pos('科技','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
		<div id="business" style="display:none;" class="list left_bottom">
			<ul>
				<?php
				$record = get_news_by_pos('商业','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
		<div id="invest" style="display:none;" class="list left_bottom">
			<ul>
				<?php
				$record = get_news_by_pos('投资','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
	</div>
	
	<div id=r_c_title>投资活动</div>
	<div id=r_c_l></div>
	<div id=r_c_c>
		<?php
			$record = get_news_by_pos('投资活动','公共右侧');
			for($i=0;$i<count($record);$i++){
		?>
		<div class=content>
			<div class=pic><a href="/news/news.php?id=<?php echo $record[$i]->news_id;?>"><img border=0 src="<?php echo $record[$i]->video_photo_src;?>"></a></div>
			<div class=pictitle><a href="/news/news.php?id=<?php echo $record[$i]->news_id;?>"><?php echo $record[$i]->short_title;?></a></div>
		</div>
		<?php }?>
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
	
	<?php
		$industry_id = "1";
		$sql  = "select t1.* from fb_rich t1 join fb_rich_company t2 on t1.id=t2.rich_id where t2.company_id in(select group_concat(company_id separator ',') from fb_company_industry where industry_id=$industry_id)";
		$rich = $db->query($sql);
		if($db->record_count>0){
	?>
	<div id="r_t_title">
		<div id=wz>行业富豪</div>
	</div>
	<div class="right_box">
		<?php
			for($i=0;$i<count($rich);$i++){
				$money = $db->query("select * from fb_rich_fortune where rich_id={$rich[$i]->id} order by fortune_year desc limit 1");
				$company = $db->query("select t2.name,t2.id from fb_rich_company t1 join fb_company t2 on t1.company_id=t2.id where t1.rich_id={$rich[$i]->id}");
				$com_count = count($company);
				if($db->record_count>0){
					$ind_ids = $company[0]->id;
					if(count($ind_ids)>1){
						for($k=1;$k<count($company);$k++){
							$ind_ids .= ','.$company[$k]->id;
						}
					}
					$industry = $db->query("select t2.id,t2.name from fb_company_industry t1 join fb_industry t2 on t1.industry_id=t2.id where t1.company_id in ({$ind_ids}) group by name");
					$ind_count = count($industry);
				}else{
					$ind_count = 0;
				}
		?>
		<div class="rich_content" <?php if($i==count($rich)-1){?>style="border:0;"<?php }?>>
			<div class="rich_box">
				<div class="rich_pic"><img src="<?php echo $rich[$i]->image;?>" width="70" height="70"></div>
				<div class="rich_info">
					<div class="rich_name"><a href="/rich/rich.php?id=<?php echo $rich[$i]->id;?>"><?php echo $rich[$i]->name;?></a> <?php if($rich[$i]->gender==1)echo '男';elseif($rich[$i]->xb==0)echo '女';?> <?php if($rich[$i]->birthday!='')echo (date('Y')-$rich[$i]->birthday).'岁'?></div>
					<div class="rich_com"><?php for($j=0;$j<$com_count;$j++){if($j!=0)echo ',';?><a class="style1" href="company.php?id=<?php echo $company[$j]->id;?>"><?php echo $company[$j]->name;?></a><?php }?></div>
					<div class="rich_ind">（<?php for($j=0;$j<$ind_count;$j++){if($j!=0)echo ',';?><a class="style2" href="industry.php?id=<?php echo $industry[$j]->id;?>"><?php echo $industry[$j]->name;?></a><?php }?>）</div>
					<div class="rich_rank">
						年度排名：<span class="red"><?php echo $money[0]->fortune_order;?></span>　今日排名：<span class="red"></span><br/>
						个人财富：<?php echo $money[0]->fortune;?>亿
					</div>
				</div>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="bottom_line"></div>
	<?php }?>
	
	<div id="r_t_title">
		<div id=wz>福布斯杂志</div>
		<div id=more><a href="/magazine/"><img border=0 src="/images/right/c_r_t_more.gif"></a></div>	
	</div>
	<div id=mag_content>
			<?php 
				$magazine = $db->query("select * from fb_magazine where is_adopt=1 order by publish_data");
			?>
			<div class=pic><a href="/magazine/"><img border=0 src="<?php echo $magazine[0]->img_src3;?>"></a></div>
			<div class=pictitle><a href="/magazine/magazine.php?id=<?php echo $magazine[0]->id;?>"><?php echo $magazine[0]->name;?></a></div>
			<div class=context><?php echo strip_tags($magazine[0]->description);?></div>	
 			<div id=mag_dash></div>
			<div id=search>往期杂志查阅</div>
			<div id=sel>
				<select></select>
				<select></select>
			</div>
			<button id="btnonline"></button><button id="sq"></button>
			<div id=ck><a href="/magazine/list.php">查看杂志列表>></a></div>

	</div>
	<div class=bottom_line></div>
	
	<div id="r_t_title">
		<div id=wz>专栏文章文类</div>
	</div>
	<?php 
		$category = $db->query("select  group_concat(category_id separator ',') as ids from fb_news where author_type=2");
		$cid = explode(',',$category[0]->ids);
		$cid = array_unique($cid);
		$cid = implode(',',$cid);
		if($cid){
			$category = $db->query("select id,name from fb_category where id in($cid)");
			$count = count($category);
		}
	?>
	<div class="right_box">
		<?php 
			for($i=0;$i<$count;$i++){
		?>
		<div class="right_span"><a href="/news/news_list.php?cid=<?php echo $category[$i]->id;?>&type=column"><?php echo $category[$i]->name;?></a></div>
		<?php }?>
	</div>
	<div class=bottom_line></div>
	
	<div class="left_title">
		<div style="background:url(/images/right/background1.jpg); color:#000000;" name="column" class="left_top_title column_list">最受欢迎专栏</div>
		<div style="margin-left:1px;" name="journalist" class="left_top_title column_list">最受欢迎智库专栏</div>
	</div>
	<div id="column" class="right_box left_top">
		<?php
		$pos_id = $db->query("select id from fb_position where name='最受欢迎专栏'");
		$sql = "SELECT t1.id,t1.nick_name,t1.image_src,t1.column_name,t1.description,t3.id as news_id,t3.title FROM fb_position_relation t2 join fb_user t1 on t1.id=t2.news_id join fb_news t3 on t1.id=t3.author_id where t3.is_adopt=1 and t2.position_id={$pos_id[0]->id} group by t1.id order by t2.priority,t3.created_at limit 5";
		$author = $db->query($sql);
		for($i=0;$i<count($author);$i++){
		?>
		<div class="column_box">
			<div class="col_pic">
				<img src="<?php if($author[$i]->image_src!='')echo $author[$i]->image_src;else echo "/images/html/column/picture2.jpg";?>">
			</div>
			<div class="clo_name">
				<?php echo !$author[$i]->column_name?$author[$i]->nick_name:$author[$i]->column_name;?>专栏
			</div>
			<div class="clo_des">
				<?php echo strip_tags($author[$i]->description);?>
			</div>
			<div class="clo_news">
				<a href="/news/news.php?id=<?php echo $author[$i]->news_id;?>"><?php echo strip_tags($author[$i]->title);?></a>
			</div>
		</div>
		<?php }?>
	</div>
	<div id="journalist" style="display:none;" class="right_box left_top">
		<?php
		$pos_id = $db->query("select id from fb_position where name='最受欢迎智库专栏'");
		$sql = "SELECT t1.id,t1.nick_name,t1.image_src,t1.column_name,t1.description,t3.id as news_id,t3.title FROM fb_position_relation t2 join fb_user t1 on t1.id=t2.news_id join fb_news t3 on t1.id=t3.author_id where t3.is_adopt=1 and t2.position_id={$pos_id[0]->id} group by t1.id order by t2.priority,t3.created_at limit 5";
		$author = $db->query($sql);
		for($i=0;$i<count($author);$i++){
		?>
		<div class="column_box">
			<div class="col_pic">
				<img src="<?php if($author[$i]->image_src!='')echo $author[$i]->image_src;else echo "/images/html/column/picture2.jpg";?>">
			</div>
			<div class="clo_name">
				<?php echo !$author[$i]->column_name?$author[$i]->nick_name:$author[$i]->column_name;?>专栏
			</div>
			<div class="clo_des">
				<?php echo strip_tags($author[$i]->description);?>
			</div>
			<div class="clo_news">
				<a href="/news/news.php?id=<?php echo $author[$i]->news_id;?>"><?php echo strip_tags($author[$i]->title);?></a>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="bottom_line"></div>
</div>