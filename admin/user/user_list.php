<?php
	require_once('../../frame.php');
	judge_role();
	$user_title="添加用户"; 
	$user_table=$tb_user;
	function display_role($param) {
		if($param == 'sys_admin'){
			return '系统管理员';
		}elseif($param == 'admin'){
			return '管理员';
		}
	}
	$user = new table_class($user_table);
	$records = $user->find('all',array('order' => 'id desc'));
	$count = count($records);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
	?>
</head>
<body style="background:#E1F0F7">
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="5" width="795">　用户管理　<a href="user_edit.php" style="color:#0000FF"><?php echo $user_title;?></a></td>
		</tr>
		<tr class="tr2">
			<td width="205">用户名</td><td width="200">用户昵称</td><td width="180">用户身份</td><td width="250">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $records[$i]->id;?>">
			<td><?php echo $records[$i]->name;?></td>
			<td><?php echo $records[$i]->nick_name;?></td>
			<td><?php echo display_role($records[$i]->role_name);?></td>
			<td>	
				<a href="user_edit.php?id=<?php echo $records[$i]->id;?>" title="编辑" style="color:#000000; text-decoration:none"><img src="/images/btn_edit.png" border="0"></a> 
				<span style="color:#ff0000; cursor:pointer" class="del" title="删除" name="<?php echo $records[$i]->id;?>"><img src="/images/btn_delete.png" border="0"></span>
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

