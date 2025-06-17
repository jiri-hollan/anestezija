
function posli(){
	document.getElementById('otroskaFrm').submit();
}

function premedikacijaFunction(premedikacija, navodila){
	document.getElementById('premedPredOp').value= premedikacija;
	document.getElementById('navodila').value= navodila;
	alert('premedikacija');
	console.log(document.getElementById('navodila').value); 
}


function ajax_get_premedikacija(elem) {
	$elem = $(elem);	
	var ucinkovina = $elem.val();
	var teza = $("#tezaPremedikacijaId").val();
	var sprememba = $("#sprememba").val();	
	$.ajax({
		url: "/anestiz/premedikacijaNavodila/otroskaPremedikacija1.php",
		data: {
			"ucinkovina": ucinkovina,
			"teza": teza,
			"sprememba": sprememba
		},
		method: "GET",
		dataType: "json",
		cache: false,

	})
	.done(function( rsp ) {
		if (rsp.error !== undefined && rsp.error.length !== 0) {
			alert(rsp.error);
		} else {
			$("#navodila").val(rsp.navodila);
			$("#premedPredOp").val(rsp.premedikacija);
		}
		
	});
}