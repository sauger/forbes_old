<?php require_once('../frame.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<?php
			use_jquery();
			css_include_tag('register');
			js_include_tag('jquery.filestyle.js');
		?>
</head>
<body>
	<div id=register>
		<div id=title>完善您的个人信息，就有机会获得《福布斯》中文版杂志赠阅机会！</div>
		<div id=person>
			<span style="color:#336666; font-size:14px; font-weight:bold;">个人资料</span>　（请全部用中文填写完整，所填事项不完整及填写家庭地址恕不受理）<br>
			<button>跳过进入下一步</button>
		</div>
		<hr>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td class=td1>姓　　名：</td>
				<td class=td3><input class="txt" type="text"></td>
				<td colspan=2></td>
			</tr>
			<tr>
				<td class=td1>性　　别：</td>
				<td class=td3><div class=td4><input type="radio" name="sex">男</div><div class=td4><input type="radio" name=sex>女</div></td>
				<td class=td1>学　　历：</td>
				<td class=td3><select class=sel1></select></td>
			</tr>
			<tr>
				<td class=td1>行　　业：</td>
				<td class=td3><select class=sel1></select></td>
				<td class=td1>职　　位：</td>
				<td class=td3><select class=sel1></select></td>
			</tr>
			<tr>
				<td class=td1>工作单位：</td>
				<td colspan=3 class=td2><input class="txt1" type="text"></td>
			</tr>
			<tr>
				<td class=td1>所在部门：</td>
				<td colspan=3 class=td2><input class="txt1" type="text"></td>
			</tr>
			<tr>
				<td class=td1>公司性质：</td>
				<td class=td3><select class=sel1></select></td>
				<td class=td1>公司规模：</td>
				<td class=td3><select class=sel1></select></td>
			</tr>
			<tr>
				<td class=td1>公司是否上市公司：</td>
				<td class=td3><select class=sel1></select></td>
				<td colspan=2></td>
			</tr>
			<tr>
				<td class=td1>公司制造的产品：</td>
				<td class=td3><select class=sel1></select></td>
				<td colspan=2></td>
			</tr>
			<tr>
				<td class=td1>公司年营业额：</td>
				<td class=td3><select class=sel1></select></td>
				<td colspan=2></td>
			</tr>
			<tr>
				<td class=td1>您的个人年收入：</td>
				<td class=td3><select class=sel1></select></td>
				<td colspan=2></td>
			</tr>
		</table>
		<hr>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td class=td1><span style="color:red;">*</span>所在区域：</td>
				<td class=td3><select class=sel1></select></td>
				<td class=td3><select class=sel1></select></td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td class=td1>您的通讯地址：</td>
				<td colspan=3 class=td2><input class="txt1" type="text"></td>
			</tr>
			<tr>
				<td class=td1>邮　　编：</td>
				<td colspan=3 class=td2><input class="txt1" type="text"></td>
			</tr>
			<tr>
				<td class=td1>您的固定电话：</td>
				<td class=td2><input class="txt2" type="text" style="margin-left:30px;"></td>
				<td class=td2><input class="txt2" type="text"></td>
				<td class=td2><input class="txt2" type="text"></td>
			</tr>
			<tr>
				<td class=td1>手　　机：</td>
				<td colspan=3 class=td2><input class="txt1" type="text"></td>
			</tr>
			<tr>
				<td class=td1>M　S　N：</td>
				<td colspan=3 class=td2><input class="txt1" type="text"></td>
			</tr>
			<tr>
				<td class=td1>Ｑ　　Ｑ：</td>
				<td colspan=3 class=td2><input class="txt1" type="text"></td>
			</tr>
			<tr >
				<td class=td1>您的头像：</td>
				<td colspan=3 class=td2><input class="file" type="file"></td>
			</tr>
			<tr style="width:100%">
				<td class=td1></td>
				<td colspan=3 class=td2 style="line-height:30px;"><button class="upload">上　传</button>　<span style="color:red;">上传的图片请勿超过1M</span></td>
			</tr>
		</table>
		<hr>
		<div id="submit"><button>提交并保存个人信息</button></div>
	</div>
</body>
</html>
<script>
$(document).ready(function(){
	$("input[type=file]").filestyle({    
    image: "../images/register/upload_btn.jpg",   
    imageheight : 26,   
    imagewidth : 94,   
    width : 190   
})
}); 
</script>