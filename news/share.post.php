<?php
    require_once('../frame.php');
	
	if(!is_post()){
		die();
	}
	if($_SESSION['news_share']!=$_POST['session']){
		die();
	}
	$news_id = $_POST['news_id'];
	if(empty($news_id)){
		die();
	}
	
	$count = count($_POST['mail']);
	$news = new table_class('fb_news');
	$news->find($news_id);
	
	$share = new table_class('fb_news_share');
	for($i=0;$i<$count;$i++){
		if($_POST['mail'][$i]!=''&&$_POST['name'][$i]!=''){
			$share->id=0;
			$share->nick_name = htmlspecialchars($_POST['name'][$i]);
			if(strlen($_POST['name'][$i])>30){
				die();
			}
			$share->email = htmlspecialchars($_POST['mail'][$i]);
			if(strlen($_POST['email'][$i])>20){
				die();
			}
			if(isset($_SESSION['name'])){
				$share->user = $_SESSION['name'];
			}else{
				$share->user = $_SERVER['REMOTE_ADDR'];
			}
			$share->created_at = now();
			$share->news_id = $news_id;
			$share->save();
			$content = $_POST['name'][$i]."，你好<br/>您的好友'".$share->user."'想与您分享福布斯中文网的文章《".$news->title."》，您可以点击<a href='http://61.129.115.239".static_news_url($news)."'>http://61.129.115.239".static_news_url($news)."</a>来阅读<br><br>福布斯中文网";
			send_mail('smtp.163.com','sauger','auden6666','sauger@163.com',$_POST['mail'][$i],'福布斯中文网',$content);
		}
		alert("已成功分享！");
		redirect('share.php?news_id='.$news_id);
	}
?>