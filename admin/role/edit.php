<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网-角色管理</title>
	<?
		require_once('../../frame.php');
		$id= intval($_REQUEST['id']);
		$db = get_db();
		$rights = $db->query("select * from fb_rights");		
		css_include_tag('admin');
		$role = new table_class('fb_role');
		$has_rights = array();
		if($id){
			$has_rights_a = $db->query("select * from fb_role_rights where role_id={$id}");
			foreach ($has_rights_a as $v) {
				$has_rights[] = $v->id;
			}
			$role->find($id);
		}
	?>
</head>
<?php
	validate_form("user_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="user_form" method="post" action="edit.post.php">
		<tr class=tr1>
			<td colspan="2">　<?php if($id){echo "修改角色";}else{echo "添加新角色";}?></td>
		</tr>
		<tr class=tr3>
			<td width=150>角色标识：</td>
			<td width=645 align="left"><input type="text" name="role[name]" value="<?php echo $role->name;?>" class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>角色名称：</td>
			<td width=645 align="left"><input type="text" name="role[nick_name]" value="<?php echo $role->nick_name;?>" class="required"></td>
		</tr>
		<tr class=tr3>
			<td>说明：</td>
			<td align="left"><input type="text" name="role[password]" value="<?php echo $role->comment;?>"></td>
		</tr>
		<tr class=tr3>
			<td width=150>权限配置：</td>
			<td width=645 align="left">
				<?php foreach ($rights as $v) { ?>
					<input type="checkbox" name="rights[]" value="<?php echo $v->id?>" <?php if(in_array($v->id,$has_rights)) echo "checked='checked'"?>></input><?php echo $v->name;?>
				<?php }?>
			</td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	</form>
	</table>
</body>
</html>
