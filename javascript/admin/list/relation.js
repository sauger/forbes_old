function send_search(){
	var s_text = $('#s_text').val();
	var url = "relation_list.php?s_text=" + encodeURI(s_text)+"&id="+$("#list_id").val();
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
	$('#adopt,#s_list_type').change(function(){
		send_search();
	});
	
	$(".publish").live('click',function(){
		var ob = $(this);
		$.post('relation.post.php',{'type':'publish','pid':$("#list_id").val(),'nid':$(this).attr("name")},function(data){
			window.location.reload();
		});
	});
	
	$(".revocation").live('click',function(){
		var ob = $(this);
		$.post('relation.post.php',{'type':'revocation','nid':$(this).attr("name")},function(data){
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
		$.post("relation.post.php",{'id_str':id_str,'priority_str':priority_str,'pid':$("#list_id").val(),'type':'edit_priority'},function(data){
			window.location.reload();
		});		
	})
});