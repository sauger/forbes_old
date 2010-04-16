<?php
	require_once('../../frame.php');
	$type = $_POST['type'];
	$db = get_db();
	$fcontent = '<?xml version="1.0" encoding="utf-8" ?>';
	if($type=='top'){
		$sql = "select * from fb_life_flash where type='top' order by priority asc,created_at desc limit 5";
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
		$filename = '../../life/flash/flash1.xml';
		$handle=fopen($filename,"wt");
		fwrite($handle,$fcontent);
		fclose($handle);
	}
	elseif($type=='middle'){
		$sql = "select * from fb_life_flash where type='middle' order by priority asc,created_at desc limit 9";
		$img = $db->query($sql);
		$fcontent .= '<URL>';
		
		for($i=0;$i<count($img);$i++){
			$fcontent .= '<Image_Information><img_name>'.$img[$i]->title;
			$fcontent .= '</img_name><img_link>'.$img[$i]->url;
			$fcontent .= '</img_link><thumb_image>'.$img[$i]->src;
			$fcontent .= '</thumb_image></Image_Information>';
		}
		$fcontent .= '</URL>';
		$filename = '../../life/flash/flash2.xml';
		$handle=fopen($filename,"wt");
		fwrite($handle,$fcontent);
		fclose($handle);
	}
	elseif($type=='news'){
		$sql = "select * from fb_life_flash where type='news' order by priority asc,created_at desc limit 8";
		$news = $db->query($sql);
		$fcontent .= '<list>';
		
		for($i=0;$i<count($news);$i++){
			$fcontent .= "<gg name= \"{$news[$i]->title}\" url=\"{$news[$i]->url}\" target=\"_blank\"/> ";
		}
		$fcontent .= '</list> ';
		$filename = '../../life/flash/flash3.xml';
		$handle=fopen($filename,"wt");
		fwrite($handle,$fcontent);
		fclose($handle);
	}
	echo "生成成功";
?>