$(function(){
	$("#add_item").click(function(){
		$("#first").after('<tr class=tr4><td width="130">题目</td><td width="695" align="left"><input type="text" name="title[]"></td></tr><tr class=tr4 id="first"><td width="130">上传照片</td><td align="left"><input type="hidden" name="MAX_FILE_SIZE1" value="2097152"><input type="file" name="photo[]">（请上传小于2M的照片）　<button class="remove_item" type="button">删除</button></td></tr>');
	});
	
	$(".remove_item").live('click',function(){
		$(this).parent().parent().add($(this).parent().parent().prev()).remove();
	});
	
	$(".remove_old_item").click(function(){
		$.post('delete_fad.php',{'id':$(this).next().val()});
		$(this).parent().parent().add($(this).parent().parent().prev()).remove();
	})
	
});
