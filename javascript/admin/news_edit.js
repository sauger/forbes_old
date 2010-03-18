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
$(function(){
	$('#news_edit').submit(function(){		
		var video_array = new Array('flv','wmv','wav','mp3','mp4','avi','rm');
		var pic_array = new Array('jpg','png','bmp','gif','icon');
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
		priority = $('#priority').attr('value');
		if(priority == '') priority = 100;
		
		$('#priority').attr('value', priority);
		category_id = $('.category_select:last').attr('value');
		if(category_id == -1){
			alert('请选择分类!');
			return false;
		}
		$('#category_id').val(category_id);
		//handle the news_copy
		if($('#tr_copy_news').css('display') != 'none'){
			var copy_cateogry_id = $('.category_select_copy:last').val();
			if(copy_cateogry_id > 0 ){
				$('#hidden_copy_news').val(copy_cateogry_id);
			}else{
				$('#hidden_copy_news').val(0);
			}
			
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
	$('#news_author').autoComplete(json_options);
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