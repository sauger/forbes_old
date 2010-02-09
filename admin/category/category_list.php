<?php
	require_once('../../frame.php');
	judge_role();
	
	$type = $_REQUEST['type'];
	switch($type){
		case "news":
	        $category_name = "新闻";
	        break;
	    case "image":
	        $category_name = "图片";
	        break;
	    case "video":
	        $category_name = "视频";
			break;
		default:
			$category_name = "其他";
	}
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
		js_include_tag('admin_pub');
	?>
</head>
<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="6"><?php echo $category_name;?>类别管理　<a href="category_edit.php?type=<?php echo $type;?>">添加类别</a></td>
		</tr>
		<tr class="tr2">
			<td width="260">类别名称</td><td width="100">优先级</td><td width="260">父类</td><td width="175">操作</td>
		</tr>
		<?php
			$category = new table_class($tb_category);
			$record = $category->paginate("all",array('conditions' => 'category_type="'.$type.'"','order' => 'parent_id,priority'),20);
			$count_record = count($record);
			$record2 = $category->find("all",array('conditions' => 'category_type="'.$type.'"','order' => 'priority'));
			$count_record2 = count($record2);
			//--------------------
			for($i=0;$i<$count_record;$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><?php echo $record[$i]->name;?></td>
					<td><input type="text" class="priority" name="<?php echo $record[$i]->id;?>" value="<?php if($record[$i]->priority!=100){echo $record[$i]->priority;}?>" style="width:30px;"></td>
					<td><?php for($j=0;$j<$count_record2;$j++){if($record2[$j]->id==$record[$i]->parent_id){echo $record2[$j]->name;break;}}?></td>
					<td><a title="添加子类别" href="category_edit.php?parent_id=<?php echo $record[$i]->id;?>&type=<?php echo $type?>"><img src="/images/btn_add.png" border="0"></a>　<a href="category_edit.php?id=<?php echo $record[$i]->id;?>&type=<?php echo $type?>" title="编辑" target="admin_iframe"><img src="/images/btn_edit.png" border="0"></a>　<a class="del" name="<?php echo $record[$i]->id;?>" title="删除" style="color:#ff0000; cursor:pointer"><img src="/images/btn_delete.png" border="0"></a></td>
				</tr>
		<?php
			}
			//--------------------
		?>
		<input type="hidden" id="db_table" value="<?php echo $tb_category?>">
	</table>
	<table width="795" border="0">
		<tr colspan="5" class=tr3>
			<td><?php paginate();?> <button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button></td>
		</tr>
	</table>
</body>
</html>
