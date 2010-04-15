var interval = 5000;
var timeout_handler;
var images = ['2JSbUfRjPD.jpg','72LhlnZ105.jpg','bj8RsjL77e.jpg'];
var start = 0;
var display_index = 0;
var auto_play = true;
function debug(str){
	$('#debug').append(str+'<br/>');
};

function display_images(){
	
	$('#picture_list img').each(function(i){
		$(this).attr('src',"/upload/" + images[start+i]);
		if(i==display_index){
			$(this).addClass('selected');
			$('#main_picture').attr('src',$(this).attr('src'));
		}else{
			$(this).removeClass('selected');
		}
	});
	
}
function change_images(step){
	clearTimeout(timeout_handler);
	display_index = display_index  + step;
	if(display_index > 2){
		display_index = 2;
		if(start + 3 >= images.length){
			//the last one
			start = 0;
			display_index = 0;
			
		}else{
			//left shift one image
			start = start + 1;
		}
	}else if(display_index < 0){
		if(start <= 0){
			return; //already the first one;
		}
		start  = start -1;
		display_index = 0;
	}else{
		
	}
	display_images();//refresh the images;
	if(auto_play){
		timeout_handler = setTimeout("timeout_func()",interval);
	}
}
function timeout_func(){
	change_images(1);
}
$(function(){

	timeout_handler = setTimeout("timeout_func()",interval);
	$('#btn_prev').click(function(){
		change_images(-1);
	});
	$('#btn_next').click(function(){
		change_images(1);
	});
	
	$('#btn_play').toggle(function(){
		$(this).attr('src','/images/imagephb/play.jpg');
		clearTimeout(timeout_handler);
		auto_play = false;
	},function(){
		$(this).attr('src','/images/imagephb/pause.jpg');
		auto_play = true;
		timeout_handler = setTimeout("timeout_func()",interval);
	});
	$('#slider').slider(
	{
		change: function(event,ui){
			interval = $(this).slider("option",'value') * 1000;
			$('#debug').html(interval);
			change_images(0);
		},
		min:3,
		max:30,
		value:5,
		animate:true
	});
});