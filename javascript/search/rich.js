$(function(){
	$("#search").click(function(){
		search();
	});
});

function search(){
	var name = encodeURI($("#name").val());
	var year = encodeURI($("#year").val());
	var asset = encodeURI($("#asset").val());
	var nationality = encodeURI($("#nationality").val());
	var industry = encodeURI($("#industry").val());
	
	var url = "rich.php?";
	if(name!=''){
		url = url+"&name="+name;
	}
	if(year!=''){
		url = url+"&year="+year;
	}
	if(asset!=''){
		url = url+"&asset="+asset;
	}
	if(nationality!=''){
		url = url+"&nationality="+nationality;
	}
	if(industry!=''){
		url = url+"&industry="+industry;
	}
	if(url!='rich.php?'){
		window.location.href=url;
	}
}