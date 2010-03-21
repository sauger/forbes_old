$(function(){
		$(".img_plus").click(function(){
			var main_id = $(this).attr('name');
			var img_id = $(this).attr('img_name');
			var array = img_id.split(',');
			
			
			if($("tr[name*='"+main_id+"']").css('display')=='none'){
				$(this).attr('src','/images/admin/moners.gif');
				$("tr[name*='"+main_id+"']").show();
			}else{
				$(this).attr('src','/images/admin/plus.gif');
				for(var i in array){
					$("tr[img_name*='"+array[i]+"']").hide();
					$("tr[img_name*='"+array[i]+"']").find('.middle').attr('src','/images/admin/plus.gif');
				}
			}
			
		});
});