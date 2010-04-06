 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<?php
		require_once('../../frame.php');
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub','admin/list/list');
	?>
</head>

<body>
	<?php
		$list= new table_class('fb_custom_list_type');
		if($_REQUEST['s_text']){
			$conditions[] = "name like '%{$_REQUEST['s_text']}%'";
		} 
		$conditions[]= "list_type=4";			
		if($conditions){
			$conditions = array('conditions' => implode(' and ', $conditions));
		}
		$order = ' priority asc, created_at desc';
		$conditions['order'] = $order;
		$record = $list->paginate("all",$conditions);
		$count = count($record);
	?>
<div id=icaption>
    <div id=title>图片榜单</div>
	  <a href="picture_list_edit.php" id=btn_add></a>
</div>
<div id=isearch>
		<input id="s_text" type="text" value="<? echo $_REQUEST['s_text'];?>">
		<input type="button" value="搜索" id="search_button">
</div>
<div id=itable>
	<table cellspacing="1" align="center">
		<tr class="itable_title">
			<td width="60%">榜单名称</td><td width="40%">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><a href="#"> <?php echo $record[$i]->name;?></a></td>
					<td>
						<a href="relation_list.php?id=<?php echo $record[$i]->id;?>" >关联</a>
						<a href="picture_list_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<a href="picture_list_items_list.php?id=<?php echo $record[$i]->id;?>" class="edit" style="cursor:pointer">榜单项管理</a>
						<span style="cursor:pointer;color:#FF0000" class="del1" name="<?php echo $record[$i]->id;?>">删除</span>
						<input type="text" class="priority"  name="<?php echo $record[$i]->id;?>"  value="<?php if('100'!=$record[$i]->priority){echo $record[$i]->priority;};?>" style="width:40px;">
					</td>
				</tr>
		<?php
			}
		?>
			<tr class="tr3">
				<td colspan=6><input type="hidden" id="db_table" value="fb_custom_list_type"><button id="edit_priority">编辑优先级</button> <button id="clear_priority">清空优先级</button><?php paginate();?></td>
			</tr>
		</table>	
</div>
</body>
</html>