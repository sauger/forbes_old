$(function(){
	$('.right_title a').click(function(e){
		e.preventDefault();
		$(this).data('checked',!$(this).data('checked'));
		$(this).parent().parent().next().find("input:checkbox").attr('checked',$(this).data('checked'));
	});
});