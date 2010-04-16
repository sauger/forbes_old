$(function(){
	
	function post()
	{
		window.location.href="?content="+encodeURI($("#content").attr('value'))+"&type="+$("#type").attr('value');
	}
						
	$("#search_button").click(function(){
			post();
		});
		
	$("#content").keypress(function(E){
		if (E.keyCode == 13)
			{
				post();
			}
		});
})