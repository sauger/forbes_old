<?php
	require_once('../../frame.php');
	$role = judge_role();
	$id = $_REQUEST['id'];
	if($id!=''){
		$ad = new table_class('fb_ad');
		$ad->find($id);
	}
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>广告编辑</title>
	<?php
		css_include_tag('admin','thickbox');
		use_jquery();
		js_include_tag('thickbox');
		validate_form("ad");
	?>
</head>
	<body style="background:#E1F0F7">
	<form id="ad" action="asd.post.php" enctype="multipart/form-data" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id!='')echo "编辑广告";else echo "添加广告";?></td>
			
		</tr>
		<tr class=tr3>
			<td width="130">广告名</td><td width="695" align="left"><input type="text" name="ad[name]" value="<?php echo $ad->name;?>" ></td>
		</tr>

		<tr class=tr3>
			<td width="130">广告代码</td><td width="695" align="left"><input type="text" name="ad[code]" value="<?php echo $ad->code;?>" ></td>
		</tr>	
		<tr class=tr3>
			<td>广告位</td>
			<td align="left">
				<select id=select name="ad[ggw_id]">
					<option value=""></option>
					<?php
						$record = $db->query("select id,name from fb_ad_ggw order by priority");
						for($i=0;$i<count($record);$i++){
					?>
					<option <?php if($ad->ggw_id==$record[$i]->id echo 'selected="selected"';)?> value="<?php echo $record[$i]->id;?>"><?php echo $record[$i]->name;?></option>
					<?php }?>
				</select><span id="size"></span>
			</td>
		</tr>			
			
		<tr class=tr3 id=target_url>
			<td>优先级</td><td align="left"><input type="text" size="50" name="ad[priority]" value="<?php echo $ad->priority;?>"></td>
		</tr>
		<tr class=tr3 id=target_url>
			<td>跳转链接</td><td align="left"><input type="text" size="50" name="ad[url]" value="<?php echo $ad->url;?>"></td>
		</tr>

		<tr class=tr3 id=target_url>
			<td>文字广告</td><td align="left"><input type="text" size="50" name="ad[word_ad]" value="<?php echo $ad->word_ad;?>"></td>
		</tr>
		<tr class=tr3 id=tr_file_name >
			<td>上传图片</td>
			<td align="left">
				<input type="file" name="image" style="width:250px;">
			</td>
		</tr>
		<tr id=newsshow3  class="normal_news tr4">
			<td>上传视频</td>
			<td align="left" id="td_video">
				<input type="file" name="video" style="width:250px;">
			</td>
		</tr>
		<tr id=newsshow3  class="normal_news tr4">
			<td>上传FLASH</td>
			<td align="left" id="td_video">
				<input type="file" name="flash" style="width:250px;">
			</td>
		</tr>
		
		<tr  class="normal_news tr4">
			<td>广告关联</td><td align="left">
				<a style="color:blue;" href="filte_ad.php?width=600&height=400" class="thickbox">关联相关广告</a>
			</td>
		</tr>


	
		<tr class=tr3 id=target_url>
			<td>定期播放</td>			<td width="695" align="left"><input type="text" size="20" value="<?php echo $ad->day_time1;?>" name=ad[day_time1]>－<input type="text" size="20" value="<?php echo $ad->day_time2;?>" name=ad[day_time2]></td>

		</tr>

		<tr class=tr3 id=target_url>
			<td>定时播放</td><td align="left"><input type="text" size="50" name=ad[hour_time1] value="<?php echo $ad->hour_time1;?>">－<input type="text" size="50" name=ad[hour_time2] value="<?php echo $ad->hour_time2;?>"></td>
		</tr>
		<tr class=tr3 id=target_url>
			<td>延时播放</td><td align="left"><input type="text" size="50" name=ad[delay] value="<?php echo $ad->delay;?>">(分钟)</td>
		</tr>		

		<tr class=tr3 id=target_url>
			<td>千次展示</td><td align="left"><input type="text" size="50" name=ad[show_price] value="<?php echo $ad->show_price;?>">(元)</td>
		</tr>	
		
		<tr class=tr3 id=target_url>
			<td>千次点击</td><td align="left"><input type="text" size="50" name=ad[click_price] value="<?php echo $ad->click_price;?>">(元)</td>
		</tr>	
				
		<tr class=tr3 id=target_url>
			<td>千次弹框</td><td align="left"><input type="text" size="50" name=ad[box_price] value="<?php echo $ad->box_price;?>">(元)</td>
		</tr>			

		<tr class=tr3 id=target_url>
			<td>演示页面</td><td align="left"><input type="text" size="50" name=ad[show_page] value="<?php echo $ad->show_page;?>"></td>
		</tr>		

		<tr id=newsshow1  class="normal_news tr3">
			<td  height=160>简短描述</td>
			<td>
				<?php show_fckeditor('ad[description]','Admin',true,"265",$ad->description);?>
			</td>
		</tr>				
	<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布广告"></td>
		</tr>			
			</table>
		<input type="hidden" name="news[related_news]" value="" id="hidden_related_news">
		<input type="hidden" name="news[sub_news_id]" value=""  id="hidden_sub_headlines">
		<input type="hidden" name="news[category_id]" id="category_id" value="4">
		<input type="hidden" name="category_add" id="category_add" value="">
		<input type="hidden" name="news[image_flag]" value="0" id="hidden_image_flag">
		<input type="hidden" name="news[forbbide_copy]" value="" id="hidden_forbbide_copy">
		<input type="hidden" name="id"  value="20475">
		<input type="hidden" name="news[vote_id]"  id="vote_id" value="">
		<input type="hidden" name="subject_id" value="" id="hidden_subject_id">
		<input type="hidden" name="subject_category_id" value="''" id="hidden_subject_category_id">		
		<input type="hidden" name="delete_subject" id="hidden_delete_subject" value="0">
		<input type="hidden" name="news[is_commentable]" value="1" id="hidden_is_commentable">
		<input type="hidden" name="news[related_videos]" value="" id="hidden_related_videos">
	</form>
</body>
</html>

<script>
	$(function(){
		
		$('#delete_vote').click(function(e){
			e.preventDefault();
			str = '<a href="add_vote.php?width=600&height=400" class="thickbox" id="a_vote_id" style="color:blue;">关联投票</a>';
			$('#td_vote').html(str);
			$('#vote_id').val('0');
			tb_init('#a_vote_id');
		});
		$('#edit_vote').click(function(e){
			e.preventDefault();
			window.location.href="/admin/vote/vote_edit.php?id=" + $('#vote_id').val();
		});
		
		$('#delete_subject').click(function(e){
			e.preventDefault();
			str = '<a style="color:blue;" href="assign_subject.php?width600&height=400" class="thickbox" id="a_assign_subject">关联专题</a>';
			$('#td_subject').html(str);
			tb_init('#a_assign_subject');
			//$('#hidden_subject_id,#subject_category_id').val('0');
			$('#hidden_delete_subject').val('2');
		});
		if( $('#hidden_sub_headlines').attr('value')){
			sub_headlines = $('#hidden_sub_headlines').attr('value').split(",");
		}
		if($('#hidden_related_news').attr('value')){
			related_news = $('#hidden_related_news').attr('value').split(",");
		}
		if($('#hidden_related_videos').attr('value')){
			related_videos = $('#hidden_related_videos').attr('value').split(",");
		}
		
	});



	

</script>