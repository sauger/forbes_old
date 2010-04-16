/**
 * @author sauger
 */
	function refresh_related_news(){
		if($('#hidden_related_news').val()){
			$('#span_related_news').html($('#hidden_related_news').val().split(',').length);
		}else{
			$('#span_related_news').html('0');
		}
	}
	function refresh_related_industry(){
		if($('#hidden_related_industry').val()){
			$('#span_related_industry').html($('#hidden_related_industry').val().split(',').length);
		}else{
			$('#span_related_industry').html('0');
		}
	}
	function save_related_industry(ids){
		$('#hidden_related_industry').val(ids);
		refresh_related_industry();
		$('#a_related_industry').colorbox({href:'industry_filter.php?ids='+ $('#hidden_related_industry').val()});
	}
	function save_related_news(ids){
		$('#hidden_related_news').val(ids);
		refresh_related_news();
		$('#a_related_news').colorbox({href:'news_filter.php?show_div=1&selected_news=' + $('#hidden_related_news').val()+'&call_back=save_related_news'});
	}
	function refresh_sub_headlines(){
		if($('#hidden_sub_headline').val()){
			$('#span_sub_headline').html($('#hidden_sub_headline').val().split(',').length);
		}else{
			$('#span_sub_headline').html('0');
		}
	}
	function save_sub_headlines(ids){
		$('#hidden_sub_headline').val(ids);
		refresh_sub_headlines();
		$('#a_sub_headline').colorbox({href:'news_filter.php?show_div=1&selected_news=' + $('#hidden_sub_headline').val()+'&call_back=save_sub_headlines'});
	}	
	
function add_keyword(keyword){
	if(keyword == ''){
		alert('请输入关键字!');
		$('#auto_keywords').focus();
		return;
	}
	var can_add = true;
	$('#sel_keywords').find('option').each(function(){
		if($(this).val() == keyword){
			alert('请不要重复添加');
			can_add = false;
			return;
		}
	});
	if(can_add)
		$('#sel_keywords').append('<option value="' + keyword + '">' + keyword + '</option>');
}
function delete_keyword(){
	var items = $('#sel_keywords option:selected');
	if(items.length <= 0){
		alert('请选择需要删除的关键字');
		return false;
	}
	if(false === confirm('您确定要删除选中的关键字吗？')) return;
	items.each(function(){
		$(this).remove();
	});
}
$(function(){
	$('#auto_keywords').autocomplete({
		
		source:'/admin/keywords/filter_keywords.php'
	});
	$('#add_keyword').click(function(){
		var	keyword = $('#auto_keywords').val();
		add_keyword(keyword);
	});
	$('#delete_keyword').click(function(){
		delete_keyword();
	});
	
	var filte_words;
	var filte_len;
	
	$.post('/admin/filte_words/words.php',function(data){
		filte_words = data.split('|');
		filte_len = filte_words.length;
	});
	$('#a_related_industry').colorbox({href:'industry_filter.php?ids='+ $('#hidden_related_industry').val()});
	$('#publish_schedule').datepicker({
		changeMonth: true,
		changeYear: true,
		monthNamesShort:['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dayNamesMin:["日","一","二","三","四","五","六"],
		dayNamesShort:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
		dateFormat: 'yy-mm-dd',
		onSelect: function(date){
			var time;
			if($(this).data('endtime')){
				time = $(this).data('endtime');
			}else{
				time = "00:00:00";
			}
			$(this).val(date + " " + time);
		},
		beforeShow: function(input){
			var time = $(this).val();
			time = time.split(' ');
			time = time[time.length-1];
			$(this).data('endtime',time);
		}
	});
	$('#publish_schedule_select').change(function(){
		if(false === $(this).attr('checked')){
			$(this).data('save_time',$('#publish_schedule').val());
			$('#publish_schedule').val('');
			$('#publish_schedule').attr('disabled',true);
		}else{
			$('#publish_schedule').attr('disabled',false);
			$('#publish_schedule').val($(this).data('save_time'));
		}
	});
	$('#news_edit').submit(function(){		
		var video_array = new Array('flv','wmv','wav','mp3','mp4','avi','rm');
		var pic_array = new Array('jpg','png','bmp','gif','icon');
		/*
		 * key words handling
		 */
		var keywords = new Array();
		$('#sel_keywords option').each(function(){
			keywords.push($(this).val());
		});
		$('#news_keywords').val(keywords.join('||'));
		if($('#news_keywords').val()==''){
			alert("请输入关键字!");
			return false;
		}
		var title = $('#news_title').val();
		if(title==""){
			alert("请输入标题！");
			return false;
		}	
		var short_title = $('#news_short_title').val();
		if(short_title==""){
			alert("请输入短标题！");
			return false;
		}
		var editor = CKEDITOR.instances['news[content]'] ;
		var content = editor.getData();
		if(content==""){
			alert("请输入新闻内容！");
			return false;
		}
		var editor = CKEDITOR.instances['news[description]'];
		var description = editor.getData();
		priority = $('#priority').attr('value');
		if(priority == '') priority = 100;
		
		$('#priority').attr('value', priority);
		var category_count = $('.category_select').length;
		category_id = $('.category_select:last').attr('value');
		if(category_id == -1){
			if(category_count < 2){
				alert('请选择分类!');
				return false;	
			}else{
				category_id = $('.category_select:eq('+ (category_count - 2) + ')').val();
			}
		}
		/* fitler words
		 */
		for(i=0;i< filte_len; i++){
			if(title.indexOf(filte_words[i])!=-1){
				if(confirm('标题中包含敏感词"' + filte_words[i]+'",是否忽略敏感词？') === false)
				return false;
			}
			if(short_title.indexOf(filte_words[i])!=-1){
				if(confirm('短标题中包含敏感词"' + filte_words[i]+'",是否忽略敏感词？!') === false)
				return false;
			}
			if($('#news_wap_title').val().indexOf(filte_words[i])!=-1){
				if(confirm('wap标题中包含敏感词"' + filte_words[i]+'",是否忽略敏感词？!') === false)
				return false;
			}
			if(description.indexOf(filte_words[i])!=-1){
				if(confirm('简短描述中包含敏感词"' + filte_words[i]+'",是否忽略敏感词？!') === false)
				return false;
			}
			if(content.indexOf(filte_words[i])!=-1){
				if(confirm('内容中包含敏感词"' + filte_words[i]+'",是否忽略敏感词？!') === false)
				return false;
			}
		};
		$('#category_id').val(category_id);
		//handle the news_copy
		if($('#tr_copy_news').css('display') != 'none'){
			var copy_cateogry_id = $('.category_select_copy:last').val();
			if(copy_cateogry_id <= 0 ){
				var copy_category_count = $('.category_select_copy').length;
				if(copy_category_count < 2){
					copy_cateogry_id = 0;	
				}else{
					copy_cateogry_id = $('.category_select_copy:eq('+ (copy_category_count - 2) + ')').val();
				}
			}
			$('#hidden_copy_news').val(copy_cateogry_id);
			
		}else{
			$('#hidden_copy_news').val(0);
		};
		return true;
	});	
	$('#news_ad_id,#news_forbbide_copy').change(function(){
		if($(this).attr('checked')){
			$('#input_' + $(this).attr('id')).val('1');
		}else{
			$('#input_' + $(this).attr('id')).val('0');
		}
	});	
	$('#delete_english_news').click(function(e){
		e.preventDefault();
		if(!window.confirm("确定要删除吗"))
		{
			return false;
		}
		else
		{
			$.post("/admin/news/delete_english_news.post.php",{'del_id':$(this).attr('href'),'ch_id':$('#hidden_news_id').val()},function(data){
				window.location.reload();
			});
		}
	});
	$('#a_delete_pdf').click(function(e){
		e.preventDefault();
		$('#news_edit').append('<input type="hidden" name="news[pdf_src]" value=""></input>');
		$(this).parent().find('a').remove();
	});
	$('#a_delete_pic').click(function(e){
		e.preventDefault();
		$('#news_edit').append('<input type="hidden" name="news[video_photo_src]" value=""></input>');
		$(this).parent().find('a').remove();
	});	
	
	$('#copy_news').live('click',function(e){
		e.preventDefault();
		$('#tr_copy_news').show();
		$(this).hide();
	});
	$('#delete_copy_news').live('click',function(e){
		e.preventDefault();
		$('#copy_news').show();
		$('#tr_copy_news').hide();
		$(this).next().val(0);
	});
	$('#a_sub_headline').colorbox({href:'news_filter.php?selected_news=' + $('#hidden_sub_headline').val()+'&call_back=save_sub_headlines'});
	$('#a_related_news').colorbox({href:'news_filter.php?selected_news=' + $('#hidden_related_news').val()+'&call_back=save_related_news'});
	refresh_sub_headlines();
	refresh_related_news();
	refresh_related_industry();
	var json_options = {
			script:'/admin/user/_user_autocomplete.php?limit=6&',
			varname:'auto_name',
			json:true,
			shownoresults:true,
			maxresults:16,
			meth:'post',
			//noresults:"没有匹配的记录",
			valueSep:null
	};
	$('#news_author').autocomplete({
		source:'/admin/user/_user_autocomplete.php?'
	});
	$('#news_author_type').change(function(e){
		var author_type= $(this).val();
		//记者
		if(author_type == 1 && $('#news_author').val()){
			$.post('/admin/user/_check_user.php',{'name':$('#news_author').val(),'role_name':'journalist'},function(data){
				data = parseInt(data);
				if(data <= 0){
					$('#news_author').val('');
					$('#news_author').focus();
				}
				$('#news_author_id').val(data);
			});
		}else if(author_type == 2){
			$.post('/admin/user/_check_user.php',{'name':$('#news_author').val(),'role_name':'author'},function(data){
				data = parseInt(data);
				if(data <= 0){
					$('#news_author').val('');
					$('#news_author').focus();
				}
				$('#news_author_id').val(data);
			});
		}
	});
});