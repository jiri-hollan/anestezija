function odjavaFunction() { 
	 localStorage.setItem("imeZdravnika", "");
	 localStorage.setItem("aktivnaBolnica","");

     window.open("zdravnik.php", "_self");
	 //alert ("odjava");
     sbFunction();	 
 }

function klousFunction(){
close();
}

//------shranjevanje v bazo pri prehodu na novega bolnika---
function novBolnikFunction() {

  var r = confirm("Za shranjevanje v podatkovno bazo\n Pritisni v redu ali prekliči.");
  if (r == true) {
 // alert ('pred vstavljanjem v bazo');
  document.getElementById("frm").submit();
alert ('shranjeno v bazo');
//  alert ('po vstavljanju v bazo');
  } else {
 alert ('ni shranjeno');
  }
 // alert ('nov bolnik');
location.reload();
}
//------konec pri prehodu na novega bolnika---