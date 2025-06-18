/*
function posli(){
	document.getElementById('otroskaFrm').submit();
}

function premedikacijaFunction(premedikacija, navodila){
	document.getElementById('premedPredOp').innerHTML= premedikacija;
	document.getElementById('navodila').innerHTML= navodila;
	alert('premedikacija');
	console.log(document.getElementById('navodila').innerHTML); 
}
*/

function ajax_sprememba(){
	var ucinkovina = $("input[name='ucinkovina']").val();	
	var teza = $("#tezaPremedikacijaId").val();
	var sprememba = $("#sprememba").val();
alert(ucinkovina);	
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
			$("#navodila").html(rsp.navodila);
			$("#premedPredOp").html(rsp.premedikacija);
		}
		
	});
}