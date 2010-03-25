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
		js_include_tag('admin_pub','category_class','admin/gl/search');
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

  $record = $db->paginate($sql,30);

?>
<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="10">　
				<a href="edit.php">添加富豪</a>
				<input  style="margin-left:20px" id="content" type="text" value="<? echo $_REQUEST['content']?>"><select id="type" style="width:90px" class="">
					<option value="1" <?php if($_REQUEST['type']=="1"){?>selected="selected"<? }?> >姓名</option>
					<option value="0" <?php if($_REQUEST['type']=="0"){?>selected="selected"<? }?> >性别</option>
				</select>
				<input type="button" value="搜索" id="search" style="height:20px; border:2px solid #999999;">
				<a href="upload_data.php">数据导入</a>
			</td>
		</tr>
		<tr class="tr2">
			<td width="200">姓名</td><td width="50">性别</td><td width="50">年龄</td><td width="85">国籍</td><td width="100">今日排名</td><td width="150">操作</td>
		</tr>



		<?php
			//--------------------
			$len = count($record);
			for($i=0;$i< $len ;$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
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
		<tr class="tr3">
			<td colspan=9><?php paginate();?><input type="hidden" id="db_table" value="fb_fh"></td>
		</tr>
	</table>
</body>
</html>