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
    <div id=title>公司数据导入</div>
	  <a href="list.php" id=btn_back></a>
</div>

<div id=itable>
	<form id="data_upload" enctype="multipart/form-data" action="upload.post.php" method="post">
		<table cellspacing="1"  align="center">	 
			<tr class="tr4 add">
				<td class=td1 width="15%">上传XLS</td>
				<td width="85%">
					<input type="file" name="xls">
				</td>
			</tr>
			<tr class="tr4 add">
				<td class=td1>公司名称</td>
				<td >
					<input type="text" name="name" value="1">
				</td>
			</tr>
			<tr class="tr4 add">
				<td class=td1 >国家</td>
				<td >
					<input  type="text" name="country" value="2">
				</td>
			</tr>
			<tr class="tr4 add">
				<td class=td1 >省份</td>
				<td >
					<input  type="text"  name="province" value="3">
				</td>
			</tr>
			<tr class="tr4 add">
				<td class=td1 >城市</td>
				<td >
					<input  type="text" name="city" value="4">
				</td>
			</tr>
			<tr class="tr4 add">
				<td class=td1 >办公地址</td>
				<td >
					<input  type="text"  class="number" name="address" value="5">
				</td>
			</tr>
			<tr class="tr4 add">
				<td class=td1 >网址</td>
				<td >
					<input  type="text"  class="number" name="website" value="6">
				</td>
			</tr>
			<tr class="tr4 add">
				<td class=td1>经营范围</td>
				<td >
					<input  type="text"  class="number" name="comment" value="7">
				</td>
			</tr>
			<tr class="tr4 add">
				<td class=td1>上市公司代码</td>
				<td >
					<input  type="text"  class="number" name="stock_code" value="8">
				</td>
			</tr>
			<tr class="tr4 add">
				<td class=td1>交易所</td>
				<td >
					<input  type="text"  class="number" name="stock_place_code" value="9">(支持：上海 深圳 香港 新加坡 韩国 法国 英国 德国 日本 美国)
				</td>
			</tr>
			<tr class=tr3>
				<td colspan="2" width="795" align="center"><input id="submit" type="submit" value="提交">	</td>
			</tr>
		</table>
	</form>
</div>	
</body>
</html>