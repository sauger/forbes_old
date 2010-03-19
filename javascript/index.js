var head_id=0;
function head(now_id)
{
		$(".head_btn2").css('background','url(/images/index/slideshow_unactive.gif) no-repeat');
		$("#"+now_id).css('background','url(/images/index/slideshow_active.gif) no-repeat');
	
		$(".head_pic").hide();
		$("#head_pic_"+now_id).show();

		$(".head_title").hide();
		$("#head_title_"+now_id).show();		

		$(".head_content").hide();
		$("#head_content_"+now_id).show();		

		$(".head_related").hide();
		$("#head_related_"+now_id).show();		
		
		head_id=now_id;
}

function head2()
{
		var now_id=head_id;	
		now_id=parseInt(head_id)+1;
    if(now_id>3){now_id=0;}

		$(".head_btn2").css('background','url(/images/index/slideshow_unactive.gif) no-repeat');
		$("#"+now_id).css('background','url(/images/index/slideshow_active.gif) no-repeat');
	
		$(".head_pic").hide();
		$("#head_pic_"+now_id).show();

		$(".head_title").hide();
		$("#head_title_"+now_id).show();		

		$(".head_content").hide();
		$("#head_content_"+now_id).show();		

		$(".head_related").hide();
		$("#head_related_"+now_id).show();		
		
		head_id=now_id;
		setTimeout("head2()",5000);
}		



$(function(){
	$(".head_btn2").click(function()
	{
		var now_id=$(this).attr('id');	
		head(now_id);
	})
	
	$(".head_btn1").click(function()
	{
		var now_id=$(this).attr('id');	
		if(now_id=="l"){now_id=parseInt(head_id)-1;}
		else{now_id=parseInt(head_id)+1;}
    if(now_id>3){now_id=0;}
    if(now_id<0){now_id=3;}

		head(now_id);
	})	



});


setTimeout("head2()",5000);
