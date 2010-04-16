$(function(){
	$('#scxml').click(function(){
		$.post('/admin/life/write_flash.php',{'type':$(this).attr('param')},function(data){
				alert(data);
			});
	});
});