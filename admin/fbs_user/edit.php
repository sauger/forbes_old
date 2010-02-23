<?php
	require_once('../../frame.php');
	$db = get_db();
	$id = $_REQUEST['id'];
	if($id!=''){
		$user = new table_class('fb_yh');
		$user->find($id);
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		//validate_form("famous_edit");
	?>
</head>
<body style="background:#E1F0F7">
	<form id="famous_edit" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　编辑用户</td>
		</tr>
		<tr class=tr4>
			<td width="130">用户名</td>
			<td width="695" align="left">
				<?php echo $user->name;?>
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">密码</td>
			<td width="695" align="left">
				<input type="password" name="user[password]" value="<?php echo $user->password;?>">
			</td>
		</tr>
		<tr class=tr4>
			<td width="130">电子邮箱</td>
			<td width="695" align="left">
				<?php echo $user->email;?>
			</td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" value="<?php echo $id;?>">
	</form>
</body>
</html>