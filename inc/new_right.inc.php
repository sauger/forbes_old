<?php
	require_once('../frame.php');
	$db= get_db();
	use_jquery();
	js_include_tag('right');
	css_include_tag('right_inc');
?>
<div id="right_inc">
	<div id="right_ad"><img border=0 width=317 height=265 src="/images/right/one.jpg"></div>
	<div class="left_div">
		<div id="left_title">
			<div style="background:url(/images/html/news/background1.jpg); color:#000000;" name="favor" class="left_top_title">最受欢迎</div>
			<div style="margin-left:1px;" name="comm" class="left_top_title">编辑推荐</div>
		</div>
		<div id="favor" class="list left_top">
			<ul>
				<?php
				$record = get_news_by_pos('最受欢迎','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
		<div id="comm" style="display:none;" class="list left_top">
			<ul>
				<?php
				$record = get_news_by_pos('编辑推荐','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
	</div>
	<div class="left_div">
		<div id="left_title2">
			<div class="left_bottom_title" name="create" style="background:url(/images/html/news/background2.jpg); color:#000000;">创业</div>
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
				<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
		<div id="ology" style="display:none;" class="list left_bottom">
			<ul>
				<?php
				$record = get_news_by_pos('科技','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
		<div id="business" style="display:none;" class="list left_bottom">
			<ul>
				<?php
				$record = get_news_by_pos('商业','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
		<div id="invest" style="display:none;" class="list left_bottom">
			<ul>
				<?php
				$record = get_news_by_pos('投资','公共右侧');
				for($i=0;$i<count($record);$i++){
				?>
				<li><a href="/news/news.php?id=<?php echo $record[$i]->id?>" title="<?php echo strip_tags($record[$i]->title);?>" class="nor4"><?php echo $record[$i]->short_title?></a></li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>