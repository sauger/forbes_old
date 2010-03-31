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
	
	$('.static_news').click(function(e){
		e.preventDefault();
		$.post('/admin/static/?type=news&id=' + $(this).attr('href'),{},function(data){
			alert(data);
		});
	});
	
	$('.publish_news').click(function(e){
		e.preventDefault();
		$.post('/admin/static/static_news.php?type=publish&id='+ $(this).attr('name'),function(data){
			eval(data);
		});
	});
	$('.unpublish_news').click(function(e){
		e.preventDefault();
		$.post('/admin/static/static_news.php?type=unpublish&id='+ $(this).attr('name'),function(data){
			eval(data);
		});
	});
	
});
	