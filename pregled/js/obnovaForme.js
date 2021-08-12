
const person1 = {};	
function formFunction() {
//const person1 = {};	
var inputs = document.getElementById("frm").elements;
//var jString = "";

// Iterate over the form controls
for (i = 0; i < inputs.length; i++) {
  if (inputs[i].nodeName === "INPUT" ||inputs[i].nodeName === "TEXTAREA") {
  
 var kljuc=inputs[i].name;
  //alert (kljuc); 
 var vrednost=inputs[i].value
  //alert (vrednost);
  person1[kljuc] = vrednost;
//jString = jString + ', ' + '"' + kljuc + '"' + ":" +'"'+  vrednost +'"';
  }
} //od for
//jString = '{'+jString+'}';
//alert (jString);
//---------------------------------------del kode za prikaz objekta person1--------

/*let txt = "";
for (let x in person1) {
txt += x + ': '+person1[x] + " <br>";
}
document.getElementById("demo1").innerHTML = txt;*/

//document.getElementById("demo2").innerHTML = 'priimek: '+person1.priimek;
//-----------------------------------konec prikaza------------------------------------

//const myJSON = JSON.stringify(myObj);
const myJSON = JSON.stringify(person1);
sessionStorage.setItem("testJSON", myJSON);




//return person1;
}//od formFunction

function formNazajFunction(person1) {
	if (sessionStorage.getItem("testJSON")!=null){
	 let text = sessionStorage.getItem("testJSON");
     let obj = JSON.parse(text);
//alert (text);
//alert (obj.izvidiInOpombe);
	
//var kljuc;	
var inputs = document.getElementById("frm").elements;
for (i = 0; i < inputs.length; i++) {
  if (inputs[i].nodeName === "INPUT" ||inputs[i].nodeName === "TEXTAREA") {
	 var kljuc=inputs[i].name;
 //alert (kljuc); 	 

     document.getElementsByName(kljuc)[0].value = obj[kljuc]; //person1[kljuc];
//alert(kljuc + ": " +person1[kljuc]);

} // od if
} //od for
starostFunction();
document.getElementById("novBLegend").style.display = "none"; 
	}//od if
} //od function formNazajFunction

