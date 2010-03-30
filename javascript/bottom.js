$(function(){
	$(".next").click(function(){
		var num=$(this).attr("param");
		$("#sy"+num).css('display','none');	
		$("#sy"+(parseInt(num)+1)).css('display','inline');	
	});
	$(".prev").click(function(){
		var num=$(this).attr("param");
		$("#sy"+num).css('display','none');	
		$("#sy"+(parseInt(num)-1)).css('display','inline');	
	});
});
