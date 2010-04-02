<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('jquery_ui','colorbox','admin');
		use_jquery_ui();
		js_include_tag('jquery.colorbox-min.js');
	?>
</head>
<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_activity');
	if(isset($_REQUEST['id']))
	{
		$record->find($id);
	}
?>
<body style="background:#E1F0F7">
	<form enctype="multipart/form-data" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　 发布活动 <a href="index.php"><img src="/images/btn_back.png" border=0></a></td>
		</tr>
		<tr class=tr4>
			<td class=td1>活动名称</td>
			<td width=660>
				<input type="text" name="post[title]" value="<?php echo $record->title;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>活动日期</td>
			<td>
				<input type="text" name="post[time]" value="<?php echo $record->time;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>活动地点</td>
			<td><input type="text" name="post[place]" value="<?php echo $record->place;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>活动对应页面</td>
			<td>
				<input type="text"  name="post[url]" value="<?php echo $record->url;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>封面图片</td>
			<td><input type="file" name="post[image]"></input><?php if($record->image){?> <a href="<?php echo $record->image;?>" title="封面图片" target="_blank" class="colorbox">查看</a><?php }?></td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center">
				<input id="submit" type="submit" value="完成">	
				<input type="hidden" name="id" value="<?php echo $id;?>">
			</td>
		</tr>	
	</table>
	</form>
</body>
</html>
<script>
	$(function(){
		$(".colorbox").colorbox();
	});
</script>