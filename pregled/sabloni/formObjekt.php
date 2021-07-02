<!DOCTYPE html>
<html>
<body>

<!--<h2>JavaScript Objects</h2>
<p>Object.values() converts an object to an array.</p>
<form id="my-form">
  <input type="text" name="username">
  <input type="text" name="full-name">
  <input type="password" name="password">
</form>-->
<p id="demo">demo</p>
<p id="demo1">demo1</p>
<p onclick="formFunction()">formFunction</p>
<script>
//const person = {};
function formFunction() {
var inputs = document.getElementById("frm").elements;
var jString = "";
// Iterate over the form controls
for (i = 0; i < inputs.length; i++) {
  if (inputs[i].nodeName === "INPUT" ) {
  
  kljuc=inputs[i].name;
  //alert (kljuc);
  
  vrednost=inputs[i].value
  //alert (vrednost);
//const person = {};
if (kjuc=="undefined") {}
	
else if (i===0&&kjuc===!"undefined") {
jString = '"'+ kljuc + '"'+ ":" +'"'+  vrednost +'"';
} else {
jString = jString + ', ' + '"' + kljuc + '"' + ":" +'"'+  vrednost +'"';
}
//person.kljuc = vrednost;
//alert (jString);
//alert (kljuc + " " + vrednost);
 // document.getElementById("demo").innerHTML = Object.values(person);
  }
  //document.getElementById("demo").innerHTML = Object.values(person);
}
jString = '{'+jString+'}';
alert (jString);

//document.getElementById("demo").innerHTML = person;


//document.getElementById("demo").innerHTML = Object.keys(person);
//document.getElementById("demo").innerHTML = Object.values(person) + Object.keys(person);


const person = JSON.parse(jString);
//const person = {jString};
//txt = person.password;
//alert (person.username);
document.getElementById("demo").innerHTML = 'geslo: '+person.password;

let txt = "";
for (let x in person) {
txt += x + ': '+person[x] + " <br>";
};

document.getElementById("demo1").innerHTML = txt;

}
//document.getElementById("demo").innerHTML = Object.values(person);
</script>

</body>
</html>