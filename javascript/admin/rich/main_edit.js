/**
 * @author loong
 */
$(function(){
	$('#div_tab').tabs({selected:0});
	$('.a_delete').live('click',function(e){
		e.preventDefault();
		var ob = $(this);
		if($(this).next().val()!='0'){
			if(confirm("删除后无法恢复，您确认要删除改记录吗？")){
				$.post('delete_rich_company.php',{'id':$(this).next().val()},function(data){
					if(data){
						alert(data);
					}else{
						$(ob).parent().parent().remove();
					}
				});
			}
		}else{
			$(ob).parent().parent().remove();
		}
		
	});
	$('#btn_add').click(function(){
		$('#company_filter').show();
		return false;
	});
	$('#btn_search').live('click',function(){
		$('#company_filter').load("filter_company.php?s_text=" + encodeURI($('#s_text').val()));
		return false;
	});
	$('.add_compay_info').live('click',function(){
		var str = '<tr class="tr3"><td>' + $(this).parent().parent().find('td:eq(0)').html()+'</td>'
				+ '<td>' + $(this).parent().parent().find('td:eq(1)').html()+'</td>'
				+ '<td><input type="text"  value="0"></input></td>'
				+ '<td>	<a href="#" class="a_delete"><img src="/images/btn_delete.png" border="0"></a>'
				+ '<input type="hidden" class="c_hidden" value="0"></input>'
				+ '<input type="hidden" value="'+ $(this).parent().parent().attr('id') +'"></input>'
				+ '</td></tr>';
		$('#table_rich').find('tr.tr3:last').before(str);
		return false;
	});
	$('a.a_delete_add').live('click',function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
	});
	$('#btn_save').click(function(){
		var ids = new Array();
		$('#table_rich').find('.tr4').each(function(){
			ids.push($(this).find('input:eq(1)').val() +'|'+ $(this).find('input:eq(0)').val() +'|'+$(this).find('input:eq(2)').val());
		});
		$.post('edit_rich_company.post.php',{'params':ids.join(','),'rich_id':$('#id').val()},function(data){
			var ids = data.split(',');
			$('.c_hidden').each(function(i){
				$(this).val(ids[i]);
			});
			alert("保存成功");
			//location.reload();
		});
		return false;
	});
	
	$(".f_delete").live('click',function(){
		var ob = $(this);
		if($(this).next().val()!='0'){
			if (confirm("删除后无法恢复，您确认要删除改记录吗？")) {
				$.post('del_fortune.php', {
					'id': $(this).next().val()
				}, function(data){
					if (data) {
						alert(data);
					}
					else {
						$(ob).parent().parent().remove();
					}
				});
			}
		}else{
			$(this).parent().parent().remove();
		}
		
	});
	
	$("#fortune_add").click(function(){
		var str = '<tr class="tr3"><td><input type="text" class="news_fortune"></input></td>'
				+ '<td><input type="text" class="news_fortune_class"></input></td>'
				+ '<td><input type="text" class="news_fortune_order"></input></td>'
				+ '<td><a class="f_delete"><img src="/images/btn_delete.png" border="0"></a>'
				+ '<input type="hidden" class="f_hidden" value="0"></input></td>'
		
		$("#fortune_box").after(str);
	});
	
	$("#fortune_save").click(function(){
		var ids = new Array();
		$('#table_fortune').find('.tr4').each(function(){
			ids.push($(this).find('input:eq(3)').val() +'|'+ $(this).find('input:eq(0)').val() +'|'+ $(this).find('input:eq(1)').val() +'|'+$(this).find('input:eq(2)').val());
		});
		$.post('edit_rich_fortune.post.php',{'params':ids.join(','),'rich_id':$('#id').val()},function(data){
			var ids = data.split(',');
			$('.f_hidden').each(function(i){
				$(this).val(ids[i]);
			});
			alert("保存成功");
		});
		return false;
	});
})