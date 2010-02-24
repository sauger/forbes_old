<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>富豪编辑</title>
	<?php 
		require_once('../../frame.php');
		css_include_tag('admin');
		use_jquery();
		validate_form("city_edit");
	?>
</head>

<?php
	$id = $_REQUEST['id'];
	$city = new table_class('fb_city');
	if ($id != '')
	{
		$city->find($id);
	}
?>

<body style="background:#E1F0F7">
	<form id="city_edit" action="edit.post.php" method="post"> 
	<table width="795" border="0">
		<tr class=tr1>
			<td colspan="2" width="795">　　<?php if($id!=''){echo '编辑城市';}else{echo '添加城市';}?></td>
		</tr>
		<tr class=tr4>
			<td width="130">城市名称</td><td width="695" align="left"><input type="text" name="city[name]" value="<?php echo $city->name;?>"></td>
		</tr>
		<tr class=tr4>
			<td width="130">所属省份</td><td width="695" align="left"><input type="text" name="city[province_name]" value="<?php echo $city->province_name;?>"></td>
		</tr>
		<tr class=tr4>
			<td width="130">行政级别</td><td width="695" align="left">
				<select name="city[level]">
				 	<option value=""></option>
					<option <?php if($city->level==1)echo 'selected="selected"';?> value="1">直辖市</option>
					<option <?php if($city->level==2)echo 'selected="selected"';?> value="2">省会城市</option>
					<option <?php if($city->level==3)echo 'selected="selected"';?> value="3">计划单列市</option>
					<option <?php if($city->level==4)echo 'selected="selected"';?> value="4">地级市</option>
					<option <?php if($city->level==5)echo 'selected="selected"';?> value="5">县级市</option>
				 </select>
			</td>
		</tr>
		<tr class="tr3">
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="完成"></td>
		</tr>	
	</table>
		<input type="hidden" name="id" value="<?php echo $city->id; ?>">
	</form>
</body>
</html>