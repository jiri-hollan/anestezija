


function vpisFunction() {

	   document.getElementById("navbar").style.display = "block";
     document.getElementById("prva").style.display = "block"; 
     document.getElementById("druga").style.display = "none";
     document.getElementById("tretja").style.display = "none";
     document.getElementById("nazaj").style.visibility = "hidden";
     document.getElementById("predogled").style.visibility = "hidden";
     document.getElementById("novB").style.visibility = "hidden";
     document.getElementById("natisni").style.visibility = "hidden";
     document.getElementById("pomoc").style.visibility = "hidden";
    // document.getElementById("submitFrm").style.visibility = "hidden";

     danesFunction();
}

 //izračun današnjeg datuma in prikaz v ljudski obliki. V <input> vložena pravilna oblika datuma za QLS
   var danes;
  function danesFunction() {
    var d = new Date();   
    danes = d.toLocaleString("sl-SI", {dateStyle: "medium",timeStyle: "short"});  
    //document.forms["frm1"].elements["datPregleda"].value = danes; 
  document.getElementById("lab6").innerHTML = "Datum pregleda:  " + danes;
  document.getElementById("datPregleda").value = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();

}

