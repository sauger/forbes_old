<div id="r_t_title">
	<div id=wz><?php echo $catename[0]->name; ?>榜单</div>
	<div id=more><a href=""><img border=0 src="/images/right/c_r_t_more.gif"></a></div>	
</div>
<div id=r_t_l></div>
<div id=r_t_c>
	<?php
		for($i=0;$i<4;$i++){$pos_name = $pos."list".$i;
	?>
		<div class=content <?php show_page_pos($pos_name)?>><li><?php show_page_href($pos_items,$pos_name);?></li></div>
	<?php } ?>
</div>
<div id=r_t_r></div>