$(function(){
	$("#search").click(function(){
				window.location.href="?key1="+$("#user_name").attr('value')+"&key2="+$("#comment").attr('value')+"&type="+$("#r_type").val()+"&id="+$("#r_id").val();
	});
	
	$("#user_name").keypress(function(event){
			if(event.keyCode==13){
				window.location.href="?key1="+$("#user_name").attr('value')+"&key2="+$("#comment").attr('value')+"&type="+$("#r_type").val()+"&id="+$("#r_id").val();
			}
	});
	
	$("#comment").keypress(function(event){
			if(event.keyCode==13){
				window.location.href="?key1="+$("#user_name").attr('value')+"&key2="+$("#comment").attr('value')+"&type="+$("#r_type").val()+"&id="+$("#r_id").val();
			}
	});
	$(".del_comment").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else
		{
			$.post("comment.post.php",{'comment_id':$(this).attr('name'),'news_id':$("#r_id").val(),'post_type':'del'},function(data){
				$("#"+data).remove();
			});
		}
	});
})