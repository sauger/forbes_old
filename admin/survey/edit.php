<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('colorbox','admin');
		use_jquery();
		js_include_tag('jquery.colorbox-min.js','../ckeditor/ckeditor.js');
	?>
</head>
<?php
	$db = get_db();
	$id = intval($_REQUEST['id']);
	$record = new table_class('fb_survey');
	if(isset($_REQUEST['id']))
	{
		$record->find($id);
	}
?>
<body>
<div id=icaption>
    <div id=title>发布调查问卷</div>
	 <a href="index.php" id=btn_back></a>
</div>
<div id=itable>
	<form enctype="multipart/form-data" action="edit.post.php" method="post"> 
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1 width="15%">问卷名称</td>
			<td  width="85%">
				<input type="text" name="post[name]" value="<?php echo $record->name;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>问卷图片</td>
			<td><input type="file" name="post[image]"></input><?php if($record->image){?> <a href="<?php echo $record->image;?>" title="问卷图片" target="_blank" class="colorbox">查看</a><?php }?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>优先级</td>
			<td>
				<input type="text" style="width:300px;" name="post[priority]" value="<?php echo $record->prioity;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>问卷描述</td>
			<td>
				<?php show_fckeditor('post[description]','Admin',false,"215",$record->description);?>
			</td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center">
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