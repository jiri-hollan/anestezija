function listaBolnisnicFunction(mestoBolnisnice) {
//alert ("lista bolnisnic function");

// koda, ki naredi array bolList iz tabele bolnisniceTab	

//alert(mestoBolnisnice);
var bolList  = mestoBolnisnice; 
var text = "";
var i;
for (i = 0; i < bolList.length; i++) {
  text += "<option value='" +  bolList[i]  + "'>"  +"<br>";
}
document.getElementById("bolnisnice").innerHTML = text;
}

function imenaBolnisnic(){
   var mestoBolnisnice = JSON.parse(mestoBolnisniceJson);
   listaBolnisnicFunction(mestoBolnisnice );

}