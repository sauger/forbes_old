var headline_id=0;
var is_changed=0;
var subject_id=0;

function head_line(now_id)
{
		$(".headline_btn2").css('background','url(/images/index/slideshow_unactive.gif) no-repeat');
		$("#"+now_id).css('background','url(/images/index/slideshow_active.gif) no-repeat');
	
		$(".headline_pic").hide();
		$("#headline_pic_"+now_id).show();

		$(".headline_title").hide();
		$("#headline_title_"+now_id).show();		

		$(".headline_description").hide();
		$("#headline_description_"+now_id).show();		

		$(".headline_related").hide();
		$("#headline_related_"+now_id).show();		
		
		headline_id=now_id;
		is_changed=1;
}

function head_line2()
{
	  if(is_changed=="1")
	  {
	  	is_changed=0;
			setTimeout("head_line2()",7000);
	  	return false;
	  }
		var now_id=headline_id;	
		now_id=parseInt(headline_id)+1;
    if(now_id>3){now_id=0;}

		$(".headline_btn2").css('background','url(/images/index/slideshow_unactive.gif) no-repeat');
		$("#"+now_id).css('background','url(/images/index/slideshow_active.gif) no-repeat');
	
		$(".headline_pic").hide();
		$("#headline_pic_"+now_id).show();

		$(".headline_title").hide();
		$("#headline_title_"+now_id).show();		

		$(".headline_description").hide();
		$("#headline_description_"+now_id).show();		

		$(".headline_related").hide();
		$("#headline_related_"+now_id).show();		
		
		headline_id=now_id;
		setTimeout("head_line2()",7000);
}		

$(function(){
		$(".headline_btn2").click(function()
		{
			var now_id=$(this).attr('id');	
			head_line(now_id);
		})
	
		$(".headline_btn1").click(function()
		{
			var now_id=$(this).attr('id');	
			if(now_id=="l"){now_id=parseInt(headline_id)-1;}
			else{now_id=parseInt(headline_id)+1;}
 	    if(now_id>3){now_id=0;}
 	    if(now_id<0){now_id=3;}

			head_line(now_id);
		})	
		
		
		$("#subject_btnl").click(function()
		{

			if(subject_id==0){return false;}
			
			$(".subject_content").hide();
			var subject_id1=parseInt(subject_id)-1;
			var subject_id2=parseInt(subject_id);
			var subject_id3=parseInt(subject_id)+1;

			$("#subject_content_"+subject_id1).show();
			$("#subject_content_"+subject_id2).show();
			$("#subject_content_"+subject_id3).show();
			subject_id=parseInt(subject_id)-1;


		})		
		
		$("#subject_btnr").click(function()
		{
			if(subject_id>=5){return false;}
			
			$(".subject_content").hide();
			var subject_id1=parseInt(subject_id)+1;
			var subject_id2=parseInt(subject_id)+2;
			var subject_id3=parseInt(subject_id)+3;
			
			$("#subject_content_"+subject_id1).show();
			$("#subject_content_"+subject_id2).show();
			$("#subject_content_"+subject_id3).show();
			subject_id=parseInt(subject_id)+1;

		})	
		
		$('#cls_cpt1,#cls_cpt2').hover(function(){
			$('div.caption_base').not(this).removeClass('caption_selected');
			$(this).addClass('caption_selected');
			var i = $(this).attr('id').substr(-1);
			$('#div_caption' + i).show();
			if(i== 1){
			  i = 2;	
			}else{
			  i = 1;
			}
			$('#div_caption' + i).hide();
		});
		
		
		
});





setTimeout("head_line2()",7000);
