<<<<<<< Updated upstream
 function laborFunction(ime,vrednost)
{
 //console.log(ime);	
 const LIMITIlab = JSON.parse(limitiJson);
//console.log(LIMITIlab);
if(LIMITIlab[ime]!=undefined){
//console.log(LIMITIlab[ime]);
 max = LIMITIlab[ime]["max"];
=======

var hb = {min:100, max:150};
var ks = {min:3.6, max:6.1};
var inr = {min:0.8, max:1.3};
var aptc = {min:28, max:40};
var trombociti = {min:150, max:410};
var kreatinin = {min:72, max:127};
var laktat = {min:0, max:1.8};
var pbnp = {min:0, max:100};
var pct = {min:0, max:0.05};
var crp = {min:0, max:8};
var na = {min:136, max:145};
var k = {min:3.8, max:5};


 function laborFunction(ime,vrednost)
{	
  
 max = window[ime]["max"];
  console.log(max);
  min = window[ime]["min"];
 console.log(min);
/* max = limitiJsonx[ime]["max"];
>>>>>>> Stashed changes
 max = parseFloat(max);
//console.log(max);
  min = LIMITIlab[ime]["min"];
   min = parseFloat(min);
<<<<<<< Updated upstream
//console.log(min);

=======
 console.log(min);
*/
>>>>>>> Stashed changes
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
 }//id if limitilab(ime)
else{
//console.log("v else");
//console.log(vrednost);
vrednost=vrednost.toUpperCase();
//console.log(vrednost);
	switch (vrednost) {
	case "NE":
//console.log("NE");		
    pozorFunction(ime, 3);	
//console.log(ime +": "+vrednost);
   break;	
  case "DA":
// console.log("DA");
     pozorFunction(ime, 1);	
//console.log(ime +": "+vrednost);  
   break;
   case "":
 //console.log(ime +": "+vrednost);  
//ne naredi nič
//console.log("prazen niz");
   break;
  default:
  //console.log(ime +": "+vrednost);
//console.log("nekaj je narobe");  
    pozorFunction(ime, 2);	
}//od switch
}//od else
}//od function laborFunction
//-------------------------------------------------------------------------------------------------------
//labevalFunction preveri limite lab. vrednosti pri načitanju bolnika iz baze
function labevalFunction(){
const iskano =  document.getElementsByClassName("lab osnovne");
const ocena =  document.getElementsByClassName("ocena");
const ocenaOvisnosti =  document.getElementsByClassName("ocenaOvisnosti");
for (let i = 0; i < iskano.length; i++) {
// laborFunction spremeni styl glede na limite
laborFunction(iskano[i].name,iskano[i].value);  
}
for (let i = 0; i < ocena.length; i++) {
// laborFunction spremeni styl glede na limite
laborFunction(ocena[i].name,ocena[i].value);  
}
//alert (ocena[1].name + " = " + ocena[1].value);
for (let i = 0; i < ocenaOvisnosti.length; i++) {
// laborFunction spremeni styl glede na limite
laborFunction(ocenaOvisnosti[i].name,ocenaOvisnosti[i].value);  
}
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


function stevilkaFunction(dolzina,ident,lista) {
//...dan od 1 do 31.....prikaz številčneizbire v "list".....................
var ident = "";
var i;
for (i = 1; i < dolzina; i++) {
ident += "<option value=" +  i + ">"  +"<br>";
}
document.getElementById(lista).innerHTML = ident;
}//od sevilkaFunction

//-----dovoljene vrednosti-------------
var asaVar = ["1", "2", "3", "4", "5"];
var mallampatiVar = ["1", "2", "3", "4"];
var allNumb = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
var opiatiVar = ["D", "d", "N", "n", "",  "A", "a", "E", "e"];
var dovisnostiVar = ["D", "d", "N", "n", "",  "A", "a", "E", "e"];
var euroscoreVar = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0", ","];
function isNumber(evt, a)
{ 
    var allowed_characters = a;   
    if (allowed_characters.indexOf(evt.key) > -1) {
      return true;
    }
      return false;
}//od isNumber

//-------konec dovoljene vrednosti-----