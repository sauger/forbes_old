$(function(){
	$(".del_com").live('click',function(){
		$(this).parent().parent().remove();
		var j;
		for(j=0;j<company_array.length;j++){
			if(company_array[j]==$(this).next().val()){
				company_array.splice(j,1);
			}
		}
	});
	
	$(".del").click(function(){
		$.post('/admin/rich/del_com.php',{"id":$(this).next().val()},function(data){
		})
		var j;
		for(j=0;j<company_array.length;j++){
			if(company_array[j]==$(this).next().val()){
				company_array.splice(j,1);
			}
		}
		$(this).parent().parent().remove();
	});
	
	var company_array=new Array();
	
	$(".o_company").each(function(){
		company_array.push($(this).val());
	});
	
	
	$("#add_company").click(function(){
		if($("#gsid").val()==''){
			alert('请选择一个公司！');
		}else{
			if($.inArray($("#gsid").val(),company_array)>-1){
				alert('请不要重复添加');
				return false;
			}else{
				$("#a_com").after('<tr class=tr4><td>关联公司</td><td align="left">'+$("#gsid option:selected").text()+'　持股数：<input class="number" type="text" name="stock[]">单位为100股，即1代表100股　<button class="del_com" type="button">删除</button><input class="h_company" name="company[]" type="hidden" value="'+$("#gsid").val()+'"></td></tr>');
				company_array.push($("#gsid").val());
			}
		}
	});
});
