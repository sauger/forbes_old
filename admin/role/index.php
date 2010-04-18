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
<body>
	<div id=icaption>
	    <div id=title>角色管理</div>
		 <a href="edit.php" id=btn_add></a>
	</div>
	<div id="itable">
		<table cellspacing=1 border="0">
			<tr class="itable_title">
				<td width="20%">角色标识</td><td width="20%">角色名称</td><td width="40%">说明</td><td width="20%">操作</td>
			</tr>
			<?php for($i=0;$i<$count;$i++){
			?>
			<tr class="tr3" id="<?php echo $records[$i]->id;?>">
				<td><?php echo $roles[$i]->name;?></td>
				<td><?php echo $roles[$i]->nick_name;?></td>
				<td><?php echo $roles[$i]->comment;?></td>
				<td>	
					<a href="edit.php?id=<?php echo $roles[$i]->id;?>" title="编辑" style="color:#000000; text-decoration:none"><img src="/images/btn_edit.png" border="0"></a>
					<span name="<?php echo $roles[$i]->id;?>" class="del" title="删除" style="color:#000000; text-decoration:none"><img src="/images/btn_delete.png" border="0"></span> 
				</td>
			</tr>
			<? }?>
		</table>
		<input type="hidden" id="db_table" value="fb_role">
	</div>	
</body>
</html>

