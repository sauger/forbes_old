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
		css_include_tag('admin','colorbox');
		use_jquery();
		js_include_tag('jquery.colorbox-min','admin/ad/ad_edit');
		validate_form("ad");
	?>
</head>
	<body style="background:#E1F0F7">
	<form id="ad" action="ad_edit.post.php" enctype="multipart/form-data" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id!='')echo "编辑广告";else echo "添加广告";?></td>
			
		</tr>
		<tr class=tr3>
			<td width="130">广告名</td><td width="695" align="left"><input type="text" name="ad[name]" class="required" value="<?php echo $ad->name;?>" ></td>
		</tr>

		<tr class=tr3>
			<td width="130">广告代码</td><td width="695" align="left"><input type="text" name="ad[code]" class="required" value="<?php echo $ad->code;?>" ></td>
		</tr>	
		<tr class=tr3>
			<td>广告位</td>
			<td align="left">
				<select id=select class="required" name="ad[ggw_id]">
					<option value=""></option>
					<?php
						$record = $db->query("select id,name from fb_ad_ggw order by priority");
						for($i=0;$i<count($record);$i++){
					?>
					<option <?php if($ad->ggw_id==$record[$i]->id) echo 'selected="selected"';?> value="<?php echo $record[$i]->id;?>"><?php echo $record[$i]->name;?></option>
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
				<input type="file" name="image" style="width:250px;"><?php if($ad->image!=''){?><a class="color" title="图片展示" href="<?php echo $ad->image;?>">点击查看</a><?php }?>
			</td>
		</tr>
		<tr id=newsshow3  class="normal_news tr4">
			<td>上传视频</td>
			<td align="left" id="td_video">
				<input type="file" name="video" style="width:250px;"><?php if($ad->video!=''){?><a class="color" title="视频展示" href="/admin/show/show_video.php?id=<?php echo $id;?>&table=fb_ad">点击查看</a><?php }?>
			</td>
		</tr>
		<tr id=newsshow3  class="normal_news tr4">
			<td>上传FLASH</td>
			<td align="left" id="td_video">
				<input type="file" name="flash" style="width:250px;"><?php if($ad->flash!=''){?><a class="color" title="flash展示" href="/admin/show/show_flash.php?id=<?php echo $id;?>&table=fb_ad">点击查看</a><?php }?>
			</td>
		</tr>
		
		
		<tr  class="normal_news tr4">
			<td>广告关联</td><td align="left">
				<?php if($ad->relationship==''){?>
				<span style="color:#0000FF;cursor:pointer" title="关联广告" id="add_related_ad">关联相关广告</span>
				<?php }else{
					$related = explode(",", $ad->relationship);
				?>
				<span style="color:#0000FF;cursor:pointer" title="关联广告" id="add_related_ad">已关联相关新闻 <?php echo count($related);?> 条　编辑</span>
				<?php }?>
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
			<td height=160>简短描述</td>
			<td>
				<?php show_fckeditor('ad[description]','Admin',true,"160",$ad->description);?>
			</td>
		</tr>				
	<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布广告"></td>
		</tr>			
			</table>
		<input type="hidden" name="id"  value="<?php echo $id;?>">
		<input type="hidden" name="ad[relationship]" id="hidden_related_ad" value="<?php echo $ad->relationship;?>">
	</form>
</body>
</html>
<script>
		var related_ad = new Array();
		var old_href = "<?php echo 'filte_ad.php?id='.$id;?>";
		var ad_href = "<?php echo 'filte_ad.php?id='.$id;?>&related="+$('#hidden_related_ad').val()
		$(function(){
			<?php if($id!=''){
			$relationship = explode(',',$ad->relationship);
			for($i=0;$i<count($relationship);$i++){
			?>
			related_ad.push(<?php echo $relationship[$i];?>);
			<?php }}?>
			$('#add_related_ad').colorbox({href:ad_href});
			$('.color').colorbox();
		});
		
		
		
		
</script>