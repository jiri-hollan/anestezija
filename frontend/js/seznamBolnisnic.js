function seznamBolnisnicFunction(mestoBolnisnice) {
//alert ("seznamBolnisnicFunction");

// koda, ki naredi array bolList iz tabele bolnisniceTab	

//alert(mestoBolnisnice);
var bolList  = mestoBolnisnice; 
var text = "";
var i;
for (i = 0; i < bolList.length; i++) {
  text += "<option value='" +  bolList[i]  + "'>"  +"<br>";
}
alert(text);
document.getElementById("bolnisnicaId").innerHTML = text;
}
