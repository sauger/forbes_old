/**
 * @author loong
 */

function post_search(){
	var s_text = encodeURI($('#s_text').val());
	var s_field = $('#s_field').val();
	location.href = "custom_list_item_list.php?id=" + $('#id').val() + "&s_field=" + s_field + "&s_text=" + s_text; 
};
$(function(){
	$('#search_b').click(function(){
		post_search();
	});
	$('#s_field').change(function(){
		post_search();
	});
	$('#s_text').keypress(function(e){
		if(e.keyCode == 13){
			post_search();
		}
	});
});