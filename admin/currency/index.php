<?php
	require_once('../../frame.php');
	$search = $_REQUEST['search'];
	
	$db = get_db();
	$sql = "select * from fb_currency where 1=1";
	if($search!=''){
		$sql .= " and (name like '%{$search}%' or code like '%{$search}%')";
	}
	
	$record = $db->paginate($sql,15);
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
			<td colspan="5">
				　　　　搜索　
				 <input id="search" type="text" value="<? echo $_REQUEST['search']?>">
				<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="215">名称</td><td width="110">代码</td><td width="150">汇率（1:RMB）</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><input style="border:none;" type="text" value="<?php echo $record[$i]->name;?>"></input></td>
					<td><?php echo $record[$i]->code;?></td>
					<td><?php echo $record[$i]->rate;?></td>
				</tr>
				<input type="hidden" id="db_table" value="fb_hbgl">
		<?php
			}
		?>
		<tr class="tr3">
			<td colspan=5><?php paginate();?></td>
		</tr>
	</table>
</body>
</html>