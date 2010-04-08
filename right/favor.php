<?php init_page_items();?>
<div class="left_title">
	<div  name="favor" class="left_top_title article_list selected">最受欢迎</div>
	<div style="margin-left:1px;" name="comm" class="left_top_title article_list">编辑推荐</div>
</div>
<div id="favor" class="right_box left_top">
	<ul>
		<?php
		for($i=0;$i<7;$i++){$pos_name = "right_pop".$i;
		?>
		<li <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name)?></li>
		<?php }?>
	</ul>
</div>
<div id="comm" style="display:none;" class="right_box left_top">
	<ul>
		<?php
		for($i=0;$i<7;$i++){$pos_name = "right_reco".$i;
		?>
		<li <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name)?></li>
		<?php }?>
	</ul>
</div>
<div class="bottom_line"></div>