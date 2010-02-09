<?php
	require_once('../../frame.php');
	judge_role();
	$id=$_REQUEST['id'];
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
	<?
		css_include_tag('admin');
	?>
</head>
<?php
	validate_form("user_form");
?>
<body>
	<table width="795" border="0" id="list">
	<form id="user_form" method="post" action="user.post.php">
		<tr class=tr1>
			<td colspan="2">　<?php if($id){echo "修改用户";}else{echo "添加用户";}?></td>
		</tr>
		<tr class=tr3>
			<td width=150>用户名：</td>
			<td width=645 align="left"><input type="text" name="post[name]" value="<?php echo $user->name;?>" class="required"></td>
		</tr>
		<tr class=tr3>
			<td>密码：</td>
			<td align="left"><input type="password" name="post[password]" value="<?php echo $user->password;?>" class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>昵称：</td>
			<td width=645 align="left"><input type="text" name="post[nick_name]" value="<?php echo $user->nick_name;?>" class="required"></td>
		</tr>
		<tr class=tr3>
			<td width=150>用户身份：</td>
			<td width=645 align="left">
				<select name="post[role_name]" id="role_name">
					<option value="member" <?php if($user->role_name=="member") echo "selected=selected"?>>普通会员</option>
					<option value="sys_admin" <?php if($user->role_name=="sys_admin") echo "selected=selected"?>>系统管理员</option>
					<option value="admin" <?php if($user->role_name=="admin") echo "selected=selected"?>>管理员</option>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit">提 交</button></td>
		</tr>
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="post[role_level]" id="role_level" value="2">
	</form>
	</table>
</body>
</html>
<script>
	$('#role_name').change(function(){
		if($(this).val()=='admin'){
			$('#role_level').val(1)
		}else if($(this).val()=='sys_admin'){
			$('#role_level').val(2);
		}else{
			$('#role_level').val(0);
		}
			
	});
</script>
