<div class="left_div">
	<div id="left_title2">
		<div class="left_bottom_title" name="create" style="background:url(/images/right/background2.jpg); color:#000000;">创业</div>
		<div name="ology" class="left_bottom_title">科技</div>
		<div name="business" class="left_bottom_title">商业</div>
		<div name="invest" class="left_bottom_title">投资</div>
	</div>
	<div id="create" class="list left_bottom">
		<ul>
			<?php
			$record = get_news_by_pos('创业','公共右侧');
			for($i=0;$i<count($record);$i++){
			?>
			<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
			<?php }?>
		</ul>
	</div>
	<div id="ology" style="display:none;" class="list left_bottom">
		<ul>
			<?php
			$record = get_news_by_pos('科技','公共右侧');
			for($i=0;$i<count($record);$i++){
			?>
			<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
			<?php }?>
		</ul>
	</div>
	<div id="business" style="display:none;" class="list left_bottom">
		<ul>
			<?php
			$record = get_news_by_pos('商业','公共右侧');
			for($i=0;$i<count($record);$i++){
			?>
			<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
			<?php }?>
		</ul>
	</div>
	<div id="invest" style="display:none;" class="list left_bottom">
		<ul>
			<?php
			$record = get_news_by_pos('投资','公共右侧');
			for($i=0;$i<count($record);$i++){
			?>
			<li><a href="/news/news.php?id=<?php echo $record[$i]->news_id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
			<?php }?>
		</ul>
	</div>
</div>