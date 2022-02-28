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
  case y:
    // code block
    break;
  case y:
    // code block
    break;	
  default:
    // code block
 }//od switch
} // od izborFunction