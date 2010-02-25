$(function(){
	$("#search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_b').click(function(){
		search();
	})
	
	$(".del").click(function(){
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else
		{
			$.post("del_city.php",{'del_id':$(this).attr('name')},function(data){
			});
			$(this).parent().parent().remove();
		}
	})
})

function search(){
	window.location.href="?id="+$("#h_id").val()+"&search="+encodeURI($("#search").attr('value'));
}