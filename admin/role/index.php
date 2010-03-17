<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网-角色管理</title>
	<?php 
		require_once('../../frame.php');
		require_role('sys_admin');
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
		$db = get_db();
		$roles = $db->query("select * from fb_role");
		$count = count($roles);
	?>
</head>
<body style="background:#E1F0F7">
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="5" width="795">　角色管理　<a href="edit.php" style="color:#0000FF">添加新角色</a></td>
		</tr>
		<tr class="tr2">
			<td width="205">角色名称</td><td width="200">说明</td><td width="250">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){
			if($roles[$i]->name == 'sys_admin') continue;
		?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><?php echo $roles[$i]->name;?></td>
			<td><?php echo $roles[$i]->comment;?></td>
			<td>	
				<a href="edit.php?id=<?php echo $roles[$i]->id;?>" title="编辑" style="color:#000000; text-decoration:none"><img src="/images/btn_edit.png" border="0"></a>
				<a href="<?php echo $roles[$i]->id;?>" title="删除" style="color:#000000; text-decoration:none"><img src="/images/btn_delete.png" border="0"></a> 
			</td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="<?php echo $user_table;?>">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>
