function send_search(){
	var s_text = $('#s_text').val();
	var url = "list_edit.php?s_text=" + encodeURI(s_text)+"&id="+$("#list_id").val();
	if ($('#s_list_type').val() >=0){
		url = url + '&s_list_type=' + $('#s_list_type').val();
	}
	if ($('#adopt').val()!=''){
		url = url + '&adopt=' + $('#adopt').val();
	}
	location.href = url;
}


$(function(){
	$('#search_b').click(function(){
		send_search();
	});
	$('#s_text').keypress(function(e){
		if(e.keyCode == 13){
			send_search();
		}
	});
	$('#adopt').change(function(){
		send_search();
	});
	
	$(".publish").live('click',function(){
		var ob = $(this);
		$.post('postion.post.php',{'type':'publish','pid':$("#list_id").val(),'nid':$(this).attr("name"),'p_type':'list'},function(data){
			if(data=='full'){
				alert('已经达到限制条目，请先删除后再添加');
			}else{
				window.location.reload();
			}
		});
	});
	
	$(".revocation").live('click',function(){
		var ob = $(this);
		$.post('postion.post.php',{'type':'revocation','nid':$(this).attr("name")},function(data){
			window.location.reload();
		});
	})
	
	$("#edit_priority").click(function(){
		if(!window.confirm("编辑优先级")){return false;}
		var id_str="";
		var priority_str="";
		
		$(".priority").each(function(){
			id_str=id_str+$(this).attr("name")+"|";
			priority_str=priority_str+$(this).attr("value")+"|";
		});
		$.post("postion.post.php",{'id_str':id_str,'priority_str':priority_str,'pid':$("#list_id").val(),'type':'edit_priority'},function(data){
			window.location.reload();
		});		
	})
});