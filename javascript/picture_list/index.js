var interval = 2000;
var timeout_handler;
var images = ['2JSbUfRjPD.jpg','72LhlnZ105.jpg','bj8RsjL77e.jpg'];
var start = 0;
function debug(str){
	$('#debug').append(str+'<br/>');
};
function change_images(step){
	start = (start + step) % images.length;	
	$('#picture_list img').each(function(i){
		var display_index = (start + i) % 3;
		$(this).attr('src',"/upload/" + images[display_index]);
		if(i == 0){
			$(this).addClass('selected');
		}else{
			$(this).removeClass('selected');
		}
	});
}
function timeout_func(){
	change_images(1);
	timeout_handler = setTimeout("timeout_func()",interval);
}
$(function(){

	timeout_handler = setTimeout("timeout_func()",interval);
	$('#btn_prev').click(function(){
		clearTimeout(interval);
	});
	
	$('#btn_play').toggle(function(){
		$(this).attr('src','/images/imagephb/play.jpg');
		clearTimeout(timeout_handler);
	},function(){
		$(this).attr('src','/images/imagephb/pause.jpg');
		timeout_handler = setTimeout("timeout_func()",interval);
	});
	$('#slider').slider(
	{
		change: function(event,ui){
			//$('#btns').html($(this).slider("option",'value'));
		},
		value:40
	});
});