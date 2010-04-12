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
			var i = $(this).attr('id').substr(7,1);
			$('#div_caption' + i).show();
			if(i== 1){
			  i = 2;	
			}else{
			  i = 1;
			}
			$('#div_caption' + i).hide();
		});
		
		$("#column_box .content").hover(function(){
			$(".cloumn_news_box").hide();
			$(".cloumn_news_box[name="+$(this).attr('name')+"]").show();
			$('.cpic').css('opacity','0.4');
			$(this).find(".cpic").css('opacity','1');
			$('.cpic').css('filter','alpha(opacity=86)');
			$(this).find(".cpic").css('filter','alpha(opacity=100)');
		});
		
		$("#column_btnr").click(function(){
			var flag = true;
			$("#column_btnl").css('background','url(/images/index/column_btnl.jpg) no-repeat');
			$("#column_btnl").css('cursor','pointer');
			if($("#column_box").find(".content:visible:eq(2)").next().attr('class')=='content'){
				$('.cpic').each(function(){
					if($(this).css('opacity')=='1'&&flag){
						$('.cpic').css('opacity','0.4');
						$(this).parent().next().find('.cpic').css('opacity','1');
						$('.cpic').css('filter','alpha(opacity=86)');
						$(this).parent().next().find('.cpic').css('filter','alpha(opacity=100)');
						flag = false;
						$(".cloumn_news_box").hide();
						$(".cloumn_news_box[name="+$(this).parent().next().attr('name')+"]").show();
					} 
				 });
				$("#column_box").find('.content:visible:eq(0)').hide();
			}
			if($("#column_box").find(".content:visible:eq(2)").next().attr('class')!='content'){
				$("#column_btnr").css('background','none');
				$("#column_btnr").css('cursor','auto');
			}
		});
		
		$("#column_btnl").click(function(){
			var flag = true;
			$("#column_btnr").css('background','url(/images/index/column_btnr.jpg) no-repeat');
			$("#column_btnr").css('cursor','pointer');
			if($("#column_box").find(".content:visible:eq(0)").prev().attr('class')=='content'){
				$("#column_box").find('.content:visible:eq(0)').prev().show();
				$('.cpic').each(function(){
					if($(this).css('opacity')=='1'&&flag){
						$('.cpic').css('opacity','0.4');
						$(this).parent().prev().find('.cpic').css('opacity','1');
						$('.cpic').css('filter','alpha(opacity=86)');
						$(this).parent().prev().find('.cpic').css('filter','alpha(opacity=100)');
						flag = false;
						$(".cloumn_news_box").hide();
						$(".cloumn_news_box[name="+$(this).parent().prev().attr('name')+"]").show();
					} 
				 });
			}
			if($("#column_box").find(".content:visible:eq(0)").prev().attr('class')!='content'){
				$("#column_btnl").css('background','none');
				$("#column_btnl").css('cursor','auto');
			}
		});
		
		$("#old_magazine").change(function(){
			$.post('/inc/show_magazine.php',{'year':$("#old_magazine").val()},function(data){
				$("#show_magazine").html(data);
			});
		});
});





setTimeout("head_line2()",7000);
