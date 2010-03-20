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
	<table width="795" border="0" id="list">
	<form id="menu_form" method="post" action="edit.post.php">
		<tr class=tr1>
			<?php 
				if($menu->id){ ?>									
			<td colspan="2">　修改导航 <?php if($parent_menu){echo '<span style="color:red;font-size:12px;">上级导航--'. $parent_menu->name .'</span>';}?></td>
			<?php
				}else{ ?>
			<td colspan="2">　添加导航 <?php if($parent_menu){echo '<span style="color:red;font-size:12px;">上级导航--'. $parent_menu->name .'</span>';}?></td>		
			<?php
				}
			?>
		</tr>		
		<tr class=tr4>
			<td width=150>名称：</td>
			<td width=645 align="left"><input type="text" name="post[name]" value="<?php echo $menu->name;?>" class="required"></td>
		</tr>
		<tr class=tr4>
			<td width=150>类型：</td>
			<td width=645 align="left">
				<select  name="post[type]">
					<option <?php if($menu->type=='both'){echo 'selected="selected"';}?> value="both">公共导航</option>
					<option <?php if($menu->type=='top'){echo 'selected="selected"';}?> value="top">TOP导航</option>
					<option <?php if($menu->type=='bottom'){echo 'selected="selected"';}?> value="bottom">Bottom导航</option>
				</select>				
			</td>
		</tr>	
		<tr class="tr4 menu_item">
			<td>链接：</td>
			<td align="left"><input type="text" name="post[href]" value="<?php echo $menu->href;?>"></td>
		</tr>
		<tr class="tr4 menu_item">
			<td>链接方式:</td>
			<td align="left">
				<select id="sel_target" name="post[target]">
					<option value="_slef" <?php if($menu->target == '_slef') echo 'selected="selected"'; ?>>当前窗口</option>
					<option value="_blank" <?php if($menu->target == '_blank') echo 'selected="selected"'; ?>>新建窗口</option>
				</select>				
			</td>
		</tr>	
		<tr class=tr4>
			<td>优先级：</td>
			<td align="left"><input type="text" name="post[priority]" id="priority" value="<?php echo $menu->priority;?>" class="number"></td>
		</tr>
		<tr class=tr3>
			<td colspan="2"><button type="submit" id="btn_submit">提 交</button></td>
		</tr>
		<input type="hidden" name="post[parent_id]" value="<?php echo $menu->parent_id;?>" id="post_parent_id">
		<input type="hidden" name="id" value="<?php echo $menu->id;?>">
	</form>
	</table>
</body>
</html>
