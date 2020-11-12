document.getElementById("result").innerHTML = "prijavljen je:  " + localStorage.getItem("imeZdravnika");
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


function naprejFunction() { 
 if (localStorage.getItem("imeZdravnika").length < 3) {
    alert("zdravnik ni prijavljen");
    return false;
  }
     window.open("novPolnjenje.html", "_self");             
}



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
var text = "";
var naslov="&nbsp;dr.med";
var i;

for (i = 0; i < zdravList.length; i++) {
 // text += "<option value=" +  zdravList[i] + naslov + ">"  +"<br>";
  text += "<option value='" +  zdravList[i] + naslov + "'>"  +"<br>";
}
document.getElementById("zdravniki").innerHTML = text;

