$(function(){
	$("#search_gs").click(function(){
			window.location.href="?title="+encodeURI($("#title").attr('value'))+"&type="+$("#type").attr('value');	
		});
})