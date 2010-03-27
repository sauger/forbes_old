<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>福布斯中文网</title>
	<?php
		require_once('../../frame.php');
		judge_role(); 
		css_include_tag('admin');
		use_jquery();
		js_include_tag('admin_pub');
		$db = get_db();
		$words = $db->paginate('select * from fb_filte_words',30);
		$count = count($words);
	?>
</head>
<body style="background:#E1F0F7">
	<table width="795" border="0">
		<tr class="tr1">
			<td colspan="5" width="795">　敏感词管理　<a href="edit.php" style="color:#0000FF">添加敏感词</a></td>
		</tr>
		<tr class="tr2">
			<td width="205">敏感词</td><td width="250">操作</td>
		</tr>
		<?php for($i=0;$i<$count;$i++){?>
		<tr class="tr3" id="<?php echo $words[$i]->id;?>">
			<td><?php echo $words[$i]->text;?></td>
			<td>	
				<a href="edit.php?id=<?php echo $words[$i]->id;?>" title="编辑" style="color:#000000; text-decoration:none"><img src="/images/btn_edit.png" border="0"></a> 
				<span style="color:#ff0000; cursor:pointer" class="del" title="删除" name="<?php echo $words[$i]->id;?>"><img src="/images/btn_delete.png" border="0"></span>
			</td>
		</tr>
		<? }?>
	</table>
	<input type="hidden" id="db_table" value="fb_filte_words">
	<div class="div_box">
		<table width="795" border="0">
			<tr colspan="5" class=tr3>
				<td><?php paginate();?></td>
			</tr>
		</table>
	</div>
</body>
</html>

