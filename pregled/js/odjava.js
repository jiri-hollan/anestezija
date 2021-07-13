function odjavaFunction() { 
	 localStorage.setItem("imeZdravnika", "");
	 localStorage.setItem("aktivnaBolnica","");
     sessionStorage.removeItem("testJSON");
     window.open("zdravnik.php", "_self");
	 //alert ("odjava");
     sbFunction();	 
 }

function klousFunction(){
close();
}

//------shranjevanje v bazo pri prehodu na novega bolnika---
var izbris;
function novBolnikFunction(izbris) {

  var r = confirm("Za shranjevanje v podatkovno bazo\n Pritisni v redu ali prekliči.");
  if (r == true) {
 // alert ('pred vstavljanjem v bazo');
  document.getElementById("frm").submit();
alert ('shranjeno v bazo');
//  alert ('po vstavljanju v bazo');
//location.reload();
  } else {
 //alert ('ni shranjeno');
location.reload();
  }
 // alert ('nov bolnik');

}
//------konec pri prehodu na novega bolnika---