 function laborFunction(ime,vrednost)
{	
 const LIMITIlab = JSON.parse(limitiJson);
 //console.log(LIMITIlab);
 max = LIMITIlab[ime]["max"];
 max = parseFloat(max);
//console.log(max);
  min = LIMITIlab[ime]["min"];
   min = parseFloat(min);
//console.log(min);

if(vrednost == ""||vrednost == 0||vrednost=== null) { 
	 pozorFunction(ime, 2);	
  }else if(vrednost != "" && vrednost>max) {
//alert (ime + " je nad zgornjo mejo mormale");
     pozorFunction(ime, 1);		  
 }else if (vrednost !="" && vrednost<min) {
//alert (ime + " je pod spodnjo mejo mormale");
    pozorFunction(ime, 0);	 
  }else {
    pozorFunction(ime, 3);	
 }
}//od function laborFunction
//-------------------------------------------------------------------------------------------------------
//labevalFunction preveri limite lab. vrednosti pri načitanju bolnika iz baze
function labevalFunction(){
const iskano =  document.getElementsByClassName("lab osnovne");
const ocena =  document.getElementsByClassName("ocena");
for (let i = 0; i < iskano.length; i++) {
// laborFunction spremeni styl glede na limite
laborFunction(iskano[i].name,iskano[i].value);  
}
for (let i = 0; i < ocena.length; i++) {
// laborFunction spremeni styl glede na limite
laborFunction(ocena[i].name,ocena[i].value);  
}
//alert (ocena[1].name + " = " + ocena[1].value);
} //od funkcije labevalFunction

function pozorFunction(ime, x) { 
   //alert (x);   
switch (x) {
  case 0:
   document.getElementById(ime).style.color = "#ff0000"; 
   document.getElementById(ime).style.fontWeight = "bolder";
   break;	
  case 1:
   document.getElementById(ime).style.color = "Crimson"; 
   document.getElementById(ime).style.fontWeight = "bolder";
   break;   
   case 2:
  document.getElementById(ime).value = ""; 
   break;   
   default:
    document.getElementById(ime).style.color = "";
    document.getElementById(ime).style.fontWeight = "";    
}// od switch
}// od pozorFunction

//-----dovoljene vrednosti-------------
var as = ["1", "2", "3", "4", "5"];
var mal = ["1", "2", "3", "4"];
var allNumb = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
function isNumber(evt, a)
{ 
    var allowed_characters = a;   
    if (allowed_characters.indexOf(evt.key) > -1) {
      return true;
    }
      return false;
}//od isNumber
//-------konec dovoljene vrednosti-----