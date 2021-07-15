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
    text = localStorage.getItem("aktivnaBolnica");
	//alert ("Formular za S.B. Izola");
	location.reload();
    break;
  case "j":
      localStorage.setItem("aktivnaBolnica","SBJ");
    text = localStorage.getItem("aktivnaBolnica");
		//alert ("Formular za S,B,Jesenice");
	location.reload();
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

function listaZdravnikovFunction() {
	//alert ("lista zdravnikov function");
document.getElementById("result").innerHTML = "prijavljen je:  " + localStorage.getItem("imeZdravnika");
//document.getElementById("aktBolnica").innerHTML = "Za:  " + localStorage.getItem("aktivnaBolnica");

    text = localStorage.getItem("aktivnaBolnica");	
	//alert("lista zdravnikov " + text);
switch (text) {
   case "SBI":	
var zdravList  =[
"Nadežda&nbsp;Crnić&nbsp;Tokić",
"Damjan&nbsp;Polh",
"Tea&nbsp;Priman",
"Simona&nbsp;Spasović",
"Vladimir&nbsp;Stanković",
"Alja&nbsp;Skrt",
"Zlatka&nbsp;Lipovšek",
"Blaž&nbsp;Peček",
"Mara&nbsp;Škoti&nbsp;Bončina",
"Katja&nbsp;Luin",
"Barbara&nbsp;Kosmina&nbsp;Štefančič",
"Sandra&nbsp;Dušič",
"David&nbsp;Hrvatin",
"Jiří&nbsp;Hollan",
];
document.getElementById("aktBolnica").innerHTML = "<h1>Izola</h1> "; 
       break;
    case "SBJ":
	var zdravList  =[
	"Hana&nbsp;Hollan",
	"Vladimir&nbsp;Jurekovič",
	];
document.getElementById("aktBolnica").innerHTML = "<h1>Jesenice</h1> "; 	
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