<?php
	require_once('../../frame.php');
	
	$id = $_REQUEST['id'];
	$search = $_REQUEST['search'];
	$list = new table_class('fb_city_list');
	$list->find($id);
	$db = get_db();
	$sql = "select t1.name ,t2.city_id from fb_city t1 join fb_city_list_content t2 on t1.id=t2.city_id where t2.list_id=$id";
	if($search!=''){
		$sql .=" and city_name like '%{$search}%'";
	}
	$sql .= " group by t2.city_id";
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
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="6">
				 <?php echo $list->name;?>   <a href="detail_edit.php?list_id=<?php echo $id;?>">添加城市</a> 搜索　
				 <input id="search" type="text" value="<? echo $_REQUEST['search']?>">
				<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">　　　
				 <a href="index.php" style="cursor:pointer">返回榜单列表</a>
			</td>
		</tr>
		<tr class="tr2">
			<td>城市名</td><td>操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->city_id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td>
						<a href="detail_edit.php?id=<?php echo $record[$i]->city_id;?>&list_id=<?php echo $id;?>" class="edit" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->city_id;?>">删除</span>
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="tr3">
			<td colspan=6><?php paginate();?></td>
		</tr>
	</table>
</body>
</html>