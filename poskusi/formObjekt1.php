<!DOCTYPE html>
<html>
<body>

<p id="demo">demo</p>
<p id="demo1">demo1</p>
<p id="demo2">demo2</p>
<p onclick="formFunction()">formFunction</p>
<script>
//const person = {};
function formFunction() {
var inputs = document.getElementById("frm").elements;
var jString = "";
const person1 = {};
// Iterate over the form controls
for (i = 0; i < inputs.length; i++) {
  if (inputs[i].nodeName === "INPUT" ) {
  
 var kljuc=inputs[i].name;
  //alert (kljuc);
  
 var vrednost=inputs[i].value
  //alert (vrednost);
//const person1 = {};
  person1[kljuc] = vrednost;
if (i===0) {
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
document.getElementById("demo2").innerHTML = 'username'+person1.username;

}
//document.getElementById("demo").innerHTML = Object.values(person);
</script>

</body>
</html>