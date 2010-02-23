<?php
	if($id){
		$category_id = $news->category_id;
		$db = get_db();
		$db->query("select english_news_id from fb_news_relationship where chinese_news_id = $id ");
		if ($db->move_first()){
			$english_id = $db->field_by_index(0);		
		}
	}else{
		$category_id = -1;
	}
	if (!$news->news_type){
		$news->news_type = 1;
	}
	
?>
	<form id="news_edit" enctype="multipart/form-data" action="news.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　编辑新闻</td>
		</tr>
		<tr class=tr4>
			<td width="130">标题/短标题</td><td width="695" align="left"><input id="title" type="text" name="news[title]" value="<?php echo $news->title;?>">　/　<input id="short_title" type="text" name="news[short_title]" value="<?php echo $news->short_title;?>"></td>
		</tr>
		<tr class=tr4>
			<td>分　类</td>
			<td align="left" class="newsselect1" >
			<span id="span_category"></span>
			</td>
		</tr>
		<tr class=tr4>
			<td>新闻类别</td>
			<td align="left" id="td_newstype">
				<input type="radio" name="news[news_type]" value="1" <?php if($news->news_type==1){ ?>checked="checked"<?php } ?>>默认
				<input type="radio" name="news[news_type]" value="2" <?php if($news->news_type==2){ ?>checked="checked"<?php } ?>>文件
				<input type="radio" name="news[news_type]" value="3" <?php if($news->news_type==3){ ?>checked="checked"<?php } ?>>URL
			</td>
		</tr>
		<tr class=tr4>
			<td>关键词/优先级</td>
			<td align="left">
				<input type="text" size="20" name=news[keywords]  id="news_keywords"  value="<?php echo $news->keywords;?>">(空格分隔)　　/　　
				<input type="text" size="10" name=news[priority] id="priority"  class="number" value="<?php echo $news->priority;?>">(0~100)</td>
		</tr>
		<tr class="tr4">
			<td>英文版</td>
			<td align="left">
			<?php if(!isset($english_id)) { ?>
			<a id="add_english_news" href="news_edit.php?chinese_id=<?php echo $news->id;?>">添加</a>
			<?php } else { ?>
			<a id="edit_english_news" href="news_edit.php?id=<?php echo $english_id;?>">编辑</a> <a id="delete_english_news" href="<?php echo $english_id;?>">删除</a>
			<?php } ?>
			</td>
		</tr>
		<tr class=tr4 id=target_url>
			<td>URL</td><td align="left"><input type="text" size="50" name=news[target_url] value="<?php echo $news->target_url; ?>"></td>
		</tr>
		<tr class=tr4 id=tr_file_name >
			<td>上传文件</td>
			<td align="left">
				<input type="file" name=file_name id="file_name" value="<?php echo $news->file_name;?>">
				<?php
					if($news->file_name){
						?>
						　<a href="<?php echo $news->file_name;?>" target="_blank" style="color:blue;">查看</a>
						<?php
					}
				?>
			</td>
		</tr>
		<tr class="normal_news tr4">
			<td>新闻视频</td>
			<td align="left" id="td_video">
				视频<input type="file" name="video_src" id="video_src">　
				<?php 
				if($news->video_src){
						echo "<a href=\"{$news->video_src}\" target=\"_blank\">查看</a>";
					}
				?>
				缩略图<input type="file" name="video_pic" id="video_pic" value="<?php echo $news->video_photo_src?>">
				<?php					
					if($news->video_photo_src){
						echo "　<a href=\"{$news->video_photo_src}\" target=\"_blank\">查看</a>";
					}
				?>
			</td>
		</tr>
		<tr id=newsshow1  class="normal_news tr4">
			<td  height=100>简短描述</td><td><?php show_fckeditor('news[description]','Admin',false,"100",$news->description);?></td>
		</tr>
		<tr id=newsshow1 class="normal_news tr4">
			<td height=265>新闻内容</td><td><?php show_fckeditor('news[content]','Admin',false,"265",$news->content);?></td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布新闻"></td>
		</tr>	
	</table>
		<input type="hidden" name="news[category_id]" id="category_id" value="<?php echo $news->category_id;?>">
		<input type="hidden" name="news[image_flag]" value="<?php echo $news->image_flag;?>" id="hidden_image_flag">
		<input type="hidden" name="id" id="hidden_news_id" value="<?php echo $news->id; ?>">
	</form>

<script>
$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){			
		});
	});	

</script>