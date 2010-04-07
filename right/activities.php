<div id=r_c_title><?php echo $catename[0]->name; ?>活动</div>
<div id=r_c_l></div>
<div id=r_c_c>
	<?php
		for($i=0;$i<5;$i++){$pos_name = $pos."activity".$i;
	?>
	<div class=content pos="<?php echo $pos_name;?>">
		<div class=pic><?php show_page_img($pos_items,$pos_name);?></div>
		<div class=pictitle><?php show_page_href($pos_items,$pos_name);?></div>
	</div>
	<?php }?>
</div>
<div id=r_c_r></div>