$(function(){
	var industry_array=new Array();
	
	$(".o_industry").each(function(){
		industry_array.push($(this).val());
	});
	
	$("#add_company").click(function(){
		if($("#ind_id").val()==''){
			alert('请选择一个行业');
		}else{
			if($.inArray($("#ind_id").val(),industry_array)>-1){
				alert('请不要重复添加');
				return false;
			}else{
				$("#a_com").after('<tr class=tr4><td class=td1>关联行业</td><td><span style="float:left;">'+$("#ind_id  option:selected").text()+'</span><input class="del_ind" type="button" value="删除"><input class="h_industry" name="industry[]" type="hidden" value="'+$("#ind_id").val()+'"></td></tr>')
				industry_array.push($("#ind_id").val());
			}
		}
	});
	
	$(".del_ind").live('click',function(){
		for(var j=0;j<industry_array.length;j++){
			if(industry_array[j]==$(this).next().val()){
				industry_array.splice(j,1);
			}
		}
		$(this).parent().parent().remove();
	});
	
	$(".del_old").click(function(){
		$.post('/admin/company/del_ind.php',{"id":$(this).next().val()},function(data){
		})
		for(var j=0;j<industry_array.length;j++){
			if(industry_array[j]==$(this).next().next().val()){
				industry_array.splice(j,1);
			}
		}
		$(this).parent().parent().remove();
	});
});
