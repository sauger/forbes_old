<?php
	require_once('../../frame.php');
	
	$search = $_REQUEST['search'];
	$db = get_db();
	$sql = "select * from fb_position where page_id=0";
	$record = $db->paginate($sql,15);
	$count = count($record);
	
	function list_type($type){
			switch ($type) {
				case 'news':
					return "新闻";
				break;
				case 'category':
					return "新闻类别";
				break;
				case 'column':
					return "专栏记者";
				break;
				case 'image':
					return "图片";
				break;
				case 'list':
					return "榜单";
				break;			
				default:
					;
				break;
			}
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
		js_include_tag('admin_pub','admin/menu_list');
	?>
</head>

<body>
	<table width="795" border="0" id="list">
		<tr class="tr1">
			<td colspan="5">　 <a href="edit.php">添加页面</a></td>
		</tr>
		<tr class="tr2">
			<td width="300">位置名称</td><td width="100">条数限制</td><td width="95">已关联数目</td><td width="100">内容类型</td><td width="205">操作</td>
		</tr>
		<?php
			for($i=0;$i<$count;$i++){
		?>
				<tr class="tr3" id="<?php echo $record[$i]->id;?>">
					<td  style="text-align:left; text-indent:120px;"><?php echo $record[$i]->name;?></td>
					<td></td><td></td><td></td>
					<td>
						<a href="position_edit.php?pid=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer" title="添加"><img src="/images/btn_add.png" border="0"></a>　
						<a href="edit.php?id=<?php echo $record[$i]->id;?>" class="edit" name="<?php echo $record[$i]->id;?>" style="cursor:pointer" title="编辑"><img src="/images/btn_edit.png" border="0"></a>　
						<span style="cursor:pointer;" class="del" name="<?php echo $record[$i]->id;?>" title="删除"><img src="/images/btn_delete.png" border="0"></span>
					</td>
				</tr>
				<?php
					$records = $db->query("SELECT count(*) as num,f.* FROM fb_position f  left join fb_position_relation r on f.id=r.position_id and f.type=r.type where f.page_id={$record[$i]->id}  group by f.name   order by f.id");
					for($j=0;$j<count($records);$j++){
				?>
				<tr class="tr3" id=<?php echo $records[$j]->id;?> name="<?php echo $record[$i]->name;?>">
					<td class="sub_menu"  style="text-align:left;  text-indent:120px; color:#0000ff;">- <?php echo $records[$j]->name;?></td>
					<td><?php echo $records[$j]->position_limit;?></td>
					<?php if($records[$j]->type!='category'){?>
					<td><?php echo $records[$j]->num;?></td>
					<?php }else{?><td></td>
					<?php }?>
					<td><?php echo list_type($records[$j]->type);?></td>
					<td>
						<a href="list_edit.php?id=<?php echo $records[$j]->id;?>" class="list_edit" name="<?php echo $records[$j]->id;?>" title="配置内容"><img src="/images/btn_config2.png" border="0"></a>　
						<a href="position_edit.php?id=<?php echo $records[$j]->id;?>" class="edit" style="cursor:pointer" title="编辑"><img src="/images/btn_edit.png" border="0"></a>　
						<span style="cursor:pointer;" class="del" name="<?php echo $records[$j]->id;?>" title="删除"><img src="/images/btn_delete.png" border="0"></span></td>
				</tr>
		<?php
			}}j
		?>
			<tr class="tr3">
				<td colspan=6><?php paginate();?>			<input type="hidden" id="db_table" value="fb_position"></td>
			</tr>
		</table>	

	</body>
</html>
