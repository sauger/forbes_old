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