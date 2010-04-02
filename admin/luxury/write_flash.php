<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
</head>
<?php
	require_once('../../frame.php');
	$type = $_GET['type'];
	$db = get_db();
	
	$fcontent = '<?xml version="1.0" encoding="utf-8" ?>';
	if($type=='top'){
		$sql = "select t1.* from fb_images t1 join fb_position_relation t2 on t1.id=t2.news_id where t2.type='top_flash' order by t2.priority limit 5";
		$img = $db->query($sql);
		$fcontent .= '<document>';
		for($i=0;$i<count($img);$i++){
			$fcontent .= '<item><image>'.$img[$i]->src;
			$fcontent .= '</image><smallimage>'.$img[$i]->src2;
			$fcontent .= '</smallimage><video>'.$img[$i]->url;
			$fcontent .= '</video><captionlines>4</captionlines><headline>';
			$fcontent .= '</headline><caption>';
			$fcontent .= '</caption><photocaption>';
			$fcontent .= '</photocaption></item>';
		}
		$fcontent .= '</document>';
		$filename = '../../life/img.xml';
		$handle=fopen($filename,"wt");
		fwrite($handle,$fcontent);
		fclose($handle);
	}
	elseif($type=='middle'){
		$sql = "select t1.* from fb_images t1 join fb_position_relation t2 on t1.id=t2.news_id where t2.type='middle_flash' order by t2.priority limit 9";
		$img = $db->query($sql);
		$fcontent .= '<URL>';
		
		for($i=0;$i<count($img);$i++){
			$fcontent .= '<Image_Information><img_name>'.$img[$i]->title;
			$fcontent .= '</img_name><img_link>'.$img[$i]->url;
			$fcontent .= '</img_link><thumb_image>'.$img[$i]->src;
			$fcontent .= '</thumb_image></Image_Information>';
		}
		$fcontent .= '</URL>';
		$filename = '../../life/imglink.xml';
		$handle=fopen($filename,"wt");
		fwrite($handle,$fcontent);
		fclose($handle);
	}
	elseif($type=='news'){
		$sql = "select t1.* from fb_news t1 join fb_position_relation t2 on t1.id=t2.news_id where t2.type='flash_news' order by t2.priority limit 8";
		$news = $db->query($sql);
		$fcontent .= '<list>';
		
		for($i=0;$i<count($news);$i++){
			$url = static_news_url($news);
			$fcontent .= "<gg name= \"{$news[$i]->short_title}\" url=\"{$url}\"     target=\"_blank\"/> ";
		}
		$fcontent .= '</list> ';
		$filename = '../../life/data.xml';
		$handle=fopen($filename,"wt");
		fwrite($handle,$fcontent);
		fclose($handle);
	}
	echo "静态成功";
?>