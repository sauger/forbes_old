<?php init_page_items();?>
<div id="r_t_title">
	<div id=wz>福布斯论坛</div>
	<div id=more><a href=""><img border=0 src="/images/right/c_r_t_more.gif"></a></div>	
</div>
<div id="forum_box">
	<div class=pic><?php show_page_img($pos_items,"right_forum_news0")?></div>
	<div <?php show_page_pos("right_forum_news0")?> class=pictitle><?php show_page_href($pos_items,"right_forum_news0")?></div>
 	<div id=forum_dash></div>
	<?php
		for($i=1;$i<3;$i++){$pos_name = "right_forum_news".$i;
	?>
		<div class=content <?php show_page_pos($pos_name)?>><li><?php show_page_href($pos_items,$pos_name);?></li></div>
	<?php } ?>
</div>
<div class=bottom_line></div>