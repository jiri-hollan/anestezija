function listaBolnisnicFunction(sklepList) {
	
	var bolnisnicaJson= ' . json_encode( $bolnisnicaJson, JSON_UNESCAPED_UNICODE) . ';
//alert ("lista Sklepov function");
console.log("sklepi.js");
var text = "";
var i;
for (i = 0; i < sklepList.length; i++) {
 // text += "<option value=" +  sklepList[i] + ">"  +"<br>";
  text += "<option value='" +  sklepList[i] + "'>"  +"<br>";
}
//console.log(text);
document.getElementById("sklepi").innerHTML = text;
}