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