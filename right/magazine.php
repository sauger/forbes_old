<div id="r_t_title">
		<div id=wz>福布斯杂志</div>
		<div id=more><a href="/magazine/"><img border=0 src="/images/right/c_r_t_more.gif"></a></div>	
	</div>
	<div id=mag_content>
			<?php 
				$magazine = $db->query("select * from fb_magazine where is_adopt=1 order by publish_data");
			?>
			<div class=pic><a href="/magazine/"><img border=0 src="<?php echo $magazine[0]->img_src3;?>"></a></div>
			<div class=pictitle><a href="/magazine/magazine.php?id=<?php echo $magazine[0]->id;?>"><?php echo $magazine[0]->name;?></a></div>
			<div class=context><?php echo strip_tags($magazine[0]->description);?></div>	
 			<div id=mag_dash></div>
			<div id=search>往期杂志查阅</div>
			<div id=sel>
				<select></select>
				<select></select>
			</div>
			<button id="btnonline"></button><button id="sq"></button>
			<div id=ck><a href="/magazine/list.php">查看杂志列表>></a></div>

	</div>
	<div class=bottom_line></div>