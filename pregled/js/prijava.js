//document.getElementById("result").innerHTML = "prijavljen je:  " + localStorage.getItem("imeZdravnika");
function zdravnikFunction() {  
// Check browser support
if (typeof(Storage) !== "undefined") {
   // Store
   imeZdravnika = document.getElementById("zdravnik").value || "" ;
   localStorage.setItem("imeZdravnika", imeZdravnika);
   // Retrieve
   document.getElementById("result").innerHTML = "prijavljen je:  " + localStorage.getItem("imeZdravnika");

     } else {
     //document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
     document.getElementById("result").innerHTML = "oprostite, vaš brskalnik ne podpira Web Storage" + "<br>" + "uporabite Google Chrom";
    }
  }
  /*
//_______________________________________________________________________  
 function bolnisnicaFunction() {  
// Check browser support
if (typeof(Storage) !== "undefined") {
   // Store
   nazivB = document.getElementById("bolnisnica").value || "" ;
   localStorage.setItem("aktivnaBolnisnica", nazivB);
   // Retrieve
   document.getElementById("aktBolnisnica").innerHTML = localStorage.getItem("aktivnaBolnisnica");

     } else {
     //document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
     document.getElementById("result").innerHTML = "oprostite, vaš brskalnik ne podpira Web Storage" + "<br>" + "uporabite Google Chrom";
    }
 } //od bolnisnicaFunction 
//__________________________________________________________________________________
*/
function sbFunction(bol="") {
	bolnisnica={SBJ:"Jesenice", SBI:"Izola"};


       if(bol=="spomin") {
	location.href='../pregled/zdravnik.php?aktivnaBolnisnica='+localStorage.getItem("mestoBolnisnice");return false;

      } else if (!bol=="") {
		 bol = document.getElementById("bolnisnica").value || "" ;
		 bol = bol.toUpperCase();
         localStorage.setItem("aktivnaBolnisnica",bol);
         localStorage.setItem("mestoBolnisnice",bolnisnica[bol]);
	//alert ("Formular za S.B. Izola");
	location.href='zdravnik.php?aktivnaBolnisnica='+localStorage.getItem("mestoBolnisnice");return false; 

      } else {
	 //alert ("nobena bolnišnica ni aktivirana");	
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

// tu bo prišla koda, ki naredi array zdravList iz tabele pregledovalci	

//alert(zdravListX);
 var zdravList  = zdravListX; 
 document.getElementById("aktBolnisnica").innerHTML = "<h1>"+localStorage.getItem("mestoBolnisnice")+"</h1> "; 
switch (localStorage.getItem("aktivnaBolnisnica")) {
   case "SBI":   
       break;
    case "SBJ":
	   break;
	default:
    var zdravList  =[];
document.getElementById("aktBolnisnica").innerHTML = "Bolnišnica ni določena"; 	
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