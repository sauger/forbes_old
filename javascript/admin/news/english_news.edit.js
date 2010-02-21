/**
 * @author loong
 */
function toggle_english_news_type(){
	news_type=  $('#td_newstype_en').find('input:checked').attr('value');
	if (news_type == 1){
		$('.normal_news').show();
		$('#target_url_en').hide();
		$('#tr_file_name_en').hide();
	}else if(news_type == 2){
		$('.normal_news').hide();
		$('#target_url_en').hide();
		$('#tr_file_name_en').show();
	}else if(news_type == 3){
		$('.normal_news').hide();
		$('#target_url_en').show();
		$('#tr_file_name_en').hide();
	}
}
$(function(){
	toggle_english_news_type();
});