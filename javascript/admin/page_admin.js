$(function(){
	$('*[pos]').each(function(){
		$(this).hover(function(){
			if($(this).find('#admin_edit_div').length > 0) return;
			var top =  parseInt($(this).offset().top);
			var right =  $(this).offset().left;
			$('#admin_edit_div').remove();
			var str = "<div id='admin_edit_div' pos_name='" + $(this).attr('pos') +"' style='z-index: 100; position: absolute;left:" +right +"px;top:" +top+"px;' title='编辑位置内容'><img style='cursor: pointer' src='/images/btn_edit.png' ></div>";
			$(this).append(str);
		},function(){});
	});
	
	$('#admin_edit_div img').live('click',function(){
		var $this = $(this);
		parent.$.fn.colorbox({
			href: '/admin/position/edit.php?pos_name=' + $($this).parent().attr('pos_name'),
			width:'800px',
			height: '600px',
			iframe: true
		});
	});
	
});