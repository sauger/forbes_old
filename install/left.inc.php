<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-cn>
	<?php
	  include "../frame.php";
	  css_include_tag("install/left.css");
	?>
	<script language="javascript"> 
		var url=location.search;
		var Request = new Object();
		if(url.indexOf("?")!=-1)
		{
		    var str = url.substr(1)  //去掉?号
		    strs = str.split("&");
		    for(var i=0;i<strs.length;i++)
		    {
		        Request[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
		    }
		}
	</script> 
</head>
<body>
	<div id="l_body">
		<div id=top>
			<div id="content">安装协议</div>
			<div class="context" id="content1">安装检查</div>
			<div class="context" id="content2">参数配置</div>
			<div class="context" id="content3">安装完成</div>
		</div>
		<div id=bottom></div>
	</div>
</body>
</html>
<script>
	if(Request['id']==2)
	{
		document.getElementById("content").style.color='#000000';
		document.getElementById("content1").style.color='#41A81C';
	}
	if(Request['id']==3)
	{
		document.getElementById("content").style.color='#000000';
		document.getElementById("content1").style.color='#000000';
		document.getElementById("content2").style.color='#41A81C';
	}
	if(Request['id']==4)
	{
		document.getElementById("content").style.color='#000000';
		document.getElementById("content1").style.color='#000000';
		document.getElementById("content2").style.color='#000000';
		document.getElementById("content3").style.color='#41A81C';
		
	}	
</script>