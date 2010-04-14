<?php 
	require_once('../frame.php');
	$id = intval($_REQUEST['id']);
	if(!empty($id)){
		$news = new table_class('fb_news');
		if(!$news->find($id)){
			redirect('error.html');
			die();
		}else{
			$db = get_db();
			$db->query("select group_concat(industry_id separator ',') as ids from fb_news_industry where news_id=$id");
			if($db->move_first()){
				$industry_id = $db->field_by_name('ids');
			}
		}
	}else{
		redirect('error.html');
		die();
	}
	$db->query("select english_news_id from fb_news_relationship where chinese_news_id={$id}");
	if($db->move_first()){
		$english_id = $db->field_by_name('english_news_id');
	}
	if(strtolower($_GET['lang']) == 'en' && $english_id){
		$english_news = new table_class('fb_news');
		$english_news->find($english_id);
		$title = $english_news->title;
		$content = $english_news->content;
	}else{
		$title = $news->title;
		$content = $news->content;
	}
	
	function get_news_url($news){
		return dynamic_news_url($news);
	}
	
	function get_news_en_url($news){
		return "news.php?id={$news->id}&lang=en";
	}
	$db->query("select group_concat(text SEPARATOR '|') as words from fb_filte_words");
	if($db->move_first()){
		$filter =  $db->field_by_name('words');
		$filter = explode('|',$filter);
		$filter = array_fill_keys($filter,"****");
		$title = strtr($title,$filter);
		$content = strtr($content,$filter);
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title><?php echo strip_tags($news->short_title);?>-福布斯中文网</title>
	<meta name="Keywords" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<meta name="Description" content="<?php echo addslashes(strip_tags($news->keywords));?>"/>
	<?php
		use_jquery();
		js_include_tag('news/news','public','right');
		css_include_tag('public','news','right_inc');
	?>
</head>
<body <?php if($news->forbbide_copy == 1){ ?> oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="return false" oncopy="return false" onbeforecopy="return false" onmouseup="return false" <?php }?>>
	<div id=ibody>
		<?php include "../inc/top.inc.php";?>
		<?php include "_news_top.php"?>
		<?php include '_news_content.php';?>
		<div id="right_inc">
		 		<?php include "../right/ad.php";?>
		 		<?php include "../right/favor.php";?>
		 		<?php include "../right/four.php";?>
		 		<?php include "../right/rich.php";?>
		 		<?php include "../right/magazine.php";?>
		</div>
		<?php include "../inc/bottom.inc.php";?>
	</div>
</body>
<html>