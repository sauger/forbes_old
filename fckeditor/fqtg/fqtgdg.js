function check()
{
		var buyname=document.getElementById("buyname").value;
		var spname=document.getElementById("spname").value;
		var num=document.getElementById("num").value;
		var mobile=document.getElementById("phone").value;
		var address=document.getElementById("address").value;
		var maxnum=document.getElementById("tg_maxnum").value;
		var nownum=document.getElementById("tg_count").value;
		if(buyname==""){alert("用户姓名不能为空！");return false;}
		if(spname==""){alert("商品名称不能为空！");return false;}
		if(mobile==""){alert("联系方式不能为空！");return false;}
		if(address==""){alert("送货地址不能为空！");return false;}
		if(num==""){alert("数量不能为空！");return false;}
		if(maxnum!="")
		{
			if((parseInt(num)+parseInt(nownum))>maxnum){alert("对不起存货不足！");return false;}
		}
		document.fqtg.submit();			
}

var showhttp = false;
var PostDiv="abderraf123123";
var Urls = "fqtgdg.post.php"
var diggnum=0;

if(window.XMLHttpRequest){showhttp = new XMLHttpRequest();if (showhttp.overrideMimeType) {showhttp.overrideMimeType('text/xml');}}	else if (window.ActiveXObject){try {showhttp = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {try {showhttp = new ActiveXObject("Microsoft.XMLHTTP");} catch (e) {}}}

function Post(url,section,mvalue,rpost){	var mdata;		if (!showhttp) { window.alert("不能创建XMLHttpRequest对象实例."); return false;	}		showhttp.open("POST", url, true);		showhttp.onreadystatechange = rpost;		showhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		mdata = section+"="+mvalue;	showhttp.send(mdata);}
function fqtg(id)
{
	var PostStr=id;
	diggnum=id;
	Post(Urls,"fqtg",PostStr,rfqtg);
}
function rfqtg()
{
	if (showhttp.readyState == 4) 
	{	if (showhttp.status == 200)
 		{var result = showhttp.responseText; 
 			 if(result=="OK") 		{ var num=document.getElementById('diggnum'+diggnum).innerHTML;	document.getElementById('diggnum'+diggnum).innerHTML=Number(num)+1;	return false; }}
 			  else {alert("服务器忙，请刷新后重试。");}
 	}
}