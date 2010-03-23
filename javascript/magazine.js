$(function(){
	$("#next").click(function(){
		var ob = $(".top_picture:visible");
		$(ob).next().show();
		$(ob).hide();
		if($(ob).next().next()!='top_picture'){
			
		}
	});
	
	$("#prev").click(function(){
		var ob = $(".top_picture:visible");
		$(ob).prev().show();
		$(ob).hide();
	});
});
