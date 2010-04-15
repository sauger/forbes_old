$(function(){
	$('*[pos]').each(function(){
		$(this).hover(function(){
			var top =  parseInt($(this).offset().top);
			var right =  $(this).offset().left;
			$('#admin_edit_div').remove();
			var str = "<div id='admin_edit_div' pos_name='" + $(this).attr('pos') +"' style='cursor:pointer; position: absolute;left:" +right +"px;top:" +top+"px;' title='编辑位置内容'><img style='cursor: pointer' src='/images/btn_edit.png' ></div>";
			$(this).append(str);
		});
	});
	
	$('#admin_edit_div').live('click',function(){
		var $this = $(this);
		alert(1);
		parent.$.fn.colorbox({
			href: '/admin/position/edit.php?pos_name=' + $($this).attr('pos_name'),
			width:'800px',
			height: '600px',
			iframe: true
		});
	});

});