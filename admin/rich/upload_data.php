<?php require_once('../../frame.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title></title>
	<?php 
		css_include_tag('admin');
		use_jquery();
		validate_form("data_upload");
	?>
</head>
<body>
<div id=icaption>
    <div id=title>富豪数据导入</div>
	  <a href="list.php" id=btn_back></a>
</div>

<div id=itable>
	<table cellspacing="1"  align="center">
	<form id="data_upload" enctype="multipart/form-data" action="upload.post.php" method="post"> 
		<tr class="tr4 add">
			<td class=td1 width="15%">上传XLS</td>
			<td width="85%">
				<input type="file" name="xls">
			</td>
		</tr>
		<tr class="tr4 add">
			<td class=td1>所属年份</td>
			<td >
				<input type="text" name="year">（4位数字，如1999，2010等）
			</td>
		</tr>
		<tr class="tr4 add">
			<td colspan="2" style="color:#ff0000" class=td1>字段匹配（在输入框里输入相应的列号，没有的相对应的列号不用输入）</td>
		</tr>
		<tr class="tr4 add">
			<td class=td1 >姓名</td>
			<td >
				<input  type="text"  class="number" name="name">
			</td>
		</tr>
		<tr class="tr4 add">
			<td class=td1 >拼音</td>
			<td >
				<input  type="text"  class="number" name="chinese_name">
			</td>
		</tr>
		<tr class="tr4 add">
			<td class=td1 >性别</td>
			<td >
				<input  type="text"  class="number" name="gender">
			</td>
		</tr>
		<tr class="tr4 add">
			<td class=td1 >国籍</td>
			<td >
				<input  type="text"  class="number" name="country">
			</td>
		</tr>
		<tr class="tr4 add">
			<td class=td1 >年龄</td>
			<td >
				<input  type="text"  class="number" name="birthday">
			</td>
		</tr>
		<tr class="tr4 add">
			<td class=td1>个人经历</td>
			<td >
				<input  type="text"  class="number" name="comment">
			</td>
		</tr>
		<tr class=tr3>
			<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="发布">	<input type="hidden" name="list_id" value="<?php echo $id;?>"></td>
		</tr>
	
		</form>
	</table>
</div>	
</body>
</html>