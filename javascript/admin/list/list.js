/**
 * @author loong
 */
function send_search(){
	var s_text = $('#s_text').val();
	var url = "list_list.php?s_text=" + encodeURI(s_text);
	if ($('#s_list_type').val() >=0){
		url = url + '&s_list_type=' + $('#s_list_type').val();
	}
	if ($('#s_list_position').val() >=0){
		url = url + '&s_list_position=' + $('#s_list_position').val();
	}
	location.href = url;
}
$(function(){
	$('#search_b').click(function(){
		send_search();
	});
	$('#s_text').keypress(function(e){
		if(e.keyCode == 13){
			send_search();
		}
	});
	$('#s_list_type,#s_list_position').change(function(){
		send_search();
	});
	$('span.del').click(function(){
		if(confirm("删除榜单将删除所有与该榜单的相关数据，是否删除？")){
			var id = $(this).attr('name');
			var ithis = $(this);
			$.post("delete_list.post.php",{'id':id},function(data){
				if(data!=""){
					alert(data);
				}else{
					$(ithis).parent().parent().remove();
				}
			});
		}
	});
});