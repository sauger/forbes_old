var showhttp = false;
var PostDiv="abderraf123123";
var Urls = "fqtgdg_post.php";
var posturl=document.URL;

if(window.XMLHttpRequest){showhttp = new XMLHttpRequest();if (showhttp.overrideMimeType) {showhttp.overrideMimeType('text/xml');}}	else if (window.ActiveXObject){try {showhttp = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {try {showhttp = new ActiveXObject("Microsoft.XMLHTTP");} catch (e) {}}}
function Post(url,section,mvalue,rpost){	var mdata;		if (!showhttp) { window.alert("不能创建XMLHttpRequest对象实例."); return false;	}		showhttp.open("POST", url, true);		showhttp.onreadystatechange = rpost;		showhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");		mdata = section+"="+mvalue;	showhttp.send(mdata);}
function tg(id)
{
	var PostStr=id;
	Post(Urls,"tg",PostStr,rtg);
}
function rtg()
{
	if (showhttp.readyState == 4) 
	{
		if (showhttp.status == 200)
 		{var result = showhttp.responseText; 
 			 if(result=="OK")
 			 {
 			 	window.location.href=posturl;
 			 	return false;
 			 }
 		}
 		else {alert("服务器忙，请刷新后重试。");}
 	}
}