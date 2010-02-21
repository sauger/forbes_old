/**
 * @author loong
 */

function search_news(){
    if(arguments.length   ==   0)  
    	class_name   =   'sau_search';  
    else
    	class_name = arguments[0]; 
	var url = new Array();
	$('.'+class_name).each(function(){
		url.push($(this).attr('name') + '=' + encodeURI($(this).val()));
	});
	
	url = "?" + url.join('&');
	//var url = "?title="+encodeURI($("#title").attr('value'))+"&category="+$("#category").attr('value')+"&adopt="+$("#adopt").attr('value');
	//url += "&language_tag=" + $('#language_tag').val();
	window.location.href=url;	
}
