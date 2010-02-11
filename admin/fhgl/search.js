$(function(){
	$("#search_fh").click(function(){
			window.location.href="?title="+encodeURI($("#title").attr('value'))+"&type="+$("#type").attr('value');
		});
	$("#title").onkeypress(function(E)){
		if (E.keyCode == 13)
			{
				window.location.href="?title="+encodeURI($("#title").attr('value'))+"&type="+$("#type").attr('value');
			}
		});
})