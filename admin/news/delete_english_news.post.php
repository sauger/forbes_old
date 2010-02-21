<?php
	include "../../frame.php";
	$db = get_db();
	$db->execute("delete from fb_news_relationship where chinese_news_id={$_POST['ch_id']}");
	$db->execute("delete from fb_news where id={$_POST['del_id']}");
	//redirect('/admin/news/news_edit.php?id='.$_POST['ch_id'],'header');
?>