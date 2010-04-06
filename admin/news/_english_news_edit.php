<?php
	js_include_tag('admin/news/english_news.edit');
	$ch_id = $_REQUEST['chinese_id'];
	$id = $_REQUEST['id'];
	$news = new table_class($tb_news);
	if($id){
		$news->find($id);
		$db= get_db();
		$db->query("select chinese_news_id from fb_news_relationship where english_news_id={$id}");
		if($db->move_first()===false){
			die('invalid request!');
		}
		$ch_id = $db->field_by_index(0);
		$ch_news = new table_class($tb_news);
		$ch_news = $ch_news->find($ch_id);
	}else{
		if(!$ch_id){
			die('invalid request!');
		}
		$ch_news = new table_class($tb_news);
		$ch_news = $ch_news->find($ch_id);
		$news->news_type = $ch_news->news_type;
		$news->category_id = $ch_news->category_id;
		$news->target_url = $ch_news->target_url;
		$news->file_name = $ch_news->file_name;
		$news->video_src = $ch_news->video_src;
		$news->video_photo_src = $ch_news->video_photo_src;
	}
	
?>
<div id=icaption>
    <div id=title><?php echo $ch_news->title;?></div>
	  <a href="news_edit.php?id=<?php echo $ch_news->id;?>" id=btn_back></a>
</div>
<div id=itable>
	<form id="news_edit_en" enctype="multipart/form-data" action="english_news.post.php" method="post"> 
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td width="15%" class=td1>Title</td>
			<td width="85%"><input id="title_en" type="text" name="news[title]" value="<?php echo $news->title;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>Shorttitle</td>
			<td><input id="short_title_en"  type="text" name="news[short_title]" value="<?php echo $news->short_title;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>Content</td>
			<td><?php show_fckeditor('news[content]','Admin',false,"215",$news->content);?></td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center">
				<input id="submit" type="submit" value="Submit">
				<input type="hidden" name="news[category_id]" id="category_id" value="<?php echo $news->category_id;?>">
				<input type="hidden" name="id"  value="<?php echo $news->id; ?>">
				<input type="hidden" name="chinese_id" value="<?php echo $ch_id;?>"></input>			
			</td>
		</tr>	
	</table>
	</form>
</div>

<script>
$(function(){
		category.display_select('category_select_en',$('#span_category1'),<?php echo $news->category_id;?>,'', function(id){			
			
		});
		$('select.category_select_en').attr('disabled',true);
	});	

</script>