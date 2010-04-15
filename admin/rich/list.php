<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		require_once('../../frame.php');
		judge_role();
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','category_class','admin/gl/search','admin/rich/list');
	?>
</head>
<?php
	$content = trim($_REQUEST['content']);
	$type = $_REQUEST['type'];
	$db = get_db();
	$sql = "select a.* from fb_rich a";
	if($content){
		$sql .= " where name like '%{$content}%'";
	}
	$sql .= " order by id asc";

  $record = $db->paginate($sql,30);

?>
<body>
<div id=icaption>
    <div id=title>富豪管理</div>
    <a href="#" id="btn_delete3" title="删除所有记录"></a>
	<a href="#" id="btn_delete2" title="删除选中记录"></a>
	<a href="upload_data.php" id=btn_import></a>
	<a href="edit.php" id=btn_add></a>
</div>

<div id=isearch>
		<input id="content" type="text" value="<? echo $_REQUEST['content']?>">
		<select id="type">
				<option value="1" <?php if($_REQUEST['type']=="1"){?>selected="selected"<? }?> >姓名</option>
				<option value="0" <?php if($_REQUEST['type']=="0"){?>selected="selected"<? }?> >性别</option>
		</select>
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td width="5%"><a href="#" id="a_select_all" style="color:blue;">选择</a></td><td width="20%">姓名</td><td width="15%">性别</td><td width="15%">年龄</td><td width="15%">国籍</td><td width="15%">今日排名</td><td width="15%">操作</td>
		</tr>
		<?php
			//--------------------
			$len = count($record);
			for($i=0;$i< $len ;$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><input type="checkbox" value="<?php echo $record[$i]->id;?>" class="checkbox_select_all" /></td>
					<td><a href="<?php echo $url;?>" target="_blank"><?php echo strip_tags($record[$i]->name);?></a></td>
					<td>
						<?php if($record[$i]->gender==0) {echo '女';} else if($record[$i]->gender==1) {echo '男';} else {echo '未知';}?>
					</td>
					<td>
						<?php
						if(!$record[$i]->birthday){
							echo "未知";
						}else{
							echo intval(date('Y')) - $record[$i]->birthday;	
						}
						?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->country);?>
					</td>
					<td>
						<?php echo strip_tags($record[$i]->current_fortune_order);?>
					</td>
					<td>
						<a style="display:none;" href="add_to_list.php?rich_id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="加入榜单"><img src="/images/btn_add.png" border="0"></a>
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" title="编辑"><img src="/images/btn_edit.png" border="0"></a>
						<span style="cursor:pointer" class="del" name="<?php echo $record[$i]->id;?>"  title="删除"><img src="/images/btn_delete.png" border="0"></span>

						
					</td>
				</tr>
		<?php
			}
		?>
		<tr class="btools">
			<td colspan=10><?php paginate("",null,"page",true);?><input type="hidden" id="db_table" value="fb_rich"></td>
		</tr>
	</table>
</body>
</html>