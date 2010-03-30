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
		<div id=more><a href=""><img border=0 src="/images/index/c_r_t_more.gif"></a></div>	
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
	<div class="left_div">
		<div id="left_title">
			<div style="background:url(/images/html/news/background1.jpg); color:#000000;" name="favor" class="left_top_title">最受欢迎</div>
			<div style="margin-left:1px;" name="comm" class="left_top_title">编辑推荐</div>
		</div>
		<div id="favor" class="list left_top">
			<ul>
				<?php
				$record = get_news_by_pos('最受欢迎','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
		<div id="comm" style="display:none;" class="list left_top">
			<ul>
				<?php
				$record = get_news_by_pos('编辑推荐','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
	</div>
	<div class="left_div">
		<div id="left_title2">
			<div class="left_bottom_title" name="create" style="background:url(/images/html/news/background2.jpg); color:#000000;">创业</div>
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
	<div id="rich_box">
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
</div>