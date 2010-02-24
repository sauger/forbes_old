<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/city/list');
		validate_form("city_edit");
	?>
</head>

<?php
	$db = get_db();
	$id = $_REQUEST['id'];
	$record = new table_class('fb_city_list');
	if ($id != '')
	{
		$record->find($id);
	}
?>

<body style="background:#E1F0F7">
	<form id="city_edit" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id!=''){echo '编辑榜单';}else{echo '添加榜单';}?>　<button type="button" id="add_attribute">添加一列</button></td>
		</tr>
		<tr class=tr4 id="list_name">
			<td width="130">榜单名称</td>
			<td width="695" align="left">
				<input type="text" name="name" value="<?php echo $record->name;?>">
			</td>
		</tr>
		<?php
			if($id!=''){
			$sql = "select * from fb_city_list_attribute where list_id=$id order by priority";
			$records = $db->query($sql);
			for($i=0;$i<count($records);$i++){
		?>
		<tr class=tr4 id="list_name">
			<td width="130">列名</td>
			<td width="695" align="left">
				<input type="text" name="old_attr_name[]" value="<?php echo $records[$i]->name;?>">　　　　优先级<input type="text" name="old_attr_priority[]" value="<?php echo $records[$i]->priority;?>">
				<button type="button" class="del_old">删除</button>
				<input type="hidden" name="old_id[]" value="<?php echo $records[$i]->id;?>">
			</td>
		</tr>
		<?php }}?>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>
	</table>
		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>">
	</form>
</body>
</html>