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
		$db->query("select group_concat(a.industry_id SEPARATOR ',') as ids from fb_news_industry a left join fb_industry b on a.industry_id = b.id where a.news_id={$id}");
		if($db->move_first()){
			$news_industry = $db->field_by_name('ids');
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
<div id=icaption>
    <div id=title>发布新闻</div>
	  <a href="news_list.php" id=btn_back></a>
</div>
<div id=itable>
	<form id="news_edit" enctype="multipart/form-data" action="news.post.php" method="post"> 
	<table cellspacing="1" align="center">
		
		<?php if(has_right('schedule_news')){?>
		<tr class=tr4>
			<td class=td1 width="15%" >定时发布</td>
			<td width="85%"><input type="text" name="publish_schedule_date" id="publish_schedule" <?php if(!$publish_date) echo "disabled=true;";?> value="<?php echo $publish_date;?>"></input><input style="width:20px;" type="checkbox" id="publish_schedule_select" <?php if($publish_date) echo "checked='checked'"?>></input>(格式：2010-03-03 16:00:00)</td>
		</tr>
		<?php }?>
		
		<tr class=tr4>
			<td class=td1>标题</td>
			<td><input type="text" name="news[title]" id="news_title" value="<?php echo strip_tags($news->title);?>"></td>
		</tr>

		<tr class=tr4>
			<td class=td1>短标题</td>
			<td><input type="text" name="news[short_title]" id="news_short_title" value="<?php echo strip_tags($news->short_title);?>"></input></td>
		</tr>
		
		<tr class=tr4>
			<td class=td1>wap标题</td>
			<td><input type="text" name="news[wap_title]" id="news_wap_title" value="<?php echo strip_tags($news->wap_title);?>"></input></td>
		</tr>		

		<tr class=tr4>
			<td class=td1>分类</td>
			<td class="category_select"><span id="span_category"></span><a href="#" id="copy_news" style="color:blue">复制到其他分类</a></td>
		</tr>
		
		<tr class=tr4 style="display:none;" id="tr_copy_news">
			<td class=td1>复制到分类</td>
			<td><span id="span_category_copy"></span><a href="#" id="delete_copy_news" style="color:blue">删除</a><input type="hidden" name="copy_news" id="hidden_copy_news" value="0"></input></td>
		</tr>	
			
		<tr class=tr4>
			<td class=td1>作者</td>
			<td>
				<input type="text" style="width:200px" name="news[author]" id="news_author" value="<?php echo ($news->author ? $news->author : $_SESSION['admin_nick_name']);?>"></input>
				<select name="news[author_type]" id="news_author_type" style="width:200px">
					<option value="1" <?php if($news->author_type == 1) echo " selected='selected'"?>>采编智库</option>
					<option value="2" <?php if($news->author_type == 2||(empty($id)&&$_SESSION["role_name"]=='author')) echo " selected='selected'"?>>特约作者</option>
					<option value="3" <?php if($news->author_type == 3) echo " selected='selected'"?>>网站编辑</option>
				</select>
				<input type="hidden" name="news[author_id]" id="news_author_id" value="<?php if(empty($id)) echo $_SESSION['admin_user_id'];else echo $news->author_id;?>"></input>
				<input type="file" name="author_image" style="width:250px">
				头像:<span>(40*40最佳)</span>
				<?php if($news->author_image){?>
				<a href="<?php echo $news->author_image;?>" target="_blank">查看</a>
				<?php }?>
			</td>
		</tr>
		
		<tr class=tr4>
			<td class=td1>关键词</td>
			<td>
				<select multiple="multiple" id="sel_keywords">
					<?php $keywords = explode('||',$news->keywords);
						if(!empty($keywords)){
							foreach($keywords as $key){ 
								if(empty($key)) continue;
								?>
							<option value="<?php echo $key?>"><?php echo $key?></option>			
						<?php }
						}
					?>
				</select>
				<img src="/images/btn_delete.png" style="cursor:pointer; float:left;" id="delete_keyword" />
				<input type="text" id="auto_keywords" />
				<input type="hidden" name="news[keywords]" id="news_keywords"/>
				<img id="add_keyword" style="cursor:pointer; float:left;" src="/images/btn_add.png" />
			</td>
		</tr>

		<tr class=tr4 style="display:none">
			<td class=td1>优先级</td>
			<td><input type="text" name=news[priority] id="priority"  class="number" value="<?php echo $news->priority;?>">(0~100)</td>
		</tr>

		<tr class=tr4>
			<td class=td1>头条新闻关联</td>
			<td id="td_related_sub_headline">已关联　<span id="span_sub_headline"></span>　条新闻<a href="#" id="a_sub_headline" style="color:blue">编辑</a></td>
		</tr>
		
		<tr class=tr4>
			<td class=td1>相关新闻关联</td>
			<td id="td_related_news">已关联　<span id="span_related_news"></span>　条新闻<a href="#" id="a_related_news" style="color:blue">编辑</a></td>
		</tr>
		
		<tr class=tr4>
			<td class=td1>相关行业</td>
			<td id="td_related_industry">
				已关联　<span id="span_related_industry"></span>　个行业
				<a href="<?php echo $news->id;?>" id="a_related_industry" style="color:blue">编辑</a>
				<input type="hidden" id="hidden_related_industry" name="related_industry" value="<?php echo $news_industry;?>"></input>
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>上传PDF版</td>
			<td>
				<input type="file" name="pdf_src" id="pdf_src">
				<?php if($news->pdf_src){?>
				<a href="<?php echo $news->pdf_src?>" target="_blank">下载</a> <a href="#" id="a_delete_pdf">删除</a>
				<?php }?>
			</td>
		</tr>
		
		<tr class=tr4>
			<td class=td1>上传封面图片</td>
			<td>
				<input type="file" name="news_pic">
				<?php if($news->video_photo_src){?>
				<a href="<?php echo $news->video_photo_src?>" target="_blank">查看</a> <a href="#" id="a_delete_pic">删除</a>
				<?php }?>
				<span style="color:blue;">支持格式：jpg,png,gif，小于100K</span>
			</td>
		</tr>		
		<?php if($id!=''){?>
		
		<tr class="tr4">
			<td class=td1>英文版</td>
			<td>
			<?php if(!isset($english_id)) { ?>
			<a id="add_english_news" href="news_edit.php?chinese_id=<?php echo $news->id;?>">添加</a>
			<?php } else { ?>
			<a id="edit_english_news" href="news_edit.php?id=<?php echo $english_id;?>">编辑</a> <a id="delete_english_news" href="<?php echo $english_id;?>">删除</a>
			<?php } ?>
			</td>
		</tr>
		<?php }?>
		
		<tr class="tr4">
			<td  class=td1>放置广告</td>
			<td><input style="width:20px;"  type="checkbox" id="news_ad_id" <?php if($news->ad_id == 1) echo "checked='checked'";?>><label for="news_ad_id">放置广告</label><input type="hidden" id="input_news_ad_id" name="news[ad_id]" value="<?php echo $news->ad_id;?>"></input></td>
		</tr>

		<tr class="tr4">
			<td class=td1>禁止复制</td>
			<td><input style="width:20px;"  type="checkbox" id="news_forbbide_copy" <?php if($news->forbbide_copy == 1) echo "checked='checked'";?>></input><label for="news_forbbide_copy">禁止复制</label><input type="hidden" id="input_news_forbbide_copy"  name="news[forbbide_copy]" value="<?php echo $news->forbbide_copy;?>"></input></td>
		</tr>

		<tr class="tr4">
			<td class=td1>英文来源</td><td><?php show_fckeditor('news[top_info]','Admin',false,"100",$news->top_info);?></td>
		</tr>
		
		<tr class="tr4">
			<td  class=td1>简短描述</td><td><?php show_fckeditor('news[description]','Admin',false,"100",$news->description);?></td>
		</tr>
		
		<tr class="tr4">
			<td  class=td1>新闻内容</td><td><?php show_fckeditor('news[content]','Admin',false,"215",$news->content);?></td>
		</tr>
		
		<tr class="btools">
			<td colspan="2">
				<input id="submit" type="submit" value="提交">
				<input type="hidden" name="news[category_id]" id="category_id" value="<?php echo $news->category_id;?>">
				<input type="hidden" name="news[image_flag]" value="<?php echo $news->image_flag;?>" id="hidden_image_flag">
				<input type="hidden" name="id" id="hidden_news_id" value="<?php echo $news->id; ?>">
				<input type="hidden" name="news[related_news]" id="hidden_related_news" value="<?php echo $news->related_news ? $news->related_news : "";?>"></input>
				<input type="hidden" name="news[sub_headline]" id="hidden_sub_headline" value="<?php echo $news->sub_headline ? $news->sub_headline : "";?>"></input>
				<input type="hidden" name="news[is_adopt] value="<?php $news->is_adopt;?>"></input>	
			</td>
		</tr>	
	</table>
	</form>
</div>
<script>
$(function(){
		category.display_select('category_select',$('#span_category'),<?php echo $category_id;?>,'', function(id){			
		});
		category.display_select('category_select_copy',$('#span_category_copy'),<?php echo $category_id;?>,'', function(id){			
		});
	});	

</script>