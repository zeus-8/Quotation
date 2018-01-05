$("#refe").change(function(event){
	$.get("quotationC/"+event.target.value+"",function(response,localitie){
		console.log(response);
	});
});