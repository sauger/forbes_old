<?php
function get_news_by_pos($pos,$page='') {
	$db = get_db();
	$pos = addslashes($pos);
	$sql ="select * from fb_position where name='{$pos}'";
	if($page){
		$page = $db->query("select id from fb_position where name='{$page}' and page_id=0");
		$page_id = $page[0]->id;
		$sql .= " and page_id=$page_id";
		if($db->record_count==0) return false;
	}
	$record = $db->query($sql);
	if($record === false) return false;
	
	switch ($record[0]->type) {
		case 'category':
			$category = new category_class('news');
			$category_id=$record[0]->category_id;
			$all_category_ids = $category->children_map($category_id);
			$all_category_ids = implode(',',$all_category_ids);
			$sql = 'select n.created_at,n.id as id,n.id as news_id,n.title,n.short_title,n.video_photo_src,n.description,n.sub_headline,n.category_id from fb_news n left join fb_category c on n.category_id=c.id where n.is_adopt=1 and c.id in('.$all_category_ids.') and c.category_type="news" order by n.created_at desc limit '.$record[0]->position_limit;;
			break;
		case 'news':
			$sql='select n.created_at,n.id as id,n.id as news_id,n.title,n.short_title,n.video_photo_src,n.description,n.sub_headline,n.author_id from fb_position_relation f left join fb_news n on f.news_id=n.id where n.is_adopt=1 and f.type="news" and f.position_id='.$record[0]->id.' order by f.priority limit '.$record[0]->position_limit;			
			break;
		case 'list':
			$sql = "select n.id,n.name,n.image_src,n.comment from fb_position_relation f join fb_custom_list_type n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='list' order by f.priority limit {$record[0]->position_limit}";
			break;
		case 'image':
			$sql = "select n.* from fb_position_relation f join fb_images n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='image' and n.is_adopt=1 order by f.priority limit {$record[0]->position_limit}";
			break;
		case 'column':
			$sql = "select n.* from fb_position_relation f join fb_user n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='column' and n.role_name='column' order by f.priority limit {$record[0]->position_limit}";
			break;
		case 'journalist':
			$sql = "select n.* from fb_position_relation f join fb_user n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='journalist' and n.role_name='journalist' order by f.priority limit {$record[0]->position_limit}";
			break;
		case 'magazine':
			$sql = "select n.* from fb_position_relation f join fb_magazine n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='magazine' order by f.priority limit {$record[0]->position_limit}";
			break;
		case 'activity':
			$sql = "select n.* from fb_position_relation f join fb_activity n on f.news_id=n.id where f.position_id={$record[0]->id} and f.type='activity' order by f.priority limit {$record[0]->position_limit}";
			break;
		default:
			return false;
		break;
	}
	return $db->query($sql); 
} 

function static_news_url($news,$index = 1){
	$date = date('Ym',strtotime($news->created_at));
	$dir  = "/review/{$date}";
	$news_id = str_pad($news->id,7,'0',STR_PAD_LEFT);
	if($index > 1){
		$file = $dir ."/{$news_id}_{$index}.shtml";
	}else{
		$file = $dir ."/{$news_id}.shtml";	
	}
	
	return $file;
}

function get_news_en_static_url($news,$index = 1) {
		$news_id = str_pad($news->id,7,'0',STR_PAD_LEFT);
		$date = date('Ym',strtotime($news->created_at));
		$dir  = "/review/{$date}";
		if($index > 1){
			$file = $dir ."/{$news_id}_en_{$index}.shtml";
		}else{
			$file = $dir ."/{$news_id}_en.shtml";	
		}	
		
		return $file;;
}

function dynamic_news_url($news){
	return "/news/news.php?id={$news->id}";
}

function static_index() {
	global $static_dir;
	global $static_url;
	$content = file_get_contents("{$static_url}/index_static.php");
	return write_to_file("{$static_dir}/index.shtml",$content,'w');
}

function static_top(){
	global $static_dir;
	global $static_url;
	$content = file_get_contents("{$static_url}/inc/top.inc.static.php");
	return write_to_file("{$static_dir}/inc/top.inc.shtml",$content,'w');
}

function get_news_list_url(){
	
}

function static_bottom() {
	global $static_dir;
	global $static_url;
	$content = file_get_contents("{$static_url}/inc/bottom.inc.static.php");
	return write_to_file("{$static_dir}/inc/bottom.inc.shtml",$content,'w');
}

function static_news($news,$symbol='fck_pageindex',$en = false){
	if(!$news){
		return false;
	};
	global $static_dir;
	global $static_url;
	$url = "{$static_url}/news/static_news.php?id={$news->id}";
	if($en) $url .= "&lang=en";
	$content = file_get_contents($url);
	$date = date('Ym',strtotime($news->created_at));
	$dir  = "{$static_dir}/review/{$date}";
	if(!is_dir($dir)){
		mkdir($dir);
	}
	$news_id = str_pad($news->id,7,'0',STR_PAD_LEFT);
	if($en) $news_id .= "_en";
	$file = $dir ."/{$news_id}.shtml";
	if(!write_to_file($file,$content,'w')){
		return false;
	}
	$page_count = get_fck_page_count($news->content);
	if ($page_count > 1){
		for($i=2;$i<= $page_count;$i++){
			$url = "{$static_url}/news/static_news.php?id={$news->id}&{$symbol}={$i}";
			if($en) $url .= "&lang=en";
			$content = file_get_contents($url);
			$file = "$dir/{$news_id}_{$i}.shtml";
			if(!write_to_file($file,$content,'w')){
				return false;
			}
		}
	}
	
	//handle the english article
	if(!$en){
		$db = get_db();
		$db->query("select * from fb_news_relationship where chinese_news_id = {$news->id}");
		if($db->move_first()){
			$news->find($news->id);
			return static_news($news,$symbol,true);
				
		}	
	}
	
	return true;
}

class PosItemClass{

}

function get_page_items(){
	$pos_items = new PosItemClass();
	$pos = new table_class('fb_page_pos');
	$pos = $pos->find('all');
	if(empty($pos)) $pos = array();
	foreach ($pos as $v){
		$key = $v->name;
		$pos_items->$key = $v;
	}
	return $pos_items;
}

function init_page_items(){
	global $pos_items;
	if($pos_items) return;
	$pos_items = get_page_items();
	global $page_type;
	$page_type = $page_type ? $page_type : $_REQUEST['page_type'];
	if(empty($page_type)){
		$page_type= 'dynamic';
	}
	if($page_type == 'static'){
		foreach($pos_items as $val){
			$val->href = $val->static_href;
		}
	}
	if($page_type == 'admin'){
		js_include_tag('jquery.colorbox-min');
		css_include_tag('colorbox');
		js_include_tag('admin/page_admin');	
	}
}

function show_page_href($pos_items,$pos_name,$show_title=true){
	if($show_title){
		echo '<a href="'.$pos_items->$pos_name->href.'" title="'.$pos_items->$pos_name->title.'">'.$pos_items->$pos_name->display.'</a>';
	}else{
		echo '<a href="'.$pos_items->$pos_name->href.'">'.$pos_items->$pos_name->display.'</a>';
	}
	
}

function show_page_img($pos_items,$pos_name,$index='1',$width='',$height=''){
	$image = 'image'.$index;
	echo '<a href="'.$pos_items->$pos_name->href.'"><img border=0 src="'.$pos_items->$pos_name->$image.'"';
	
	if($width) echo 'width="'.$width.'"';
	if($height) echo 'height="'.$height.'"';
	echo '></a>';
	
}

function show_page_desc($pos_items,$pos_name,$show_title=false){
	if($show_title){
		echo '<a href="'.$pos_items->$pos_name->href.'" title="'.$pos_items->$pos_name->description.'">'.$pos_items->$pos_name->description.'</a>';
	}else{
		echo '<a href="'.$pos_items->$pos_name->href.'">'.$pos_items->$pos_name->description.'</a>';
	}
	
}

?>