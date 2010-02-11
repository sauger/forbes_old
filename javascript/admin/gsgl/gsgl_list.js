/**
 * @author loong
 */

$(function(){
	function send_search(){
		window.location.href="?title="+encodeURI($("#title").attr('value'))+"&type="+$("#type").attr('value');
	};
	
	$('#title').keypress(function(e){
		if(e.keycode == 13)
			send_search();
	});
	
	$("#search_gs").click(function(){
		send_search();
	});
})