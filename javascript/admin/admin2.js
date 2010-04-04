$(function(){
	var selected_main_menu = $('#menu_item_' + $('#main_menu_id').val());
	$(selected_main_menu).addClass('selected');
	
	$(".nav1_menu").hover(function(){
		$('div.nav1_menu').not($(selected_main_menu)).removeClass('selected');
		if($(this).data('selected') == true) return;
		$(this).addClass('selected');
	},function(){
		$(this).not($(selected_main_menu)).removeClass('selected');
	});
	
	$(".tr3").hover(function(){
		$(this).addClass('selected');
	},function(){
		$(this).removeClass('selected');
	});

});