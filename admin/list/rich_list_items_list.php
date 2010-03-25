<?php
	require_once('../../frame.php');
	$id = intval($_REQUEST['id']);
	if($id <= 0){
		alert('invalid request!');
		redirect('index.php');
		exit;
	}
	$search = $_REQUEST['search'];
	$list = new table_class('fb_custom_list_type');
	if($list->find($id)===false){
		alert('invalid request!');
		redirect('index.php');
		exit;
	};
	$db = get_db();
	$sql = "select * from fb_rich_list_items where list_id={$id}" ;
	if($search && $_GET['s_field']){
		$sql .= " and {$_GET['s_field']} like '%{$search}%'";
	}
	$sql .= " order by overall_order asc";
	$record = $db->paginate($sql,30);
	$count = $db->record_count;
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
		js_include_tag('admin_pub','admin/list/rich_item_list');
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="16">
				<?php if ($id){ ?>   <a href="rich_list_item_edit.php?list_id=<?php echo $id; ?>">添加富豪</a> <?php } ?>  搜索　
				<input id="search" type="text" value="<? echo $_REQUEST['search']?>">
				<select id="s_field">
					<option value="name">姓名</option>
					<option value="gender">性别</option>
					<option value="gender">年龄</option>
					<option value="overall_order">排名</option>
					<option value="fortune">个人财富</option>
					<option value="company">公司</option>
					<option value="industry">财富来源</option>
					<option value="zone">地区</option>
				</select>
				<script>$('#s_field').val('<?php echo $_GET['s_field'];?>');</script>
    			<input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
				<a href="index.php" style="cursor:pointer">返回榜单列表</a>
			</td>
		</tr>
		<tr class="tr2">
			<td width="50">姓名</td><td width="50">排名</td><td width="50">年龄</td><td>公司</td><td>资产来源</td><td>地区</td><td width="100">个人财富</td><td width="70">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><?php echo $record[$i]->name;?></td>
					<td><?php echo $record[$i]->overall_order;?></td>
					<td><?php echo $record[$i]->age;?></td>
					<td><?php echo $record[$i]->company;?></td>
					<td><?php echo $record[$i]->industry;?></td>
					<td><?php echo $record[$i]->zone;?></td>
					<td><?php echo $record[$i]->fortune;?></td>
					<td>
						<a href="rich_list_item_edit.php?id=<?php echo $record[$i]->id;?>&list_id=<?php echo $id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
					</td>
				</tr>
				<input type="hidden" id="db_table" value="fb_rich_list_items">
		<?php
			}
		?>
		<tr class="tr3">
			<td colspan=16><?php paginate();?></td>
		</tr>
		<input type="hidden" id="list_id" name="id" value="<?php echo $id;?>"> 
	</table>
</body>
</html>