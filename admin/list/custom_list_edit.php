<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>自定义榜单编辑</title>
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
	<form id="list_edit" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id){echo '编辑榜单';}else{echo '添加榜单';}?>　<button type="button" id="add_attribute">添加一列</button></td>
		</tr>
		<tr class=tr4 id="list_name">
			<td width="130">榜单名称</td>
			<td width="695" align="left">
				<input type="text" name="name" value="<?php echo $record->name;?>" class="required">
			</td>
		</tr>
		<?php
			if($id && $record->table_name){
			$table = new table_class($record->table_name);
			foreach($table->fields as $k => $v){
				if($k == 'id') continue;
		?>
		<tr class="tr4">
			<td width="130">列名</td>
			<td width="695" align="left">
				<input type="text" name="list[<?php echo $k;?>][comment]" value="<?php echo $v->comment;?>" class="required">
				<select name="list[<?php echo $k;?>][type]">
					<option value="varchar(255)" <?php if($v->type == 'varchar(255)') echo "selected='selected'";?>>字符串</option>
					<option value="int(11)" <?php if($v->type == 'int(11)') echo "selected='selected'";?>>整数</option>
					<option value="float" <?php if($v->type == 'float') echo "selected='selected'";?>>浮点数</option>
					<option value="text" <?php if($v->type == 'text') echo "selected='selected'";?>>长字符串</option>
				</select>
				<input name="list[<?php echo $k;?>][key]" value="MUL" type="checkbox" <?php if($v->key == 'MUL') echo "checked='checked'"?>></input>排序
				<input name="list[<?php echo $k;?>][key]" value="UNI"  type="checkbox" <?php if($v->key == 'UNI') echo "checked='checked'"?>></input>唯一
				<input type="hidden" value="<?php echo $k;?>"></input>
				<img alt="删除" title="删除" src="/images/btn_delete.png" style="cursor:pointer;" class="del_old del_column">
			</td>
		</tr>
		<?php }}?>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="保　　　存"></td>
		</tr>
	</table>
		<input type="hidden" name="id" id="id"  value="<?php echo $record->id; ?>">
	</form>
</body>
</html>