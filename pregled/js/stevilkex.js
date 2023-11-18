

function stevilkaFunction(dolzina,ident,lista) {
//...dan od 1 do 31.....prikaz številčneizbire v "list".....................
var ident = "";
var i;
for (i = 1; i < dolzina; i++) {
ident += "<option value=" +  i + ">"  +"<br>";
}
document.getElementById(lista).innerHTML = ident;
}//od sevilkaFunction