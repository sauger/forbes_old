$(document).ready(function(){
   	
	  
	
	
		$(".tgcan").click(function(){
			$.post('/admin/admin.post.php',{'id':$(this).next().attr('value'),'type':'tgcan'},function(data){
				 if(data=="OK")
				  location.reload();
				}
			)
		});
		$(".tgpub").click(function(){
			$.post('/admin/admin.post.php',{
				'id': $(this).next().attr('value'),
				'type': 'tgpub'
			},function(data){
				 if(data=="OK")
				  location.reload();
				}
			)
		});
		$(".tgdel").click(function(){
			if(!window.confirm("确定要删除吗")){return false;};
			$.post('/admin/admin.post.php',{'id':$(this).next().attr('value'),'type':'tgdel'},function(data){
				 if(data=="OK")
				  location.reload();
				}
			)
		});
		$(".deltg").click(function(){
			if(!window.confirm("确定要删除吗")){return false;};
			$.post('/admin/admin.post.php',{'id':$(this).attr('name'),'type':'deltg'},function(data){
				 if(data=="OK")
				  location.reload();
				}
			)
		})
		$("#tg").click(function(){
			var title=$("#title").attr('value');
			var starttime=$("#starttime").attr('value');
			var endtime=$("#endtime").attr('value');
			if(title==""){alert("标题不能为空");return false;}
			if(starttime==""){alert("开始时间不能为空");return false;}
			if(endtime==""){alert("结束时间不能为空");return false;}
			var uptype=$("#uptype").attr("value");
			if(uptype!="tgupdate")
			{
				var upfile1=$("#upfile1").attr("value");
				if(upfile1==""){alert("上传图片不能为空");return false;}	
			  	var upload_file_extension=upfile1.substring(upfile1.length-4,upfile1.length);
				if(upload_file_extension.toLowerCase()!=".png"&&upload_file_extension.toLowerCase()!=".jpg"&&upload_file_extension.toLowerCase()!=".gif"){alert("上传图片类型错误");return false;}
			}
			document.uploadfiles.submit();		
		});
		$("#searchinput").click(function(){
			newskey();
		});
		$("#newskey1").keydown(function(e){
			if (e.keyCode==13)
			{
				newskey();
			}
		});
		$("#newskey4").change(function(){
			newskey();
		})
		$(".menu1").click(function(){
			$(".menu2").css("display","inline");
		});
		$(".menu2").click(function(){
			$("#admin_iframe").src="/admin/shop/shopindex.php";
		});
		
		$(".shopcan").click(function(){
			$.post('/admin/admin.post.php',{'id':$(this).attr('name'),'type':'shopcan'},function(data){
				 if(data=="OK")
				  location.reload();
				}
			)
		});
		
		$(".shoppub").click(function(){
			$.post('/admin/admin.post.php',{
				'id': $(this).attr('name'),
				'type': 'shoppub'
			},function(data){
				 if(data=="OK")
				  location.reload();
				}
			)
		});
		$(".shopdel").click(function(){
			if(!window.confirm("确定要删除吗")){return false;};
			$.post('/admin/admin.post.php',{'id':$(this).attr('name'),'type':'shopdel'},function(data){
				 if(data=="OK")
				  location.reload();
				}
			)
		});
		$("#addleaderuser").click(function(){
			$.post('/admin/admin.post.php',{'userid':$("#loginname").attr('value'),'right':$("#rights").val(),'type':'addleaderuser'},function(data){
				 if(data=="OK")
				  location.reload();
			})
		});
		$("#delleaderuser").click(function(){
			$.post('/admin/admin.post.php',{'id':$(this).attr('name'),'type':'delleaderuser'},function(data){
				 if(data=="OK")
				  location.reload();
			})
		});

})
		function newskey()
		{	
			var key1=$("#newskey1").attr('value');	
			var key2=$("#newskey2").attr('value');	
			var key3=$("#newskey3").attr('value');	
			var key4=$("#newskey4").attr('value');	
			window.location.href="?key1="+key1+"&key2="+key2+"&key3="+key3+"&key4="+key4;
		}	
		function newskeypress()
		{
			if (event.keyCode==13)
			{
				newskey();
			}
		}
