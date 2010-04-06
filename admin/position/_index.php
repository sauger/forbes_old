<?php
$category = new category_class();

$sql = "select t1.id,t1.title,t1.short_title,t1.created_at,t1.description,t1.video_photo_src from fb_news t1 join fb_category t2 on t1.category_id=t2.id where 1=1 and t1.is_adopt=1 and t2.name='陆家嘴早餐' order by t1.created_at desc";
$breakfast = $db->query($sql);
$count = $db->record_count;
for($i=0;$i<$count;$i++){
	for($j=0;$j<3;$j++){
		$pos_name = "index_bf".$j;
		$record = $db->query("select end_time from fb_page_pos where name='{$pos_name}'");
		if($db->record_count==1){
			if($record[0]->end_time>now()){
			}else{
				$pos = new table_class('fb_page_pos');
				$pos->find($record[0]->id);
				$end_time = date('Y-m-d H:00:00',strtotime("+1hours", time()));
				$pos->end_time = $end_time;
				$pos->display = $breakfast[$i]->short_titile;
				$pos->title = $breakfast[$i]->titile;
				$pos->image1 = $breakfast[$i]->video_photo_src;
				$pos->description = $breakfast[$i]->description;
			}
		}else{
			
		}
	}
}