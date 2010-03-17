 function copyToClipboard(txt) {   
      if(window.clipboardData) {   
              window.clipboardData.clearData();   
              window.clipboardData.setData("Text", txt);   
      } else if(navigator.userAgent.indexOf("Opera") != -1) {   
           window.location = txt;   
      } else if (window.netscape) {   
           try {   
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");   
           } catch (e) {   
                alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");   
           }   
           var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);   
           if (!clip)   
                return false;   
           var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);   
           if (!trans)   
                return false;   
           trans.addDataFlavor('text/unicode');   
           var str = new Object();   
           var len = new Object();   
           var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);   
           var copytext = txt;   
           str.data = copytext;   
           trans.setTransferData("text/unicode",str,copytext.length*2);   
           var clipid = Components.interfaces.nsIClipboard;   
           if (!clip)   
                return false;   
           clip.setData(trans,null,clipid.kGlobalClipboard);   
           return true;  
      }   
}
$(function(){
	$(".left_top_title").hover(function(){
		$(".left_top_title").css('background','');
		$(this).css('background','url(/images/html/news/background1.jpg)');
		$(".left_top").css('display','none');
		$("#"+$(this).attr('name')).css('display','inline');
	});
	
	$(".left_bottom_title").hover(function(){
		$(".left_bottom_title").css('background','');
		$(this).css('background','url(/images/html/news/background2.jpg)');
		$(".left_bottom").css('display','none');
		$("#"+$(this).attr('name')).css('display','inline');
	});
	
	$('#a_collect').click(function(e){
		e.preventDefault();
		$.post('/user/user_collect.php',{'resource_type':'fb_news','resource_id':$(this).attr('href')},function(data){
			if(data){
				alert(data);
			}
		});
	});
	$('#button4').click(function(){
		if(copyToClipboard(window.location.href)){
			alert('已复制到剪贴板，在msn，qq，或者邮件中，使用Ctrl + V与好友分享这篇文章！');
		};
	});
	
	var font_size = 13;
	
	$("#font_down").click(function(){
		if(font_size>12){
			$("#text3").find("*").css('font-size',--font_size);
		}
		if(font_size==12){
			$("#font_down").attr('src','/images/html/news/font1.gif');
			$("#font_down").css('cursor','auto');
		}else{
			$("#font_up").attr('src','/images/html/news/font2.gif');
			$("#font_up").css('cursor','pointer');
		}
	});
	$("#font_up").click(function(){
		if (font_size < 14) {
			$("#text3").find("*").css('font-size', ++font_size);
		}
		if(font_size==14){
			$("#font_up").attr('src','/images/html/news/font4.gif');
			$("#font_up").css('cursor','auto');
		}else{
			$("#font_down").attr('src','/images/html/news/font3.gif');
			$("#font_down").css('cursor','pointer');
		}
	});
});
