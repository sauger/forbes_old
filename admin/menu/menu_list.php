<?php
	require_once('../../frame.php');
	judge_role();
	$menu_title="添加菜单主目录"; 
	$menu_table=$tb_menu;
	function display_target($param) {
		if($param == '_slef'){
			return '当前窗口';
		}else if ($param == '_blank'){
			return '新开窗口';
		}else if($param == 'admin_iframe'){
			return '右侧窗口';
		};
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<?php
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/menu_list','admin_pub');
	?>
</head>
<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="5">　<a href="menu_edit.php"><?php echo $menu_title?></a></td>
		</tr>
		<tr class="tr2">
			<td width="200">菜单名称</td><td width="50">优先级</td><td width="285">链接</td><td width="80">链接方式</td><td width="175">操作</td>
		</tr>
		<?php
			$menu = new table_class($menu_table);
			$record = $menu->find("all",array('conditions' => 'parent_id=0','order' => 'priority'));
			//--------------------
			for($i=0;$i<count($record);$i++){
		?>
				<tr class=tr3 id=<?php echo $record[$i]->id;?> >
					<td><img class="img_plus" style="cursor:pointer" name="<?php echo $record[$i]->name;?>" src="/images/admin/plus.gif"><?php echo $record[$i]->name;?></td>
					<td><input type="text" class="priority" name="<?php echo $record[$i]->id;?>" value="<?php if($record[$i]->priority!=100){echo $record[$i]->priority;}?>" style="width:30px;"></td>					
					<?php
					if($record[$i]->is_root == 1){
					?>
					<td>不可用</td>
					<td>不可用</td>
					<?php
					} else{
					?>
					<td><?php echo $record[$i]->href;?></td>
					<td><?php echo display_target($record[$i]->target);?></td>
					<?php } ?>
					<td><a href="menu_edit.php?parent_id=<?php echo $record[$i]->id;?>" title="添加子菜单"><img src="/images/btn_add.png" border="0"></a>　<a href="menu_edit.php?id=<?php echo $record[$i]->id;?>&type=<?php echo $type?>" target="admin_iframe" title="编辑"><img src="/images/btn_edit.png" border="0"></a>　<a class="del" name="<?php echo $record[$i]->id;?>" style="color:#ff0000; cursor:pointer" title="删除"><img src="/images/btn_delete.png" border="0"></a></td>
				</tr>
				<?php
				$record2 = $menu->find("all",array('conditions' => 'parent_id>0 and parent_id='.$record[$i]->id,'order' => 'priority'));
				//----------
				for($j=0;$j<count($record2);$j++){
				?>
				<tr class="tr3" style="display:none;" id=<?php echo $record2[$j]->id;?> name="<?php echo $record[$i]->name;?>">
					<td class="sub_menu"><li style="color:#0000ff;"><?php echo $record2[$j]->name;?></li></td>
					<td><input type="text" class="priority" name="<?php echo $record2[$j]->id;?>" value="<?php if($record2[$j]->priority!=100){echo $record2[$j]->priority;}?>" style="width:30px;"></td>
					<td><?php echo $record2[$j]->href;?></td>
					<td><?php echo display_target($record2[$j]->target);?></td>
					<td><a href="menu_edit.php?id=<?php echo $record2[$j]->id;?>&type=<?php echo $type?>" target="admin_iframe" title="编辑"><img src="/images/btn_edit.png" border="0"></a>　<a class="del" name="<?php echo $record2[$j]->id;?>" style="color:#ff0000; cursor:pointer" title="删除"><img src="/images/btn_delete.png" border="0"></a></td>
				</tr>
		<?php
				}
				//----------
			}
			//--------------------
		?>
		<input type="hidden" id="db_table" value="<?php echo $menu_table;?>">
	</table>
	<table width="795" border="0">
		<tr colspan="5" class=tr3>
			<td><?php paginate();?> <button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button></td>
		</tr>
	</table>
</body>
</html>
