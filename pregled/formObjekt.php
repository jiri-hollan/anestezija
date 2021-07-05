
<p id="demo1">demo1</p>
<!--<p id="demo2">demo2</p>-->
<p onclick="formFunction()">formFunction</p>
<p onclick="formNazajFunction(person1)">formNazajFunction</p>
<script>
const person1 = {};	
function formFunction() {
//const person1 = {};	
var inputs = document.getElementById("frm").elements;
//var jString = "";

// Iterate over the form controls
for (i = 0; i < inputs.length; i++) {
  if (inputs[i].nodeName === "INPUT" ) {
  
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
let txt = "";
for (let x in person1) {
txt += x + ': '+person1[x] + " <br>";
}

document.getElementById("demo1").innerHTML = txt;
//document.getElementById("demo2").innerHTML = 'priimek: '+person1.priimek;
//-----------------------------------konec prikaza------------------------------------
return person1;
}//od formFunction

function formNazajFunction(person1) {
//var kljuc;	
var inputs = document.getElementById("frm").elements;
for (i = 0; i < inputs.length; i++) {
if (inputs[i].nodeName === "INPUT" ) {
	 var kljuc=inputs[i].name;
 //alert (kljuc); 	 
	 document.getElementById(kljuc).name = person1[kljuc];

} // od if
} //od for
} //od function formNazajFunction
</script>
