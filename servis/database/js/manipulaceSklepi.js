function izborFunction(akce) {
  document.getElementById("akceId").value = akce;
switch(akce) {
  case "vyber":
  
   // document.getElementById("demo").innerHTML = '<input type="text" id="bolnisnicaId" name="bolnisnica" value="" placeholder="Bolnišnica">';// omogoči izbiro bolnišnice
// omogoči izbiro bolnišnice 	
 document.getElementById("demo").innerHTML = '<input id="bolnisnicaId" list="bolnisnice" name="bolnisnica" value="" placeholder="Bolnišnica" onfocusout="bolnisnicaFunction()" autocomplete="off"><datalist id="bolnisnice"><option value="izbrana bolnisnica"> </datalist>';
 	
	var bolList  =[
	"Izola",
	"Jesenice",
	];
	var text = "";
var i;
for (i = 0; i < bolList.length; i++) {
 // text += "<option value=" +  zdravList[i] + ">"+"<br>";
  text += "<option value='" +  bolList[i] + "'>"  +"<br>";
}
document.getElementById("bolnisnice").innerHTML = text;
	
	
	document.getElementById("posli").innerHTML = '<input class="submit" type="submit" name="submit" value="potrdi">'; //submit
    break; 

  case "vloz":
    bolnisnica= '<input type="text" id="bolnisnicaId" name="bolnisnica" value="" placeholder="Bolnišnica" required>';
    sklep= '<input type="text" id="sklepId" name="sklep" value="" placeholder="sklep" required>';
   // priimek= '<input type="text" id="priimekId" name="priimek" value="" placeholder="priimek" required>';
    aktiven= '<input type="int" id="aktivenId" name="aktiven" value="" placeholder="aktiven" required>';
    //document.getElementById("demo").innerHTML = bolnisnica + ime + priimek + status;
    document.getElementById("demo").innerHTML = bolnisnica + sklep + aktiven;
	document.getElementById("posli").innerHTML = '<input class="submit" type="submit" name="submit" value="potrdi"><input type="reset" name="reset" value="Reset">'; //submit+reset
    break;

  case "edit":
  //alert("v JS case edit");
  if(document.getElementById("osebe")!=null){
 document.getElementById("osebe").addEventListener("click", functionOver);
}

    break;

  case "odstrani":

  
  if ( confirm("v funkciji JS odstrani\odstranim en zapis?") == true) {
    if(document.getElementById("osebe")!=null){
    document.getElementById("osebe").addEventListener("click", functionOver);
      }
} else {
  text = "You canceled!";
}
  
  
 /* if(document.getElementById("osebe")!=null){
 document.getElementById("osebe").addEventListener("click", functionOver);
 
}*/

    // code block

    break;	
  default:
    // code block
 }//od switch
} // od izborFunction
//----------------------------------------------------------------------------------------
function functionOver (e) {
var x = e.target;
if (x.nodeName == "TD") {
var y = e.path[1];
row_value = y.cells[0].innerHTML;
 /* document.getElementById("demo1").innerHTML = "Triggered by a " + x.nodeName + " element";
  document.getElementById("demo2").innerHTML = "Triggered by a " + x.innerHTML + " element";  */
  document.getElementById("demo3").innerHTML = "id v bazi je= " + row_value ;  
 }//od if
 
 window.location.href = "manipulacePregledovalci.php?akce=" + x.innerHTML + "&id=" + row_value;
  
}//od function(e)