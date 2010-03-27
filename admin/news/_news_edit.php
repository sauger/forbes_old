<?php
	if($id){
		$category_id = $news->category_id;
		$db = get_db();
		$db->query("select english_news_id from fb_news_relationship where chinese_news_id = $id ");
		if ($db->move_first()){
			$english_id = $db->field_by_index(0);		
		}
		$db->query("select publish_date,resource_id from fb_publish_schedule where resource_id = {$id} and resource_type='news'");
		if ($db->move_first()){
			$publish_date = $db->field_by_name('publish_date');
		}
	}else{
		$category_id = -1;
	}
	if (!$news->news_type){
		$news->news_type = 1;
	}
	if($_SESSION["role_name"]=='author'||$_SESSION["role_name"]=='journalist')$href="/admin/column/news_list.php";else $href="news_list.php";
	$related_news = $news->related_news  ? explode(',',$news->related_news) : array();
	$sub_headline = $news->sub_headline  ? explode(',',$news->sub_headline) : array();
?>
	<form id="news_edit" enctype="multipart/form-data" action="news.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">
				发布新闻 <a href="<?php echo $href;?>"><img src="/images/btn_back.png" border=0></a>
				<?php if($_SESSION['role_name'] == 'admin' || $_SESSION['role_name'] == 'sys_admin'){?>
				定时发布 <input type="checkbox" id="publish_schedule_select" <?php if($publish_date) echo "checked='checked'"?>></input> <input type="text" name="publish_schedule_date" id="publish_schedule" style="width:160px;" <?php if(!$publish_date) echo "disabled=true;";?> value="<?php echo $publish_date;?>"></input>(格式：2010-03-03 16:00:00)
				<?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">标题</td>
			<td width="695" align="left">
				<input type="text" style="width:400px" name="news[title]" id="news_title" value="<?php echo strip_tags($news->title);?>">
			</td>
		</tr>

		<tr class=tr4>
			<td width="130">短标题</td>
			<td width="695" align="left">
				<input type="text" style="width:400px" name="news[short_title]" id="news_short_title" value="<?php echo strip_tags($news->short_title);?>"></input>
			</td>
		</tr>
		
		<tr class=tr4>
			<td width="130">wap标题</td>
			<td width="695" align="left">
				<input type="text" style="width:400px" name="news[wap_title]" id="news_wap_title" value="<?php echo strip_tags($news->wap_title);?>"></input>
			</td>
		</tr>		

		<tr class=tr4>
			<td>分　类</td>
			<td align="left" class="newsselect1" >
				<span id="span_category"></span>
				<a href="#" id="copy_news" style="color:blue">复制到其他分类</a>
			</td>
		</tr>
		<tr class=tr4 style="display:none;" id="tr_copy_news">
			<td>复制到分类</td>
			<td align="left">
				<span id="span_category_copy"></span>
				<a href="#" id="delete_copy_news" style="color:blue">删除</a>
				<input type="hidden" name="copy_news" id="hidden_copy_news" value="0"></input>
			</td>
		</tr>		
		<tr class=tr4>
			<td>作　者</td>
			<td align="left" class="newsselect1" >
				<input style="width:200px" type="text" name="news[author]" id="news_author" value="<?php echo ($news->author ? $news->author : $_SESSION['admin_nick_name']);?>"></input>
				<select name="news[author_type]" id="news_author_type">
					<option value="1" <?php if($news->author_type == 1) echo " selected='selected'"?>>采编智库</option>
					<option value="2" <?php if($news->author_type == 2||(empty($id)&&$_SESSION["role_name"]=='author')) echo " selected='selected'"?>>特约作者</option>
					<option value="3" <?php if($news->author_type == 3) echo " selected='selected'"?>>网站编辑</option>
				</select>
				头像:<input type="file" name="author_image">
				<?php if($news->author_image){?>
				<a href="<?php echo $news->author_image;?>" target="_blank">查看</a>
				<?php }?>
				<span>(40*40最佳)</span>
				<input type="hidden" name="news[author_id]" id="news_author_id" value="<?php if(empty($id)) echo $_SESSION['admin_user_id'];else echo $news->author_id;?>"></input>
			</td>
		</tr>
		<tr class=tr4>
			<td>关键词</td>
			<td align="left">
				<input type="text" style="width:400px" name=news[keywords]  id="news_keywords"  value="<?php echo $news->keywords;?>">(空格分隔) 
			</td>
		</tr>

		<tr class=tr4 style="display:none">
			<td>优先级</td>
			<td align="left">
				<input type="text" style="width:400px" name=news[priority] id="priority"  class="number" value="<?php echo $news->priority;?>">(0~100)
			</td>
		</tr>

		
		<tr class=tr4>
			<td>头条新闻关联</td>
			<td align="left" id="td_related_sub_headline">
				已关联　<span id="span_sub_headline"></span>　条新闻
			<a href="#" id="a_sub_headline" style="color:blue">编辑</a>
			</td>
		</tr>
		<tr class=tr4>
			<td>相关新闻关联</td>
			<td align="left" id="td_related_news">
				已关联　<span id="span_related_news"></span>　条新闻
				<a href="#" id="a_related_news" style="color:blue">编辑</a>
			</td>
		</tr>
		<tr class=tr4>
			<td>上传PDF版</td>
			<td align="left">
				<input type="file" name="pdf_src" id="pdf_src">
				<?php if($news->pdf_src){?>
				<a href="<?php echo $news->pdf_src?>" target="_blank">下载</a> <a href="#" id="a_delete_pdf">删除</a>
				<?php }?>
			</td>
		</tr>
		<tr class=tr4>
			<td>上传封面图片</td>
			<td align="left">
				<input type="file" name="news_pic">
				<?php if($news->video_photo_src){?>
				<a href="<?php echo $news->video_photo_src?>" target="_blank">查看</a> <a href="#" id="a_delete_pic">删除</a>
				<?php }?>
				<span style="color:blue;">支持格式：jpg,png,gif，小于100K</span>
			</td>
		</tr>		
		<?php if($id!=''){?>
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
		<?php }?>
		<tr class="tr4">
			<td>放置广告</td>
			<td align="left">
				<input type="checkbox" id="news_ad_id" <?php if($news->ad_id == 1) echo "checked='checked'";?>><label for="news_ad_id">放置广告</label></input><input type="hidden" id="input_news_ad_id" name="news[ad_id]" value="<?php echo $news->ad_id;?>"></input>
			</td>
		</tr>

		<tr class="tr4">
			<td>禁止复制</td>
			<td align="left">
				<input type="checkbox" id="news_forbbide_copy" <?php if($news->forbbide_copy == 1) echo "checked='checked'";?>></input><label for="news_forbbide_copy">禁止复制</label><input type="hidden" id="input_news_forbbide_copy"  name="news[forbbide_copy]" value="<?php echo $news->forbbide_copy;?>"></input>
			</td>
		</tr>

		<tr id=newsshow1  class="normal_news tr4">
			<td  height=100>英文来源</td><td><?php show_fckeditor('news[top_info]','Admin',false,"80",$news->top_info);?></td>
		</tr>
		<tr id=newsshow1  class="normal_news tr4">
			<td  height=100>简短描述</td><td><?php show_fckeditor('news[description]','Admin',false,"80",$news->description);?></td>
		</tr>
		<tr id=newsshow1 class="normal_news tr4">
			<td height=215>新闻内容</td><td><?php show_fckeditor('news[content]','Admin',false,"215",$news->content);?></td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布新闻"></td>
		</tr>	
	</table>
		<input type="hidden" name="news[category_id]" id="category_id" value="<?php echo $news->category_id;?>">
		<input type="hidden" name="news[image_flag]" value="<?php echo $news->image_flag;?>" id="hidden_image_flag">
		<input type="hidden" name="id" id="hidden_news_id" value="<?php echo $news->id; ?>">
		<input type="hidden" name="news[related_news]" id="hidden_related_news" value="<?php echo $news->related_news ? $news->related_news : "";?>"></input>
		<input type="hidden" name="news[sub_headline]" id="hidden_sub_headline" value="<?php echo $news->sub_headline ? $news->sub_headline : "";?>"></input>
		<input type="hidden" name="news[is_adopt] value="<?php $news->is_adopt;?>"></input>	
		</form>

<script>
$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){			
		});
		category.display_select('category_select_copy',$('#span_category_copy'),<?php echo $category_id;?>,'', function(id){			
		});
	});	

</script>