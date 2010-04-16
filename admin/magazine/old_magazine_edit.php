<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>forbes</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('jquery_ui','admin');
		use_jquery();
		validate_form("old_magazine");
	?>
</head>
<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_old_magazine');
	if(isset($_REQUEST['id']))
	{
		$record->find($id);
	}
?>
<body>
<div id=icaption>
    <div id=title>发布往期杂志</div>
	  <a href="index.php" id=btn_back></a>
</div>
<div id=itable>
	<form id="old_magazine" action="old_magazine_edit.post.php" method="post"> 
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1 width="15%">杂志名称(刊号)</td>
			<td width="85%">
				<input type="text" name="post[name]" class="required" value="<?php echo $record->name;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>所属年份</td>
			<td>
				<input type="text" name="post[year]" class="required number" value="<?php echo $record->year;?>">(请输入4位数字年份)
			</td>
		</tr>
		<tr class=tr4>
			<td class=td1>杂志链接</td>
			<td><input type="text" name="post[url]" value="<?php echo $record->url;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>优先级</td>
			<td>
				<input type="text" class="number" name="post[priority]" value="<?php echo $record->priority;?>">
			</td>
		</tr>
		<tr class="btools">
			<td colspan="2">
				<input id="submit" type="submit" value="完成">	
				<input type="hidden" name="id" value="<?php echo $id;?>">
			</td>
		</tr>	
	</table>
	</form>
</div>
</body>
</html>
