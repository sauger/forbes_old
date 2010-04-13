<?php
	require_once('../../frame.php');
	judge_role();
	$id=intval($_REQUEST['id']);	
	$menu1 = new table_class('fb_navigation');
	if($id)	{
		$menu = $menu1->find($id);
	}else{
		$menu->parent_id = $_REQUEST['parent_id'] ? $_REQUEST['parent_id'] : 0;
	}
	if($menu->parent_id){
		$parent_menu = $menu1->find($menu->parent_id);
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
	?>
</head>
<?php
	validate_form("menu_form");
?>
<body>
<div id=icaption>
    <div id=title><?php if($menu->id){ echo "修改导航"; }else{ echo "添加导航";}?></div>
	  <a href="index.php" id=btn_back></a>
</div>
<div id=itable>
	<table cellspacing="1" align="center">
	<form id="menu_form" method="post" action="edit.post.php">	
		<tr class=tr4>
			<td class=td1>名称</td>
			<td width=685><input type="text" name="post[name]" value="<?php echo $menu->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>类型</td>
			<td>
				<select name="post[type]" style="width:155px;">
					<option <?php if($menu->type=='both'){echo 'selected="selected"';}?> value="both">公共导航</option>
					<option <?php if($menu->type=='top'){echo 'selected="selected"';}?> value="top">TOP导航</option>
					<option <?php if($menu->type=='bottom'){echo 'selected="selected"';}?> value="bottom">Bottom导航</option>
				</select>				
			</td>
		</tr>	
		<tr class=tr4>
			<td class=td1>链接</td>
			<td><input type="text" name="post[href]" value="<?php echo $menu->href;?>"></td>
		</tr>
		<tr class="tr4">
			<td class=td1>链接方式</td>
			<td>
				<select id="sel_target" name="post[target]" style="width:155px;">
					<option value="_slef" <?php if($menu->target == '_slef') echo 'selected="selected"'; ?>>当前窗口</option>
					<option value="_blank" <?php if($menu->target == '_blank') echo 'selected="selected"'; ?>>新建窗口</option>
				</select>				
			</td>
		</tr>	
		<tr class=tr4>
			<td class=td1>优先级</td>
			<td><input type="text" name="post[priority]" id="priority" value="<?php echo $menu->priority;?>" class="number"></td>
		</tr>
		<tr class=tr3>
			<td colspan="2">
				<button type="submit" id="btn_submit">提 交</button>
				<input type="hidden" name="post[parent_id]" value="<?php echo $menu->parent_id;?>" id="post_parent_id">
				<input type="hidden" name="id" value="<?php echo $menu->id;?>">
			</td>
		</tr>
	</form>
	</table>
</div>
</body>
</html>
