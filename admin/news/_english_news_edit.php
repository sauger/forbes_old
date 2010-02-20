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

	<form id="news_edit_en" enctype="multipart/form-data" action="english_news.post.php" method="post"> 
	<table width="755" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　编辑新闻英语版（<span style="color:red">中文版：<a href="news_edit.php?id=<?php echo $ch_news->id;?>"><?php echo $ch_news->title;?></a></span>）</td>
		</tr>
		<tr class=tr4>
			<td width="130">标题/短标题</td><td width="695" align="left"><input id="title_en" type="text" name="news[title]" value="<?php echo $news->title;?>">　/　<input id="short_title_en" type="text" name="news[short_title]" value="<?php echo $news->short_title;?>"></td>
		</tr>
		<tr class=tr4>
			<td>分　类</td>
			<td align="left" class="newsselect1" >
			<span id="span_category1"></span>
			</td>
		</tr>
		<tr class=tr4 >
			<td>新闻类别</td>
			<td align="left" id="td_newstype_en">
				<input disabled=true type="radio" name="news_type" value="1" <?php if($news->news_type==1){ ?>checked="checked"<?php } ?>>默认
				<input disabled=true type="radio" name="news_type" value="2" <?php if($news->news_type==2){ ?>checked="checked"<?php } ?>>文件
				<input disabled=true type="radio" name="news_type" value="3" <?php if($news->news_type==3){ ?>checked="checked"<?php } ?>>URL
				<input type="hidden" name="news[news_type]" value="<?php echo $news->news_type;?>"></input>
			</td>
		</tr>
		<tr class=tr4>
			<td>关键词</td>
			<td align="left">
				<input type="text" size="20" name=news[keywords]  id="news_keywords_en"  value="<?php echo $news->keywords;?>">(空格分隔)
				<input type="hidden" size="10" name=news[priority] id="priority"  class="number" value="<?php echo $news->priority;?>"></td>
		</tr>
		<tr class=tr4 id=target_url_en>
			<td>URL</td><td align="left"><input type="text" size="50" name=news[target_url] value="<?php echo $news->target_url; ?>"></td>
		</tr>
		<tr class=tr4 id=tr_file_name_en >
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
		<input type="hidden" name="id"  value="<?php echo $news->id; ?>">
		<input type="hidden" name="chinese_id" value="<?php echo $ch_id;?>"></input>
	</form>

<script>
$(function(){
		category.display_select('category_select_en',$('#span_category1'),<?php echo $news->category_id;?>,'', function(id){			
			
		});
		$('select.category_select_en').attr('disabled',true);
	});	

</script>