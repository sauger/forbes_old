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
		js_include_tag('admin/magazine/edit','jquery.colorbox-min.js','../ckeditor/ckeditor.js');
	?>
</head>
<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_magazine');
	if(isset($_REQUEST['id']))
	{
		$record->find($id);
	}
?>
<body>
	<div id=icaption>
    <div id=title><?php if($id){echo '编辑杂志';}else{echo '添加杂志';}?></div>
	  <a href="index.php" id=btn_back></a>
	</div>
	<form enctype="multipart/form-data" action="edit.post.php" method="post"> 
<div id=itable>
		<table cellspacing="1"  align="center">
		<tr class=tr4>
			<td class=td1 width=15%>杂志名称</td>
			<td width=85%>
				<input type="text" name="post[name]" value="<?php echo $record->name;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>发布日期</td>
			<td>
				<input type="text" class="date_jquery" readonly=readonly name="post[publish_data]" value="<?php echo $record->publish_data;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>封面图片</td>
			<td><input type="file" name="post[img_src]"></input><?php if($record->img_src){?> <a href="<?php echo $record->img_src;?>" title="封面图片" target="_blank" class="colorbox">查看</a><?php }?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>首页导语</td>
			<td>
				<input type="text" style="width:300px;" name="post[short_title]" value="<?php echo $record->short_title;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>首页封面缩略图</td>
			<td><input type="file" name="post[img_src3]"></input><?php if($record->img_src3){?> <a href="<?php echo $record->img_src3;?>" title="首页封面缩略图" target="_blank" class="colorbox">查看</a><?php }?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>导语标题</td>
			<td>
				<input type="text" style="width:300px;" name="post[title]" value="<?php echo $record->title;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>导语图片</td>
			<td><input type="file" name="post[img_src2]"></input><?php if($record->img_src2){?> <a href="<?php echo $record->img_src2;?>" title="导语图片" target="_blank" class="colorbox">查看</a><?php }?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>杂志导语</td>
			<td>
				<?php show_fckeditor('post[description]','Admin',false,"215",$record->description);?>
			</td>
		</tr>
		<tr class="btools">
			<td colspan="10" align="center">
				<input id="submit" type="submit" value="完成">	
				<input type="hidden" name="id" value="<?php echo $id;?>">
			</td>
		</tr>	
	</table>
	</form>
</body>
</html>