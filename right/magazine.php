<div id="r_t_title">
		<div id=wz>福布斯杂志</div>
		<div id=more><a href="/magazine/"><img border=0 src="/images/right/c_r_t_more.gif"></a></div>	
	</div>
	<div id=mag_content <?php show_page_pos("right_magazine") ?>>
			<div class=pic><?php show_page_img($pos_items,"right_magazine")?></div>
			<div class=pictitle><?php show_page_href($pos_items,"right_magazine")?></div>
			<div class=context><?php show_page_desc($pos_items,"right_magazine")?></div>	
 			<div id=mag_dash></div>
			<div id=search>往期杂志查阅</div>
			<div id=sel>
				<select id="old_magazine">
					<option value=''></option>
					<?php
						$magazine = $db->query("select year from fb_old_magazine group by year order by year desc");
						$year_count = $db->record_count;
						for($i=0;$i<$year_count;$i++){
					?>
					<option value="<?php echo $magazine[$i]->year;?>"><?php echo $magazine[$i]->year;?>年</option>
					<?php }?>
				</select>
				<select id="show_magazine">
					<option value=""></option>
				</select>
			</div>
			<a id="btnonline"></a>
			<a id="sq"></a>
			<div id=ck><a href="/magazine/list.php">查看杂志列表>></a></div>

	</div>
	<div class=bottom_line></div>