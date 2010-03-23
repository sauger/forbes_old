$(function(){
	$('#search_b').click(function(){
		send_search();
	});
	$('#search').keypress(function(e){
		if(e.keyCode == 13){
			send_search();
		}
	});
});

function send_search(){
	var search = $('#search').val();
	var url = "index.php?search=" + encodeURI(search);
	location.href = url;
}