
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
  min = window[ime]["min"];

if(vrednost !="" && vrednost<min) {
    //alert (ime + " je pod spodnjo mejo mormale");
    pozorFunction(ime, 0);	
	
  } else if(vrednost != "" && vrednost>max) {
     //alert (ime + " je nad zgornjo mejo mormale");
     pozorFunction(ime, 1);	
	 
  } else if(vrednost == "") { 
	 pozorFunction(ime, 2);
	 
  } else {
    pozorFunction(ime, 3);	
 }

}//od function laborFunction

function labevalFunction(){
const iskano =  document.getElementsByClassName("lab");
alert (iskano[3].name + " = " + iskano[3].value);
}

function pozorFunction(ime, x) { 
   //alert (x);
   
switch (x) {
  case 0:
  document.getElementById(ime).style.color = "#ff0000"; 
  document.getElementById(ime).style.fontWeight = "bolder";
    break;
	
  case 1:
  document.getElementById(ime).style.color = "Crimson"; 
  document.getElementById(ime).style.fontWeight = "bold";
   break;
   
   case 2:
  document.getElementById(ime).value = ""; 

   break;
   
   default:
    document.getElementById(ime).style.color = "";
    document.getElementById(ime).style.fontWeight = "";
    
}

}


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
}
//-------konec dovoljene vrednosti-----