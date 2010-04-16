function send_search(){
	window.location.href="?s_text=" + encodeURI($('#s_text').val())+"&type="+$("#r_type").val()+"&id="+$("#r_id").val();;
}
$(function(){
	$("#search_button").click(function(){
		send_search();
	});
	
	$("#s_text").keypress(function(event){
			if(event.keyCode==13){
				send_search();
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