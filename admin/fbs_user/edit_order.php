<?php
	require_once('../../frame.php');
	$id = $_REQUEST['id'];
	if($id!=''){
		$user = new table_class('fb_yh');
		$user->find($id);
	}
	$db = get_db();
	$order = $db->query('select * from fb_yh_dy where yh_id='.$id);
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
	<form id="famous_edit" action="edit_order.post.php" method="post"> 
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
			<td>精华推荐</td>
			<td align="left">
			    订阅<input name="jhtj" <?php if($order[0]->jhtj==1)echo 'checked="checked"'?> type="checkbox">
			</td>
		</tr>
		<tr class=tr4>
			<td>分类文章</td>
			<td align="left">
			    富豪<input name="fh" <?php if($order[0]->fh==1)echo 'checked="checked"'?> type="checkbox">
				创业<input name="cy" <?php if($order[0]->cy==1)echo 'checked="checked"'?> type="checkbox">
				商业<input name="sy" <?php if($order[0]->sy==1)echo 'checked="checked"'?> type="checkbox">
				科技<input name="kj" <?php if($order[0]->kj==1)echo 'checked="checked"'?> type="checkbox">
				投资<input name="tz" <?php if($order[0]->tz==1)echo 'checked="checked"'?> type="checkbox">
				生活<input name="sh" <?php if($order[0]->sh==1)echo 'checked="checked"'?> type="checkbox">
			</td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" value="<?php echo $order[0]->id;?>">
	</form>
</body>
</html>