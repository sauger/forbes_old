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
		js_include_tag('admin_pub','admin/list/list');
	?>
</head>

<body>
	<?php
		function list_type($type){
			$type = intval($type);
			switch ($type) {
				case 1:
					return "自定义榜单";
				break;
				case 2:
					return "年度富豪榜";
				break;
				case 3:
					return "年度名人榜";
				break;				
				default:
					;
				break;
			}
		}
		function list_position($pos){
			$pos = intval($pos);
			switch ($pos) {
				case 1:
					return "富豪";
				break;
				case 2:
					return "投资";
				break;
				case 3:
					return "公司";
				break;	
				case 4:
					return "城市";
				break;
				case 5:
					return "名人";
				break;
				case 6:
					return "体育";
				break;	
				case 7:
					return "科技";
				break;	
				case 8:
					return "教育";
				break;				
				default:
					;
				break;
			}
		}
		$list= new table_class('fb_custom_list_type');
		if($_REQUEST['s_text']){
			$conditions[] = "name like '%{$_REQUEST['s_text']}%'";
		} 
		if($_REQUEST['s_list_type']){
			$conditions[]= "list_type={$_REQUEST['s_list_type']}";			
		}
		if($_REQUEST['s_list_position']){
			$conditions[]= "position={$_REQUEST['s_list_position']}"	;		
		}
		if($conditions){
			$conditions = array('conditions' => implode(' and ', $conditions));
		}
		$order = ' priority asc, created_at desc';
		$conditions['order'] = $order;
		$record = $list->paginate("all",$conditions);
		$count = count($record);
	?>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="4">
				　<a href="custom_list_edit.php">添加榜单</a>   搜索　
				 <input id="s_text" type="text" value="<? echo $_REQUEST['s_text'];?>">
				 <select id="s_list_type">
				 	<option value="-1">榜单类型</option>
				 	<option value="1">自定义类型</option>
				 	<option value="2">年度富豪榜</option>
				 	<option value="3">年度名人榜</option>
				 </select>
				 <?php if($_REQUEST['s_list_type'])?>
				 	<script type="text/javascript">$('#s_list_type').val('<?php echo $_REQUEST['s_list_type'];?>');</script>
				 <?php ?>
				 <select id="s_list_position">
				 	<option value="-1">发布位置</option>
				 	<option value="1">富豪</option>
					<option value="2">投资</option>
					<option value="3">公司</option>
					<option value="4">城市</option>
					<option value="5">名人</option>
					<option value="6">体育</option>
					<option value="7">科技</option>
					<option value="8">教育</option>
				 </select>
				 <?php if($_REQUEST['s_list_position'])?>
				 	<script type="text/javascript">$('#s_list_position').val('<?php echo $_REQUEST['s_list_position'];?>');</script>
				 <?php ?>
				 <input type="button" value="搜索" id="search_b" style="border:1px solid #0000ff; height:21px">
			</td>
		</tr>
		<tr class="tr2">
			<td>榜单名称</td><td width="115">榜单类型</td><td width="115">发布位置</td><td width="210">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td><a href="#"> <?php echo $record[$i]->name;?></a></td>
					<td>
						<?php echo list_type($record[$i]->list_type);?>
					</td>
					<td>
						<?php echo list_position($record[$i]->position);?>
					</td>
					<td>
						<a href="custom_list_edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer">编辑</a>
						<?php if($record[$i]->list_type == 1){?>
						<a href="custom_list_item_list.php?id=<?php echo $record[$i]->id;?>" class="edit" style="cursor:pointer">榜单管理</a>
						<?php }elseif($record[$i]->list_type == 2){?>
						<a href="rich_list_items_list.php?id=<?php echo $record[$i]->id;?>" class="edit" style="cursor:pointer">榜单管理</a>
						<?php }elseif($record[$i]->list_type == 3){?>
						<a href="famous_list_items_list.php?id=<?php echo $record[$i]->id;?>" class="edit" style="cursor:pointer">榜单管理</a>
						<?php }?>
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

	</body>
</html>