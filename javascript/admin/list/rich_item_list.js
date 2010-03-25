/**
 * @author loong
 */
$(function(){
	$("#search").keypress(function(event){
		if (event.keyCode == 13) {
			search();
		}
	});
	
	$('#search_b').click(function(){
		search();
	});
	$('#s_field').change(function(){
		search();
	});
})

function search(){
	window.location.href="rich_list_items_list.php?search="+encodeURI($("#search").val())+"&id="+$("#list_id").val()
						+ "&s_field=" + $('#s_field').val();
}