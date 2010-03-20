<?php
	require_once('../../frame.php');
	$search = $_REQUEST['search'];
	
	$db = get_db();
	$sql = "select * from fb_currency where 1=1";

	$record = $db->paginate($sql,30);
	$count = count($record);
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
		js_include_tag('admin_pub','admin/currency/index');
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="5">　 汇率管理
			</td>
		</tr>
		<tr class="tr2">
			<td width="295">货币</td><td width="250">代码</td><td width="250">汇率（1:RMB）</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><input style="border:none;" type="text" value="<?php echo $record[$i]->name;?>"></input></td>
					<td><?php echo $record[$i]->code;?></td>
					<td><?php echo $record[$i]->rate;?></td>
				</tr>
		<?php
			}
		?>
		<tr class="tr3">
			<td colspan=5><?php paginate();?>				<input type="hidden" id="db_table" value="fb_hbgl"></td>
		</tr>
	</table>
</body>
</html>