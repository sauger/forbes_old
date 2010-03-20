<?php
	require_once('../../frame.php');
	$search = $_REQUEST['search'];
	
	$db = get_db();
	$sql = "select name,zy,xb,id from fb_mr where 1=1";
	if($search!=''){
		$sql .= " and (name like '%{$search}%' or zy like '%{$search}%' or mr_jj like '%{$search}%')";
	}
	
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
		js_include_tag('admin_pub','admin/famous/famous');
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="5">　 
				<a href="edit.php">添加名人</a>
				<input style="margin-left:20px" id="search" type="text" value="<? echo $_REQUEST['search']?>">
				<input type="button" value="搜索" id="search_b" style="border:2px solid #999999; height:20px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="215">姓名</td><td width="210">职业</td><td width="100">性别</td><td width="240">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->zy;?></td>
					<td><?php echo $record[$i]->xb;?></td>
					<td>
						<a href="/admin/famous_ad/edit.php?f_id=<?php echo $record[$i]->id;?>" class="edit" style="cursor:pointer">编辑名人代言</a>
						<a href="/admin/famous_list/edit.php?f_id=<?php echo $record[$i]->id;?>" class="edit" style="cursor:pointer">加入榜单</a>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="tr3">
			<td colspan=5><?php paginate();?>				<input type="hidden" id="db_table" value="fb_mr"></td>
		</tr>
	</table>
</body>
</html>