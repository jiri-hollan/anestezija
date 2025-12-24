function listaBolnisnicFunction(bolListX) {
//alert ("lista bolnisnic function");

// koda, ki naredi array bolList iz tabele bolnisniceTab	

//alert(bolListX);
var bolList  = bolListX; 
var text = "";
var i;
for (i = 0; i < bolList.length; i++) {
  text += "<option value='" +  bolList[i]  + "'>"  +"<br>";
}
document.getElementById("bolnisnice").innerHTML = text;
}