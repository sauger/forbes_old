<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<title>福布斯中文网</title>
	<?php
		include_once dirname(__FILE__) ."/../../frame.php";
		use_jquery_ui();
		js_include_tag('jquery.colorbox-min','admin/position/edit');
		css_include_tag('jquery_ui','admin');
		$pos = new table_class('fb_page_pos');
		$pos->find_by_name($_GET['pos_name']);
	?>
</head>
<body>
<body>
<div id=pos_caption>
  <div id=title>位置管理</div>
</div>
<div id=pos_table>
	<form method="post"  enctype="multipart/form-data" action="edit.post.php">
	<table cellspacing="1" align="center">
		<tr class=tr4>
			<td class=td1 width="15%">标题</td>
			<td width="85%"><input type="text" name="pos[display]" value="<?php echo $pos->display; ?>"></td>
		</tr>
		<tr class="tr4">
			<td class=td1>描述</td>
			<td><textarea name="pos[description]"><?php echo $pos->description;?></textarea></td>
		</tr>
		<tr class="tr4">
			<td class=td1>提示</td>
			<td><input type="text" name="pos[title]" value="<?php echo $pos->title; ?>"></td>
		</tr>
		<tr class=tr4>
			<td class=td1>链接</td>
			<td><input type="text" name="pos[href]" value="<?php echo $pos->href;?>"></input></td>
		</tr>
		<tr class=tr4>
			<td class=td1>静态链接</td>
			<td><input type="text" name="pos[href]" value="<?php echo $pos->static_href;?>"></input></td>
		</tr>
		<tr class=tr4>
			<td class=td1>图片一</td>
			<td><input type="file" name="pos[image1]"></input> <?php if($pos->image1) echo "<a href='{$pos->image1}'>查看</a>"?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>图片二</td>
			<td><input type="file" name="pos[image2]"></input> <?php if($pos->image2) echo "<a href='{$pos->image2}'>查看</a>"?></td>
		</tr>
		<tr class=tr4>
			<td class=td1>过期时间</td>
			<?php 
				$h = ceil((strtotime($pos->end_time) - time()) / 3600);
				$h = $h <0 ? 0 : $h;
			?>
			<td><input id="end_time" name="end_time" value="<?php echo $h;?>"></input>小时后过期</td>
		</tr>
		<tr class=tr4>
			<td class=td1>备用字段</td>
			<td><input name="pos[alias]" value="<?php echo $pos->alias;?>"></input></td>
		</tr>	
		<tr class=tr4>
			<td class=td1>说明</td>
			<td><textarea name="pos[comment]"><?php echo $pos->comment;?></textarea></td>
		</tr>
		<tr class=btools>
			<td colspan="10" align="center">
				<input type="submit" value="保存"></input>
				<input type="button" id="btn_cancel" value="取消" />
				<input type="hidden" name="pos[name]" value="<?php echo $_GET['pos_name'];?>"></input>
			</td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>