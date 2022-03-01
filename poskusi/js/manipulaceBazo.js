function izborFunction(akce) {
  document.getElementById("akceId").value = akce;
switch(akce) {
  case "vyber":
    document.getElementById("demo").innerHTML = '<input type="text" id="bolnisnicaId" name="bolnisnica" value="" placeholder="Bolnišnica">';// omogoči izbiro bolnišnice
	document.getElementById("posli").innerHTML = '<input type="submit" name="submit" value="Submit">'; //submit
    break; 

  case "vloz":
    bolnisnica= '<input type="text" id="bolnisnicaId" name="bolnisnica" value="" placeholder="Bolnišnica" required>';
    ime= '<input type="text" id="imeId" name="ime" value="" placeholder="ime" required>';
    priimek= '<input type="text" id="priimekId" name="priimek" value="" placeholder="priimek" required>';
    status= '<input type="int" id="statusId" name="status" value="" placeholder="status" required>';
    document.getElementById("demo").innerHTML = bolnisnica + ime + priimek + status;
	document.getElementById("posli").innerHTML = '<input type="submit" name="submit" value="Submit">'; //submit
    break;

  case "uredi":
  if(document.getElementById("osebe")!=null){
 document.getElementById("osebe").addEventListener("click", functionOver);
}
function functionOver (e) {
var x = e.target;
if (x.nodeName == "TD") {
var y = e.path[1];
row_value = y.cells[0].innerHTML;
 /* document.getElementById("demo1").innerHTML = "Triggered by a " + x.nodeName + " element";
  document.getElementById("demo2").innerHTML = "Triggered by a " + x.innerHTML + " element";  */
  document.getElementById("demo3").innerHTML = "id v bazi je= " + row_value ;  
 }//od if
 
 window.location.href = "manipulaceBazo.php?akce=" + x.innerHTML + "&id=" + row_value;
  
}//od function(e)
    break;

  case "odstrani":
  alert("v funkcijo odstrani");
    // code block

    break;	
  default:
    // code block
 }//od switch
} // od izborFunction