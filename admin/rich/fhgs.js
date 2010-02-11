$(function(){
	$("#gs_add").click(function(){
			window.location.href="fhgs.php?xm="+encodeURI($("#fh_xm").attr('value'))+"&mc="+$("#gsmc").attr('value')+"&id="+$("#id").attr('value');
		});
})