var json_options = {
		script:'/admin/famous_list/_famous.php?limit=6&',
		varname:'name',
		json:true,
		shownoresults:true,
		maxresults:16,
		meth:'post',
		noresults:"没有匹配的记录",
		valueSep:null
		};
var json_options2 = {
		script:'/admin/famous_list/_list.php?limit=6&',
		varname:'name',
		json:true,
		shownoresults:true,
		maxresults:16,
		meth:'post',
		noresults:"没有匹配的记录",
		valueSep:null
		};


$(function(){
	$('#mr_id').autoComplete(json_options);
	$('#bd_id').autoComplete(json_options2);
	var old_name = $("#mr_id").val();
	var old_list = $("#bd_id").val();
	$("#finish").click(function(){
		if($("#f_type").val()==1){
			if($("#mr_id").val()==''){
				$("#error").html('不能为空');
				$("#mr_id").focus();
			}else{
				if(old_name!=$("#mr_id").val()){
					$.post('validate_famous.post.php',{'name':$("#mr_id").val(),"list_id":$("#bd_id").val()},function(data){
						if(data=='no'){
							$("#error").html('还没有添加该名人');
							$("#mr_id").focus();
						}else if(data=='has'){
							$("#error").html('该名人已经添加');
							$("#mr_id").focus();
						}else{
							$("#error").html('');
							$("#h_mr_id").attr('value',data);
							$("#fbd_edit").submit();
						}
					});
				}else{
					if($("#mr_id").val()==''){
						$("#error").html('还没有添加该名人');
						$("#mr_id").focus();
					}else{
						$("#error").html('');
						$("#fbd_edit").submit();
					}
				}
			}
		}else{
			if($("#bd_id").val()==''){
				$("#error").html('不能为空');
				$("#bd_id").focus();
			}else{
				$.post('validate_list.post.php',{'id':$("#mr_id").val(),'name':$("#bd_id").val(),},function(data){
					if(data=='no'){
						$("#error").html('还没有该榜单');
						$("#bd_id").focus();
					}else if(data=='has'){
						$("#error").html('该名人已经添加');
						$("#bd_id").focus();
					}else{
						$("#error").html('');
						$("#h_bd_id").attr('value',data);
						$("#fbd_edit").submit();
					}
				});
			}
		}
	});
});
