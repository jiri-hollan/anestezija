function preklop(akce,tabulka){
	alert("preklop: "+akce+" "+tabulka);
const manipulace = new Manipulace(tabulka);
switch(akce) {
  case "vyber":
   manipulace.vyber();	
    break;
  case "vloz":
    manipulace.vloz();
    break;
  case "edit":
    manipulace.edit();
    break;
  case "odstrani":
    manipulace.odstrani();
    break;	
  default:
    alert("zgodilo se nepredvideno");
}
}

//const manipulace = new Manipulace("pregledovalciTbl");


function Manipulace(tabulka) {
  this.tabulka=tabulka;

this.vyber= function()  {
	this.akce="vyber";
// omogoči izbiro bolnišnice 
document.getElementById("akceId").value = this.akce;
 document.getElementById("demo").innerHTML = '<input id="bolnisnicaId" list="bolnisnice" name="bolnisnica" value="" placeholder="Bolnišnica" onfocusout="bolnisnicaFunction()" autocomplete="off"><datalist id="bolnisnice"><option value="izbrana bolnisnica"> </datalist>';
	var bolList  =[
	"Izola",
	"Jesenice",
	];
	var text = "";
  var i;
  for (i = 0; i < bolList.length; i++) {
  text += "<option value='" +  bolList[i] + "'>"  +"<br>";
}
   document.getElementById("bolnisnice").innerHTML = text;	
   document.getElementById("tabSent").innerHTML = '<input type="hidden" name="tabulka" value="'+this.tabulka+'">';
   document.getElementById("posli").innerHTML = '<input class="submit" type="submit" name="submit" value="potrdi">'; //submit
  };//od vyber
  
this.vloz= function()  {
	this.akce="vloz";
    bolnisnica= '<input type="text" id="bolnisnicaId" name="bolnisnica" value="" placeholder="Bolnišnica" required>';
    ime= '<input type="text" id="imeId" name="ime" value="" placeholder="ime" required>';
    priimek= '<input type="text" id="priimekId" name="priimek" value="" placeholder="priimek" required>';
    status= '<input type="int" id="statusId" name="status" value="" placeholder="status" required>';
	document.getElementById("akceId").value = this.akce;
    document.getElementById("demo").innerHTML = bolnisnica + ime + priimek + status;
	document.getElementById("tabSent").innerHTML =  '<input type="hidden" name="tabulka" value="'+this.tabulka+'">';
	document.getElementById("posli").innerHTML = '<input class="submit" type="submit" name="submit" value="potrdi"><input type="reset" name="reset" value="Reset">'; //submit+reset
};// od vloz

this.edit= function()  {
 //alert("v JS case edit: "+this.tabulka);
  if(document.getElementById("osebe")!=null){
     document.getElementById("osebe").addEventListener("click", this.functionOver);
     }//od if
  },// od edit
  
this.odstrani= function()  {
  if ( confirm("v funkciji JS odstrani\odstranim en zapis?") == true) {
    if(document.getElementById("osebe")!=null){
    document.getElementById("osebe").addEventListener("click", this.functionOver);
      }//od notranjega if
} else {
  text = "You canceled!";
}// od else
  };// od odstrani

this.functionOver=  function(e) {
	//alert("v functionOver"+manipulace.tabulka);
  var x = e.target;
  if (x.nodeName == "TD") {
  var y = e.path[1];
  row_value = y.cells[0].innerHTML;
  document.getElementById("demo3").innerHTML = "id v bazi je= " + row_value ; 
 this.akce= x.innerHTML; 
 //alert("zahtevana akce: "+this.akce+" Tabulka: "+manipulace.tabulka);
 }//od if
   window.location.href = "manipulaceObjektUniverzal.php?akce=" + this.akce + "&id=" + row_value + "&tabulka="+ manipulace.tabulka;
  };//od function(e)


};// od obj manipulace