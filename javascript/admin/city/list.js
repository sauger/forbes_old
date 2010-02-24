$(function(){
	$("#add_attribute").click(function(){
		$("#list_name").after('<tr class=tr4><td width="130">列名</td><td width="695" align="left"><input type="text" name="attr_name[]">　　　　优先级<input type="text" name="attr_priority[]">　　<button type="button" class="del_attr">删除</button></td></tr>')
	});
	
	$(".del_attr").live('click',function(){
		$(this).parent().parent().remove();
	});
	
	$(".del_old").click(function(){
		$.post('del_attr.php',{'id':$(this).next().val()});
		$(this).parent().parent().remove();
	});
});
