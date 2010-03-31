<div class="left_title">
		<div style="background:url(/images/right/background1.jpg); color:#000000;" name="column" class="left_top_title column_list">最受欢迎专栏</div>
		<div style="margin-left:1px;" name="journalist" class="left_top_title column_list">最受欢迎智库专栏</div>
	</div>
	<div id="column" class="right_box left_top">
		<?php
		$pos_id = $db->query("select id from fb_position where name='最受欢迎专栏'");
		$sql = "SELECT t1.id as a_id,t1.nick_name,t1.image_src,t1.column_name,t1.description,t3.id,t3.title,t3.created_at FROM fb_position_relation t2 join fb_user t1 on t1.id=t2.news_id join fb_news t3 on t1.id=t3.author_id where t3.is_adopt=1 and t2.position_id={$pos_id[0]->id} group by t1.id order by t2.priority,t3.created_at limit 5";
		$author = $db->query($sql);
		for($i=0;$i<count($author);$i++){
		?>
		<div class="column_box">
			<div class="col_pic">
				<img src="<?php if($author[$i]->image_src!='')echo $author[$i]->image_src;else echo "/images/html/column/picture2.jpg";?>">
			</div>
			<div class="clo_name">
				<?php echo !$author[$i]->column_name?$author[$i]->nick_name:$author[$i]->column_name;?>专栏
			</div>
			<div class="clo_des">
				<?php echo strip_tags($author[$i]->description);?>
			</div>
			<div class="clo_news">
				<a href="<?php echo get_news_url($author[$i]);?>"><?php echo strip_tags($author[$i]->title);?></a>
			</div>
		</div>
		<?php }?>
	</div>
	<div id="journalist" style="display:none;" class="right_box left_top">
		<?php
		$pos_id = $db->query("select id from fb_position where name='最受欢迎智库专栏'");
		$sql = "SELECT t1.id as a_id,t1.nick_name,t1.image_src,t1.column_name,t1.description,t3.id,t3.title,t3.created_at FROM fb_position_relation t2 join fb_user t1 on t1.id=t2.news_id join fb_news t3 on t1.id=t3.author_id where t3.is_adopt=1 and t2.position_id={$pos_id[0]->id} group by t1.id order by t2.priority,t3.created_at limit 5";
		$author = $db->query($sql);
		for($i=0;$i<count($author);$i++){
		?>
		<div class="column_box">
			<div class="col_pic">
				<img src="<?php if($author[$i]->image_src!='')echo $author[$i]->image_src;else echo "/images/html/column/picture2.jpg";?>">
			</div>
			<div class="clo_name">
				<?php echo !$author[$i]->column_name?$author[$i]->nick_name:$author[$i]->column_name;?>专栏
			</div>
			<div class="clo_des">
				<?php echo strip_tags($author[$i]->description);?>
			</div>
			<div class="clo_news">
				<a href="<?php echo get_news_url($author[$i]);?>"><?php echo strip_tags($author[$i]->title);?></a>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="bottom_line"></div>