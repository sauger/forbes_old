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
<body>
<div id=icaption>
    <div id=title>敏感词管理</div>
	  <a href="edit.php" id=btn_add></a>
</div>	
<div id=itable>
	<table cellspacing="1"  align="center">
		<tr class=itable_title>
			<td width="70%">敏感词</td><td width="30%">操作</td>
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
		<tr class=tr3>
			<td colspan="2"><?php paginate("",null,"page",true);?>	<input type="hidden" id="db_table" value="fb_filte_words"></td>
		</tr>
	</table>
</div>	
</body>
</html>

