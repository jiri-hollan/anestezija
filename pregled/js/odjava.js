function odjavaFunction() { 
	 localStorage.setItem("imeZdravnika", "");
     window.open("zdravnik.html", "_self");             
 }

function klousFunction(){
close();
}


function novBolnikFunction() {

  var r = confirm("Za shranjevanje v podatkovno bazo\n Pritisni v redu ali prekliči.");
  if (r == true) {
 // alert ('pred vstavljanjem v bazo');
  document.getElementById("frm").submit();
//  alert ('po vstavljanju v bazo');
  } else {
 
  }
 // alert ('nov bolnik');
location.reload();
}
