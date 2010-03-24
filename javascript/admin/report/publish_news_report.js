/**
 * @author loong
 */
$(function(){
	$(".date_jquery").datepicker(
		{
			changeMonth: true,
			changeYear: true,
			monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
			dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dayNamesMin:["日","一","二","三","四","五","六"],
			dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
			dateFormat: 'yy-mm-dd'
		}
	);
	$('#btn_ok').click(function(){
		$('#td_loading').show();
		$('#result').load('publish_news_report.post.php',{'start_time':$('#start_time').val(),'end_time':$('#end_time').val()},function(){
			$('#td_loading').hide();
		});
	});
	$('#detail').live('click',function(e){
		e.preventDefault();
		$('#div_detail').show();
	});
});
