$(function(){
	$("#table").change(function(){
		$(".add").remove();
		$.post('load_table.php',{'table':$(this).val()},function(data){
			$("#table_select").after(data);
		});
	});
	
});
