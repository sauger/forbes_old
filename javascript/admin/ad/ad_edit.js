

function add_related_ad(id){
	related_ad.push(id);
	$('#hidden_related_ad').attr('value',related_ad.join(','));
}

function remove_related_ad(id){
	icount = related_ad.length;
	for(i=0;i<icount;i++){
		if(related_ad[i] == id){
			related_ad.splice(i,1);
		}
	}
	$('#hidden_related_ad').attr('value',related_ad.join(','));
}	
function display_related_ad(){
	$('#add_related_ad').html("已关联相关新闻 " + related_ad.length + " 条 " + '编辑');
	ad_href = old_href+"&related="+$('#hidden_related_ad').val()
	$('#add_related_ad').colorbox({href:ad_href});
	alert(ad_href);
};