	var company_array=new Array();
var json_options = {
		script:'/admin/company/_company_list.php?json=true&limit=6&',
		varname:'name',
		json:true,
		shownoresults:true,
		maxresults:16,
		meth:'post',
		noresults:"没有匹配的记录",
		valueSep:" "
		};
function validate_company(name){
	$.post('/admin/company/validate_company.post.php',{'name':name},function(data){
		add_company(data,name);
	});
}

function add_company(id, name){
	if(id > 0){
		if ($.inArray(id, company_array) > -1){
			alert('请不要重复添加');
			return false;
		}
		$("#a_com").after('<tr class=tr4><td>关联公司</td><td align="left">'+name+'　持股数：<input class="number required" type="text" name="stock[]">单位为100股，即1代表100股　<button class="del_com" type="button">删除</button><input class="h_company" name="company[]" type="hidden" value="'+id+'"></td></tr>');
		company_array.push(id);
	}else{
		alert('请输入一个有效的公司！2');
	}
}
$(function(){
	$('#company_input').autoComplete(json_options);
	$(".del_com").live('click',function(){
		for(var j=0;j<company_array.length;j++){
			if(company_array[j]==$(this).next().val()){
				company_array.splice(j,1);
			}
		}
		$(this).parent().parent().remove();
	});
	
	$(".del").click(function(){
		$.post('/admin/rich/del_com.php',{"id":$(this).next().val()},function(data){
		})
		for(var j=0;j<company_array.length;j++){
			if(company_array[j]==$(this).next().next().val()){
				company_array.splice(j,1);
			}
		}
		$(this).parent().parent().remove();
	});
	

	
	$(".o_company").each(function(){
		company_array.push($(this).val());
	});
	
	
	$("#add_company").click(function(){
		var company_name = $.trim($('#company_input').val());
		if(company_name == ""){
			alert('请输入一个有效的公司！1');
			return false;
		}
		validate_company(company_name);
	});
});
