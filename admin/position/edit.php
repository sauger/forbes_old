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
		css_include_tag('jquery_ui');
		$pos = new table_class('fb_page_pos');
		$pos->find_by_name($_GET['pos_name']);
	?>
</head>
<body>
<style type="text/css">
	#pos_caption{width:700px; height:25px; margin-left:5px; padding:10px; font-weight:bold; font-size:14px; text-align:left; border:1px dotted #cdcdcd; background:#FBFBFB; float:left; display:inline;}
	#pos_caption #title{width:300px; color:#0B55C4; font-size:23px; float:left; display:inline;}
	#pos_table{float:left;}
</style>
<body>
<div id=pos_caption>
    <div id=title>位置管理</div>
</div>
<div id="pos_table">
	<form method="post"  enctype="multipart/form-data" action="edit.post.php">
	<table width=700>
		<tr class=tr4>
			<td class=td1>标题</td>
			<td>
				<input type="text" name="pos[display]" value="<?php echo $pos->display; ?>">
			</td>
		</tr>
		<tr class="tr4">
			<td>描述</td>
			<td>
				<textarea name="pos[description]"><?php echo $pos->description;?></textarea>
			</td>
		</tr>
		<tr class="tr4">
			<td>提示</td>
			<td>
				<input type="text" name="pos[title]" value="<?php echo $pos->title; ?>">
			</td>
			</td>
		</tr>
		
		<tr>
			<td>链接</td>
			<td>
				<input type="text" name="pos[href]" value="<?php echo $pos->href;?>"></input>
			</td>
		</tr>
		<tr>
			<td>静态链接</td>
			<td>
				<input type="text" name="pos[href]" value="<?php echo $pos->static_href;?>"></input>
			</td>
		</tr>
		<tr>
			<td>图片一</td>
			<td>
				<input type="file" name="pos[image1]"></input> <?php if($pos->image1) echo "<a href='{$pos->image1}'>查看</a>"?>
			</td>
		</tr>
		<tr>
			<td>图片二</td>
			<td>
				<input type="file" name="pos[image2]"></input> <?php if($pos->image2) echo "<a href='{$pos->image2}'>查看</a>"?>
			</td>
		</tr>
		<tr>
			<td>过期时间</td>
			<?php 
				$h = ceil((strtotime($pos->end_time) - time()) / 3600);
				$h = $h <0 ? 0 : $h;
			?>
			<td><input id="end_time" name="end_time" value="<?php echo $h;?>"></input>小时后过期</td>
		</tr>
		<tr>
			<td>页面名</td>
			<td><input name="pos[page_name]" value="<?php echo $pos->page_name;?>"></input></td>
		</tr>	
		<tr>
			<td>说明</td>
			<td>
				<textarea name="pos[comment]"><?php echo $pos->comment;?></textarea>		
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="保存"></input>
				<input type="button" id="btn_cancel" value="取消" />
			</td>
		</tr>
	</table>
	<input type="hidden" name="pos[name]" value="<?php echo $_GET['pos_name'];?>"></input>
	</form>
</div>
</body>
</html>