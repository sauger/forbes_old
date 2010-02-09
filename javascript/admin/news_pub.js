/**
 * @author sauger
 */
var category_count = 0;

$(function(){
	$('#td_newstype input').click(function(){
		toggle_news_type();
	});
});


function toggle_news_type(){
	news_type=  $('#td_newstype').find('input:checked').attr('value');
	if (news_type == 1){
		$('.normal_news').show();
		$('#target_url').hide();
		$('#tr_file_name').hide();
	}else if(news_type == 2){
		$('.normal_news').hide();
		$('#target_url').hide();
		$('#tr_file_name').show();
	}else if(news_type == 3){
		$('.normal_news').hide();
		$('#target_url').show();
		$('#tr_file_name').hide();
	}
}
function str_length(str){
	//return   str.replace(/[^\x00-\xff]/g,"**").length;
	 var i;   
    var len;   
    len = 0;   
    for (i=0;i<str.length;i++)   
    {   
        if (str.charCodeAt >255) len+=2; else len++;   
    }   
    return len;  
}

 function remove_hmtl_tag(str) 
{ 
 	return str.replace(/<\/?.+?>/g,"");//去掉所有的html标记 
} 


