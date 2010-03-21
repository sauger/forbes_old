<?php
	require_once('../../frame.php');
	judge_role();
	$id=$_SESSION['admin_user_id'];
	$user1 = new table_class($tb_user);
	if($id)	{
		$user = $user1->find($id);
	}
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
		js_include_tag('admin/user/modify_user_info','../ckeditor/ckeditor.js');
	?>
</head>
<body>
	<table width="795" border="0" id="list">
	<form id="user_form" enctype="multipart/form-data"  method="post" action="modify_user_info.post.php">
		<tr class=tr1>
			<td colspan="2">修改账号信息</td>
		</tr>
		<tr class=tr4>
			<td >头像</td>
			<td width=645 align="left">
			<?php if($user->image_src){?>
			<img src="<?php echo $user->image_src;?>">
			<?php }?>
			<input type="file" name="image_src"></input>
			</td>
		</tr>		
		<tr class=tr4>
			<td width=150>用户名：</td>
			<td width=645 align="left"><?php echo $user->name;?></td>
		</tr>
		<tr class=tr4>
			<td width=150>昵称：</td>
			<td width=645 align="left"><?php echo $user->nick_name;?></td>
		</tr>
		<tr class=tr4>
			<td>专栏名：</td>
			<td width=645 align="left"><input type="text" value="<?php echo $user->column_name;?>" name="column_name"></td>
		</tr>
		<tr class=tr4>
			<td>密码：</td>
			<td width=645 align="left"><input type="password" name="old_password"></td>
		</tr>
		<tr class=tr4>
			<td>新密码：</td>
			<td width=645 align="left"><input type="password" name="new_password" id="new_password"></input></td>
		</tr>
		<tr class=tr4>
			<td>确认新密码：</td>
			<td width=645 align="left"><input type="password" id="re_new_password"></input></td>
		</tr>
		<tr class=tr4>
			<td>个人简介：</td>
			<td><?php show_fckeditor('description','Admin',false,"215",$user->description);?></input></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button id="btn_submit" type="submit">提 交</button></td>
		</tr>
	</form>
	</table>
</body>
</html>
