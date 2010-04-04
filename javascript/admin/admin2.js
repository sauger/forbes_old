$(function(){
	var selected_main_menu =0;  
	var selected_sub_menu = 0;
	function refresh_menu(){
		selected_main_menu = $('#main_menu_id').val();
		selected_sub_menu = $('#sub_menu_id').val();
		$('.nav1_menu,.nav2_menu').removeClass('selected');
		$('#menu_item_' + selected_main_menu + ',#menu_item_' + selected_sub_menu).addClass('selected');
	}
	$(".nav1_menu").hover(function(){
		$('div.nav1_menu').not($('#menu_item_' + selected_main_menu)).removeClass('selected');
		if($(this).data('selected') == true) return;
		$(this).addClass('selected');
	},function(){
		$(this).not($('#menu_item_' + selected_main_menu)).removeClass('selected');
	});
	
	$(".nav1_menu").click(function(){
		var parent_id =$(this).attr('id').substr(10);
		$('.nav2_menu').hide();
		$('.nav2_menu[parent_id=' + parent_id+']').show();
		$('#main_menu_id').val(parent_id);
		refresh_menu();
	});
	
	
	$('.nav1_menu:eq(1)').click();
	
	$(".nav2_menu").hover(function(){
		$('div.nav2_menu').not($('#menu_item_' + selected_sub_menu)).removeClass('selected');
		if($(this).data('selected') == true) return;
		$(this).addClass('selected');
	},function(){
		$(this).not($('#menu_item_' + selected_sub_menu)).removeClass('selected');
	});	
	
	$(".nav2_menu a").click(function(e){
		e.preventDefault();
		$('#admin_content').load($(this).attr('href'));
	});
	
	$(".tr3").hover(function(){
		$(this).addClass('selected');
	},function(){
		$(this).removeClass('selected');
	});
	

});