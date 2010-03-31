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