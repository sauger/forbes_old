<?php init_page_items();?>
<div class="left_title">
	<div class="left_bottom_title" name="create" style="background:url(/images/right/background2.jpg); color:#000000;">创业</div>
	<div name="ology" class="left_bottom_title">科技</div>
	<div style="width:77px;" name="business" class="left_bottom_title">商业</div>
	<div name="invest" class="left_bottom_title">投资</div>
</div>
<div id="create" class="right_box left_bottom">
	<ul>
		<?php
		for($i=0;$i<7;$i++){$pos_name = "right_create".$i;
		?>
		<li <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name)?></li>
		<?php }?>
	</ul>
</div>
<div id="ology" style="display:none;" class="right_box left_bottom">
	<ul>
		<?php
		for($i=0;$i<7;$i++){$pos_name = "right_ology".$i;
		?>
		<li <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name)?></li>
		<?php }?>
	</ul>
</div>
<div id="business" style="display:none;" class="right_box left_bottom">
	<ul>
		<?php
		for($i=0;$i<7;$i++){$pos_name = "right_business".$i;
		?>
		<li <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name)?></li>
		<?php }?>
	</ul>
</div>
<div id="invest" style="display:none;" class="right_box left_bottom">
	<ul>
		<?php
		for($i=0;$i<7;$i++){$pos_name = "right_invest".$i;
		?>
		<li <?php show_page_pos($pos_name)?>><?php show_page_href($pos_items,$pos_name)?></li>
		<?php }?>
	</ul>
</div>
<div class="bottom_line"></div>