<div id="r_t_title">
	<div id=wz>专栏文章文类</div>
</div>
<?php 
	$category = $db->query("select  group_concat(category_id separator ',') as ids from fb_news where author_type=2");
	$cid = explode(',',$category[0]->ids);
	$cid = array_unique($cid);
	$cid = implode(',',$cid);
	if($cid){
		$category = $db->query("select id,name from fb_category where id in($cid)");
		$count = count($category);
	}
?>
<div class="right_box">
	<?php 
		for($i=0;$i<$count;$i++){
	?>
	<div class="right_span"><a href="/news/news_list.php?cid=<?php echo $category[$i]->id;?>&type=column"><?php echo $category[$i]->name;?></a></div>
	<?php }?>
</div>
<div class=bottom_line></div>