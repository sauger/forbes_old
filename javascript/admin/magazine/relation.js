/**
 * @author loong
 */

function search_news(){
    if(arguments.length   ==   0)  
    	class_name   =   'sau_search';  
    else
    	class_name = arguments[0];
	var url = new Array();
	var id = 'id='+$("#list_id").val();
	url.push(id);
	$('.'+class_name).each(function(){
		url.push($(this).attr('name') + '=' + encodeURI($(this).val()));
	});
	
	url = "?" + url.join('&');
	//var url = "?title="+encodeURI($("#title").attr('value'))+"&category="+$("#category").attr('value')+"&adopt="+$("#adopt").attr('value');
	//url += "&language_tag=" + $('#language_tag').val();
	window.location.href=url;
}


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
	
	$(".publish").live('click',function(){
		var ob = $(this);
		$.post('relation.post.php',{'type':'publish','pid':$("#list_id").val(),'nid':$(this).attr("name")},function(data){
			window.location.reload();
		});
	});
	
	$(".revocation").live('click',function(){
		var ob = $(this);
		$.post('relation.post.php',{'type':'revocation','nid':$(this).attr("name")},function(data){
			window.location.reload();
		});
	})
	
	$("#edit_priority").click(function(){
		if(!window.confirm("编辑优先级")){return false;}
		var id_str="";
		var priority_str="";
		
		$(".priority").each(function(){
			id_str=id_str+$(this).attr("name")+"|";
			priority_str=priority_str+$(this).attr("value")+"|";
		});
		$.post("relation.post.php",{'id_str':id_str,'priority_str':priority_str,'pid':$("#list_id").val(),'type':'edit_priority'},function(data){
			window.location.reload();
		});		
	})
});