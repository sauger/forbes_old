<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>图片榜单编辑</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/list/edit');
		validate_form("list_edit");
	?>
</head>

<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_custom_list_type');
	if ($id)
	{
		$record->find($id);
	}
?>

<body style="background:#E1F0F7">
	<form id="list_edit" action="picture_list_edit.post.php" enctype="multipart/form-data"  method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id){echo '编辑榜单';}else{echo '添加榜单';}?></td>
		</tr>
		<tr class=tr4 id="list_name">
			<td width="130">榜单名称</td>
			<td width="695" align="left">
				<input type="text" name="mlist[name]" value="<?php echo $record->name;?>" class="required">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">优先级</td><td width="695" align="left"><input type="text" name="mlist[priority]"></input></td>
		</tr>
		<tr class=tr4>
			<td width="130">推荐优先级</td><td width="695" align="left"><input type="text" name="mlist[recommend_priority]"></input></td>
		</tr>
		<tr class=tr4>
			<td width="130">榜单图片</td>
			<td width="695" align="left"><input type="file" name="image_src"></input><?php if($record->image_src){?> <a href="<?php echo $record->image_src;?>" target="_blank" style="color:blue;">查看</a><?php }?></td>
		</tr>
		<tr class=tr3>
			<td width="130">说明</td><td width="695" align="left"><textarea rows="10" cols="60" name="mlist[comment]"><?php echo $record->comment;?></textarea> </td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="保　　　存"></td>
		</tr>
	</table>
		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>">
		<input type="hidden" name="mlist[list_type]" value="4"></input>
	</form>
</body>
</html>