<?php
include '../../frame.php';
$type = $_GET['type'];
switch ($type) {
	case 'news':
		$id = intval($_GET['id']);
		$news = new table_class('fb_news');
		if(empty($id)){
			return false;
		}
		$news->find($id);
		if($news->id <=0 ) return false;
		if(static_news($news)){
			echo '静态化新闻成功';
		}else{
			echo '静态化新闻失败';
		};
		break;
	case 'index':
		if(static_index()){
			echo '静态化首页成功!';
		}else{
			echo '静态化首页失败!';
		}
		break;
	case 'top':
		if(static_top()){
			echo '静态化顶部成功!';
		}else{
			echo '静态化顶部失败!';
		}
		break;
	case 'bottom':
		if(static_bottom()){
			echo '静态化顶部成功!';
		}else{
			echo '静态化顶部失败!';
		}
		break;
	default:
		;
	break;
}