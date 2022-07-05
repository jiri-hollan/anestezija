const manipulace = {
  var tabulka="pregledovalciTbl";
  document.getElementById("akceId").value = akce;

function vyber{
// omogoči izbiro bolnišnice 	
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
   document.getElementById("tabSent").innerHTML = '<input type="hidden" name="tabulka" value="'+tabulka+'">';
   document.getElementById("posli").innerHTML = '<input class="submit" type="submit" name="submit" value="potrdi">'; //submit
  }//od vyber
  
function vloz{
    bolnisnica= '<input type="text" id="bolnisnicaId" name="bolnisnica" value="" placeholder="Bolnišnica" required>';
    ime= '<input type="text" id="imeId" name="ime" value="" placeholder="ime" required>';
    priimek= '<input type="text" id="priimekId" name="priimek" value="" placeholder="priimek" required>';
    status= '<input type="int" id="statusId" name="status" value="" placeholder="status" required>';
    document.getElementById("demo").innerHTML = bolnisnica + ime + priimek + status;
	document.getElementById("tabSent").innerHTML =  '<input type="hidden" name="tabulka" value="'+tabulka+'">';
	document.getElementById("posli").innerHTML = '<input class="submit" type="submit" name="submit" value="potrdi"><input type="reset" name="reset" value="Reset">'; //submit+reset
}// od vloz

function edit{
  //alert("v JS case edit");
  if(document.getElementById("osebe")!=null){
     document.getElementById("osebe").addEventListener("click", functionOver);
     }//od if
  }// od edit
  
function odstrani{
  if ( confirm("v funkciji JS odstrani\odstranim en zapis?") == true) {
    if(document.getElementById("osebe")!=null){
    document.getElementById("osebe").addEventListener("click", functionOver);
      }//od notranjega if
} else {
  text = "You canceled!";
}// od else
  }// od odstrani

function functionOver (e) {
  var x = e.target;
  if (x.nodeName == "TD") {
  var y = e.path[1];
  row_value = y.cells[0].innerHTML;
  document.getElementById("demo3").innerHTML = "id v bazi je= " + row_value ;  
 }//od if
   window.location.href = "manipulaceObjektUniverzal.php?akce=" + x.innerHTML + "&id=" + row_value + "&tabulka="+ tabulka;
  }//od function(e)


}// od obj manipulace



//VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV

function izborFunction(akce, tabulka) {
	var tabulka=tabulka;
	//alert(tabulka);

switch(akce) {

    break; 

  
    break;


    break;


    break;	
  default:
    // code block
 }//od switch
} // od izborFunction
//----------------------------------------------------------------------------------------
