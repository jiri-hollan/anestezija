function odjavaFunction() { 
	 localStorage.setItem("imeZdravnika", "");
	 localStorage.setItem("aktivnaBolnica","");

     window.open("zdravnik.html", "_self");
	 //alert ("odjava");
     sbFunction();	 
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
