function seznamBolnisnicFunction(bolList) {
let text = "";
let i;	
//alert (bolList);
// koda, ki naredi array bolList iz tabele bolnisniceTab	
//alert(mestoBolnisnice);
	document.getElementById("demo").innerHTML = '<select id="bolnisnicaId"  class="imePriimek" placeholder=" Bolnisnica" name="bolnisnica" required><br><option value=""></option><option value="Izola">Izola</option></select>';
	for (i = 0; i < bolList.length; i++) {
		text += "<option value='" +  bolList[i]  + "'>"+ bolList[i] +"</option>";
	}
	//alert(text);
	document.getElementById("bolnisnicaId").innerHTML = text;
}
