<?php
	require_once('../../frame.php');
	judge_role();
	$id=intval($_REQUEST['id']);
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
	<title>福布斯中文网-用户管理</title>
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
			<td colspan="2">　 <?php if($id){echo "修改用户";}else{echo "添加用户";}?></td>
		</tr>
		<tr class=tr4>
			<td class=td1 width=130>用户名</td>
			<td width=665><input type="text" name="post[name]" value="<?php echo $user->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>拼音</td>
			<td><input type="text" name="post[chinese_name]" value="<?php echo $user->chinese_name;?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>密码</td>
			<td><input type="password" name="post[password]" value="<?php echo $user->password;?>" class="required" style="width:149px"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>昵称</td>
			<td><input type="text" name="post[nick_name]" value="<?php echo $user->nick_name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>用户身份</td>
			<td>
				<select name="post[role_name]" id="role_name" style="width:155px">
					<option value="journalist" <?php if($user->role_name=="journalist") echo "selected=selected"?>>记者</option>
					<option value="author" <?php if($user->role_name=="author") echo "selected=selected"?>>专栏作者</option>
					<option value="lister" <?php if($user->role_name=="lister") echo "selected=selected"?>>榜单管理员</option>
					<option value="member" <?php if($user->role_name=="member") echo "selected=selected"?>>普通会员</option>
					<option value="sys_admin" <?php if($user->role_name=="sys_admin") echo "selected=selected"?>>系统管理员</option>
					<option value="admin" <?php if($user->role_name=="admin") echo "selected=selected"?>>管理员</option>
				</select>
			</td>
		</tr>
		<tr class=tr3>
			<td colspan="2">
				<button type="submit">提 交</button>
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="hidden" name="post[role_level]" id="role_level" value="<?php echo $user->role_level;?>">
			</td>
		</tr>
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
			$('#role_level').val(1);
		}
			
	});
</script>
