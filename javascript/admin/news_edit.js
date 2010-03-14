/**
 * @author sauger
 */
	var related_news = new Array();
	function add_related_news(id){
		related_news.push(id);
		$('#hidden_related_news').attr('value',related_news.join(','));
	}

	function remove_related_news(id){
		icount = related_news.length;
		for(i=0;i<icount;i++){
			if(related_news[i] == id){
				related_news.splice(i,1);
			}
		}
		$('#hidden_related_news').attr('value',related_news.join(','));
	}	
	function display_related_news(){
		if ($('#td_related_news')){
			$('#td_related_news').html("已关联相关新闻 " + related_news.length + " 条 " + '<a style="color:blue;" href="#" id="a_related_news">编辑</a>');
			$('#a_related_news').colorbox({href:'news_filter.php?show_div=1'});
			$('hidden_related_news').val(related_news.join(','));
		}
	};
$(function(){
	$('#news_edit').submit(function(){		
		var video_array = new Array('flv','wmv','wav','mp3','mp4','avi','rm');
		var pic_array = new Array('jpg','png','bmp','gif','icon');
		if($('#video_src').val() != ''){
			var video_src = $('#video_src').val().replace(/.+\./,'');
			video_src = video_src.toLowerCase();
			if(jQuery.inArray(video_src,video_array) == -1){
				alert('视频格式不支持,请转换格式后再上传!可上传格式:' + video_array.join('|'));
				return false;
			}
		}
		if($('#video_pic').val() != ''){
			var video_pic = $('#video_pic').val().replace(/.+\./,'');
			video_pic = video_pic.toLowerCase();
			if(jQuery.inArray(video_pic,pic_array) == -1){
				alert('图片格式不支持,请转换格式后再上传!可上传格式:' + pic_array.join('|'));
				return false;
			}
		}
		if($('#news_keywords').val()==''){
			alert("请输入关键字!");
			return false;
		}
		var title = $("#title").val();
		if(title==""){
			alert("请输入标题！");
			return false;
		}	
		var short_title = $("#short_title").val();
		if(short_title==""){
			alert("请输入短标题！");
			return false;
		}
		var oEditor = FCKeditorAPI.GetInstance('news[content]') ;
		var content = oEditor.GetHTML();
		if(news_type==1&&content==""){
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
		news_type=  $('#td_newstype').find('input:checked').attr('value');
		if(news_type == 3){
			if($('#target_url input').attr('value')== ''){
				alert('请输入新闻目标地址!');
				return false;
			}
		}else if(news_type==2 && $('#file_name').next('a').length <= 0 && $('#file_name').val() == ''){
			alert('请选择上传的文件!');
			return false;
		}
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
	
	
	$('#a_related_news').colorbox({href:'news_filter.php?show_div=1'});
});