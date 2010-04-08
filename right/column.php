<?php init_page_items();?>
<div class="left_title">
		<div style="background:url(/images/right/background1.jpg); color:#000000;" name="column" class="left_top_title column_list">最受欢迎专栏</div>
		<div style="margin-left:1px;" name="journalist" class="left_top_title column_list">最受欢迎智库专栏</div>
	</div>
	<div id="column" class="right_box left_top">
		<?php
		for($i=0;$i<5;$i++){ $pos_name = "right_popcolumn".$i;$pos_news_name = "right_pcnews".$i;
		?>
		<div class="column_box" <?php show_page_pos($pos_name)?>>
			<div class="col_pic">
				<?php show_page_img($pos_items,$pos_name)?>
			</div>
			<div class="clo_name">
				<?php show_page_href($pos_items,$pos_name)?>
			</div>
			<div class="clo_des">
				<?php show_page_desc($pos_items,$pos_name)?>
			</div>
			<div class="clo_news" <?php show_page_pos($pos_news_name)?>>
				<?php show_page_href($pos_items,$pos_news_name)?>
			</div>
		</div>
		<?php }?>
	</div>
	<div id="journalist" style="display:none;" class="right_box left_top">
		<?php
		for($i=0;$i<5;$i++){ $pos_name = "right_recocolumn".$i;$pos_news_name = "right_rcnews".$i;
		?>
		<div class="column_box" <?php show_page_pos($pos_name)?>>
			<div class="col_pic">
				<?php show_page_img($pos_items,$pos_name)?>
			</div>
			<div class="clo_name">
				<?php show_page_href($pos_items,$pos_name)?>
			</div>
			<div class="clo_des">
				<?php show_page_desc($pos_items,$pos_name)?>
			</div>
			<div class="clo_news" <?php show_page_pos($pos_news_name)?>>
				<?php show_page_href($pos_items,$pos_news_name)?>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="bottom_line"></div>