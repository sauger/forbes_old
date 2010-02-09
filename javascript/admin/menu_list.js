$(function(){
		$(".img_plus").click(function(){
			var main_id = $(this).attr('name');
			if($("tr[name*='"+main_id+"']").css('display')=='none'){
				$(this).attr('src','/images/admin/moners.gif');
				$("tr[name*='"+main_id+"']").show();
			}else{
				$(this).attr('src','/images/admin/plus.gif');
				$("tr[name*='"+main_id+"']").hide();
			}
			
		});
});