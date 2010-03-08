<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>迅傲信息</title>
	<?php
		require_once('../../frame.php');
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin/list/list');
	?>
</head>

<body>
	<?php
		$list= new table_class('fb_custom_list_type');
		if($_REQUEST['s_text']){
			$conditions = array('conditions' => "name like '%{$_REQUEST['s_text']}%'");
		} 
		$record = $list->paginate("all",$conditions);
		$count = count($record);
	?>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="3">
				　自定义榜管理 <a href="custom_list_edit.php">添加榜单</a>   搜索　
				 <input id="s_text" type="text" value="<? echo $_REQUEST['s_text'];?>">
				 <input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td width="115">榜单类型名称</td><td width="210">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><a href="custom_list_edit.php?id=<?php echo $record[$i]->id;?>"> <?php echo $record[$i]->name;?></a></td>
					<td>
						<a href="custom_list_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<a href="custom_list_item_list.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->year;?>" style="cursor:pointer">榜单管理</a>
						<span style="cursor:pointer;color:#FF0000" class="del" name="<?php echo $record[$i]->id;?>">删除</span>
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