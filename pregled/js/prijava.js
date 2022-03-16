//document.getElementById("result").innerHTML = "prijavljen je:  " + localStorage.getItem("imeZdravnika");
function zdravnikFunction() {  
// Check browser support
if (typeof(Storage) !== "undefined") {
  // Store
 imeZdravnika = document.getElementById("zdravnik").value || "" ;
 localStorage.setItem("imeZdravnika", imeZdravnika);
  // Retrieve
  document.getElementById("result").innerHTML = "prijavljen je:  " + localStorage.getItem("imeZdravnika");
     }
else {
  //document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
document.getElementById("result").innerHTML = "oprostite, vaš brskalnik ne podpira Web Storage" + "<br>" + "uporabite Google Chrom";

   }
}

function sbFunction(bol) {
	if (!bol=="") {
	//var bol = "";

switch (bol) {
  case "i":
    localStorage.setItem("aktivnaBolnica","SBI");
    localStorage.setItem("mestoBolnice","Izola");	
    text = localStorage.getItem("aktivnaBolnica");
	//alert ("Formular za S.B. Izola");
	location.href='zdravnik.php?aktivnaBolnisnica='+localStorage.getItem("mestoBolnice");return false;
    break;
  case "j":
      localStorage.setItem("aktivnaBolnica","SBJ");
	  localStorage.setItem("mestoBolnice","Jesenice");
    text = localStorage.getItem("aktivnaBolnica");
		//alert ("Formular za S,B,Jesenice");
	location.href='zdravnik.php?aktivnaBolnisnica='+localStorage.getItem("mestoBolnice");return false;
    break;
  default:
    text = "No value found";	
	//alert (text);	
    }
}    
else {
	 // alert ("nobena bolnišnica ni aktivirana");	
	}
}
function naprejFunction() { 
 if (localStorage.getItem("imeZdravnika").length < 3) {
    alert("zdravnik ni prijavljen");
    return false;
  }
     //window.open("novPolnjenje.php", "_self"); 
	 window.open("bolnik.php", "_self"); 
}

function listaZdravnikovFunction(zdravListX) {
	//alert ("lista zdravnikov function");
document.getElementById("result").innerHTML = "prijavljen je:  " + localStorage.getItem("imeZdravnika");

    text = localStorage.getItem("aktivnaBolnica");	
	//alert("lista zdravnikov " + text);
// tu bo prišla koda, ki naredi array zdravList iz tabele pregledovalci	

//alert(zdravListX);
 var zdravList  = zdravListX; 
 document.getElementById("aktBolnica").innerHTML = "<h1>"+localStorage.getItem("mestoBolnice")+"</h1> "; 
switch (text) {
   case "SBI":   
       break;
    case "SBJ":
	   break;
	default:
    var zdravList  =[];
document.getElementById("aktBolnica").innerHTML = "Bolnišnica ni določena"; 	
	//alert ("bolnišnica ni določena");
}

var text = "";
var naslov="&nbsp;dr.med";
var i;

for (i = 0; i < zdravList.length; i++) {
 // text += "<option value=" +  zdravList[i] + naslov + ">"  +"<br>";
  text += "<option value='" +  zdravList[i] + naslov + "'>"  +"<br>";
}
document.getElementById("zdravniki").innerHTML = text;

}