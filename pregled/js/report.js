
 var a;
 function reportFunction(a)
 {
 var x;	 
 var x1 = document.getElementById("frm")["oddelek"].value;
 var x2 = document.getElementById("frm")["dgOperativna"].value;
 var x3 = document.getElementById("frm")["opNacrtovana"].value;
 var x4 = document.getElementById("frm")["teza"].value;
 var x5 = document.getElementById("frm")["visina"].value;
 var x6 = document.getElementById("frm")["izvidiInOpombe"].value;
 var x7 = document.getElementById("frm")["sklep"].value;
 /*var v8 = document.getElementById("frm")["stevMaticna"].value;
 var x9 = document.getElementById("frm")["stevMaticna"].value;
 var x10 = document.getElementById("frm")["stevMaticna"].value;
 var x11 = document.getElementById("frm")["stevMaticna"].value;*/
 
  if (x1 == "") {
    alert("oddelek mora biti vpisan");
    return false;
  }

else if (x2 == "") {
    alert("dgOperativna mora biti vpisana");
    return false;
  }

else if (x3 == "") {
    alert("opNacrtovana mora biti vpisana");
    return false;
  }

  else if (x4 == "") {
    alert("teza mora biti vpisana");
    return false;
  }
 else if (x5 == "") {
    alert("visina mora biti vpisana");
    return false;
  }
else if (x6 == "") {
    alert("izvidiInOpombe ne smejo biti prazni");
    return false;
  }
else if (x7 == "") {
    alert("sklep mora biti vpisan");
    return false;
  }
/*else if (x4 == "") {
    alert("teza mora biti vpisana");
    return false;
  }
else if (x4 == "") {
    alert("teza mora biti vpisana");
    return false;
  }
else if (x4 == "") {
    alert("teza mora biti vpisana");
    return false;
  }*/


 else {

  
     document.getElementById("prva").style.display = "none"; 
     document.getElementById("druga").style.display = "none";
     document.getElementById("tretja").style.display = "block";


  if (!localStorage.getItem("aktivnaBolnica") == "") {
logo = document.getElementById("logo").innerHTML;
//alert (logo);
boln = localStorage.getItem("aktivnaBolnica");
//alert (boln);

logo = '<img  id="';
logo = logo + 'imgBol"';
logo = logo + '<img src="' + boln + '">';


//logo = '<img src="logoSBI.png" alt="logo SBI" width="200" height="100">';
//alert (logo);
document.getElementById("logo").innerHTML = logo;
  }
  
nalepka = document.getElementById("priimek").value;
nalepka = "priimek in ime:.... " + "<b>" + nalepka + " " + document.getElementById("ime").value + "</b>" + "<br>";
nalepka = nalepka + "datum rojstva:..... " +  "<b>" + datRojstva + "</b>" + "<br>" ;
nalepka = nalepka + "matična številka:. " +  "<b>" + document.getElementById("stevMaticna").value + "</b>" ;
//alert(nalepka);
document.getElementById("nalepkaR").innerHTML=nalepka;
//---------------------------------------------------------------
obravnava = danes;
obravnava = "<h3>" + obravnava + " " + "za odd. " + document.getElementById("zaOdd").value + "</h3>" ;
document.getElementById("obravnavaR").innerHTML=obravnava;

diagnoza =  "Op.diagnoza: " +    "<b>" + document.getElementById("dgOperativna").value + "</b>";
document.getElementById("diagnozaR").innerHTML=diagnoza;
diagnoza =  "predvidena op.: " +    "<b>" + document.getElementById("opNacrtovana").value + "</b>";
document.getElementById("operacijaR").innerHTML=diagnoza;
//..................................če ni vpisana vrednost............................................................................
function xFunction(x)
 {
if((x === undefined || x == null || x.length <= 0))  {
x = "....";
//alert(typeof x + x);
return x;
     }
  else {
  //x = x;
  return x;
     }
  }	
//....................................Meritve..............................................
 x = document.getElementById("starost").value;
 x = xFunction(x);
//alert(typeof x + x);
meritve =  "starost:" + "&nbsp"  + "<b>" + x + "&nbsp" + "let" + "</b>" + "&nbsp";
x = document.getElementById("teza").value;
x = xFunction(x);
meritve =  meritve +  " " + " teža:" + "&nbsp" + "<b>" + x + "&nbsp" + "kg " + "</b>" + "&nbsp";

x = document.getElementById("visina").value;
x = xFunction(x);
meritve =  meritve + " "  + " višina:" + "&nbsp" + "<b>" + x + "&nbsp" +  "m " + "</b>" + "&nbsp";

x = document.getElementById("bmi").value;
x = xFunction(x);
meritve =  meritve +  " " + " BMI:" + "&nbsp" + "<b>" + x +  "</b>" + "&nbsp";

x = document.getElementById("krTlak").value;
x = xFunction(x);
meritve =  meritve +  " " + " krvni tlak:" + "&nbsp" + "<b>" + x + "&nbsp" + "mmHg " + "</b>" + "&nbsp";

x = document.getElementById("pulz").value;
x = xFunction(x);
meritve =  meritve +  " " + " pulz:" + "&nbsp" + "<b>" + x + "&nbsp" + "/min " + "</b>";
document.getElementById("meritveR").innerHTML=meritve;

//........laboratorij...................................................................................
var text = "Lab.: ";
var i;
var lab = document.getElementById("lab").getElementsByTagName("label");
var vred =document.getElementById("lab").getElementsByTagName("input"); 
for (i = 0; i < lab.length; i++) 
{  
if (vred[i].value.length > 0)
   {
   text += lab[i].innerHTML + vred[i].value + "," + "&nbsp" + " ";
   }
}
document.getElementById("labR").innerHTML = text;
//....................EKG....................................................................

//var ekg = document.getElementById("ekg").value;
//document.getElementById("ekgR").innerHTML= "EKG: " + ekg;
//...........................RTG................................................................
//var rtg = document.getElementById("rtg").value;
//document.getElementById("rtgR").innerHTML= "RTG: " + rtg;


//............asa mallampati, alergija.........................................................
var asa = document.getElementById("asa").value;
//alert(asa);
document.getElementById("asaR").innerHTML= asa;

var mall = document.getElementById("mall").value;
//alert(mall);
document.getElementById("mallR").innerHTML= mall;

var alergija = document.getElementById("alergija").value;
//alert(alergija);
document.getElementById("alergijaR").innerHTML= alergija;

//....................EKG....................................................................

var ekg = document.getElementById("ekg").value;
ekg = opisFunction(ekg, "EKG:");
//alert(ekg);


//...........................RTG................................................................
var rtg = document.getElementById("rtg").value;
rtg = opisFunction(rtg, "RTG:");

//..............pridružene bolezni........................................................
var prid = document.getElementById("dgPridruzene").value;
prid = opisFunction(prid, "Pridružene bolezni:" );

//................................... predhodna terapija.........................................
var pred = document.getElementById("terPredhodna").value;
pred = opisFunction(pred, "Predhodna terapija:" );

//..................Izvidi in opombe...........................................................
var izvidi = document.getElementById("izvidiInOpombe").value;

izvidi = izvidi.replace(/\n/g, "<br><br>&emsp;");
izvidi = izvidiFunction(izvidi, "<hr>");

//..................Sklep...........................................................
var sklep = document.getElementById("sklep").value;
sklep = opisFunction(sklep, "Sklep:" );


//......................celi opis................................................................
var opis = ekg + rtg + prid + pred + izvidi + sklep;

//alert(opis);
document.getElementById("izvidiR").innerHTML= opis;
//....................premedikacija..........................................................
var premedikacija = "Premedikacija:";
var vecer = document.getElementById("premedVecer").value;
var jutri = document.getElementById("premedPredOp").value;

if (vecer.length > 0) {
  premedikacija = premedikacija + "<br>" +  "zvečer: " + vecer;
}
if (jutri.length > 0) {
  premedikacija = premedikacija + "<br>" +  "Pred op.: " + jutri;
}

//document.getElementById("premedikacijaR").insertAdjacentHTML("beforeend", premedikacija);
document.getElementById("premedikacijaR").innerHTML= premedikacija;

//....................navodila................................................................
var navodila = document.getElementById("navodila").value;
//alert(alergija);
document.getElementById("navodilaR").innerHTML= navodila;
//......................zdravnik...............................................................

document.getElementById("zdravnikR").innerHTML = document.getElementById("imeZdravnika").value;


     if (a=="t") {
      natisniFunction();
     }
     else if(a=="n") {  
      nazajFunction();
     }
	 else if(a=="p") {  
      ogledFunction();
     }
//....................................opisFunction ureja: ekg, RTG, Predhodna terapija, pridružrne bolezni..............
}
 }

function opisFunction(m,n)
{
if (m.length > 0) {
    m =  "<span class='nadpis'>" + n + "</span>"  + "<span class='besedilo'>" + m + "</span>" + "</br>";
}
else {
  m = "";
    }
return m;

}
 
//............................................izvidiFunction ureja besedilni opis stanja...................................
function izvidiFunction(m,n)
{
if (m.length > 0) {
   m =  n + "<span class='besedilo'> &emsp;"  + m + "</span><br><br>";
  
}
else {
  m = "";
    }
return m;

}
function natisniFunction() {
  if (confirm("natisni! bolnik= " + document.title)){
  document.getElementById("navbar").style.display = "none"; 
  window.print();
  ogledFunction();
   }
else {
  ogledFunction();
    }
}

function nazajFunction() {
    //alert("poglej bolnik= " + document.title);
    document.getElementById("navbar").style.display = "block"; 
    document.getElementById("prva").style.display = "none"; 
    document.getElementById("druga").style.display = "block";
    document.getElementById("tretja").style.display = "none";
    document.getElementById("nazaj").style.visibility = "hidden";
    document.getElementById("predogled").style.visibility = "visible";
	document.getElementById("submitFrm").style.visibility = "hidden";
}

function ogledFunction() {
  //alert("poglej bolnik= " + document.title);
  document.getElementById("navbar").style.display = "block"; 
  document.getElementById("prva").style.display = "none"; 
  document.getElementById("druga").style.display = "none";
  document.getElementById("tretja").style.display = "block";
  document.getElementById("predogled").style.visibility = "hidden";
  document.getElementById("nazaj").style.visibility = "visible";
  document.getElementById("submitFrm").style.visibility = "visible";
}

function pomocFunction() {
  var pot = "\\\\hospital.local\\dfs\\EIT\\premedikacija\\pregledani bolniki";
 prompt("Če ni nastavljena pot do  ciljne mape za PDF jo nastavi.\nSkopiraj spodnji naslov in ga prilepi kot pot.", pot );
}


/*function odjavaFunction() { 
	 localStorage.setItem("imeZdravnika", "");
     window.open("zdravnik.html", "_self");             
}*/

