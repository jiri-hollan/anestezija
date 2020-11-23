
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
	 
  } else {
    pozorFunction(ime, 2);	
 }

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
   
   default:
    document.getElementById(ime).style.color = "";
    document.getElementById(ime).style.fontWeight = "";
    
}

}