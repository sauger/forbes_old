$(function(){
	$('#scxml').click(function(){
		$.post('/admin/luxury/write_flash.php',{'type':$(this).attr('param')},function(data){
				alert(data);
			});
	});
});