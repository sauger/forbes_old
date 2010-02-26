var json_options = {
		script:'/admin/city/_city.php?limit=6&',
		varname:'name',
		json:true,
		shownoresults:true,
		maxresults:16,
		meth:'post',
		noresults:"没有匹配的记录",
		valueSep:null
		};

$(function(){
	var city_name = $('#city_name').val();
	
	$('#city_name').autoComplete(json_options);
	
	/*
	$("#city_name").change(function(){
		$.post('check_name.php',{'name':$('#city_name').val(),'list_id':$("#list_id").val()},function(data){
			if(data=='no_data'){
				$("#err_info").html('该城市不存在，请重新输入');
				$("#city_name").focus();
			}else if(data=='has_data'){
				if(city_name==$('#city_name').val()){
					$("#err_info").html('');
				}else{
					$("#err_info").html('该城市已存在，请重新输入');
					$("#city_name").focus();
				}
			}else{
				$("#city_id").attr('value',data);
				$("#err_info").html('');
			}
		});
	});
	*/
	
	$("#finish").click(function(){
		if($("#city_name").val()==''){
			$("#err_info").html('请输入城市');
			$("#city_name").focus();
		}else{
			$.post('check_name.php',{'name':$('#city_name').val(),'list_id':$("#list_id").val()},function(data){
				if(data=='no_data'){
					$("#err_info").html('该城市不存在，请重新输入');
					$("#city_name").focus();
				}else if(data=='has_data'){
					if(city_name==$('#city_name').val()){
						$("#city_edit").submit();
					}else{
						$("#err_info").html('该城市已存在，请重新输入');
						$("#city_name").focus();
					}
				}else{
					$("#city_id").attr('value',data);
					$("#err_info").html('');
					$("#city_edit").submit();
				}
			});
		}
	});
});
