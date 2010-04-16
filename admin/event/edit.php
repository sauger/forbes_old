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
	$record = new table_class('fb_event');
	if(isset($_REQUEST['id']))
	{
		$record->find($id);
	}
?>
<body>
<div id=icaption>
    <div id=title>发布活动</div>
	  <a href="index.php" id=btn_back></a>
</div>
<div id=itable>
	<form enctype="multipart/form-data" action="edit.post.php" method="post"> 
	<table cellspacing="1"  align="center">
		<tr class=tr4>
			<td class=td1 width=15%>名称</td>
			<td width=85%>
				<input type="text" name="post[title]" value="<?php echo $record->title;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>日期</td>
			<td>
				<input type="text" name="post[time]" value="<?php echo $record->time;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>地点</td>
			<td><input type="text" name="post[place]" value="<?php echo $record->place;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>对应页面</td>
			<td>
				<input type="text"  name="post[url]" value="<?php echo $record->url;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>封面图片</td>
			<td><input type="file" name="post[image]"></input><?php if($record->image){?> <a href="<?php echo $record->image;?>" title="封面图片" target="_blank" class="colorbox">查看</a><?php }?></td>
		</tr>
		<tr class="btools">
			<td colspan="10">
				<input id="submit" type="submit" value="完成">	
				<input type="hidden" name="id" value="<?php echo $id;?>">
			</td>
		</tr>	
	</table>
	</form>
</div>
</body>
</html>
<script>
	$(function(){
		$(".colorbox").colorbox();
	});
</script>