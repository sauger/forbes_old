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
<div id=icaption>
    <div id=title>名人管理</div>
	  <a href="edit.php" id=btn_add></a>
</div>

<div id=isearch>
		<input id="search" type="text" value="<? echo $_REQUEST['search']?>">
		<input type="button" value="搜索" id="search_button">
</div>

<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td width="25%">姓名</td><td width="25%">职业</td><td width="25%">性别</td><td width="25%">操作</td>
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
				<a href="/admin/famous_list/edit.php?f_id=<?php echo $record[$i]->id;?>" title="加入榜单"><img src="/images/btn_add.png" border="0"></a>
				<a href="edit.php?id=<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/btn_edit.png" border="0"></a>
				<span style="cursor:pointer;" class="del" name="<?php echo $record[$i]->id;?>" title="删除"><img src="/images/btn_delete.png" border="0"></span>
			</td>
		</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan=10>
				<?php paginate("",null,"page",true);?>
				<input type="hidden" id="db_table" value="fb_mr">
			</td>
		</tr>
	</table>
</div>	
</body>
</html>