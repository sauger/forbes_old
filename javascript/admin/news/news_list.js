/**
 * @author loong
 */
$(function(){
	$('#search_button').click(function(){
		search_news();
	});
	$('select.sau_search').change(function(){
		search_news();
	});
	$('input[name=title]').keypress(function(e){
		if(e.keyCode == 13){
			search_news();
		}
	});
	
	$('.static').click(function(){
		$.post('http://localhost:84/static.php?type=news&id=' + $(this).attr('news_id'),{},function(data){
		});
	});
	
});
	