
<!--<html>
<body> -->

<p id="demo1">demo1</p>
<p id="demo2">demo2</p>
<p onclick="formFunction()">formFunction</p>
<script>

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

  person1[kljuc] = vrednost;

jString = jString + ', ' + '"' + kljuc + '"' + ":" +'"'+  vrednost +'"';

  }

}
jString = '{'+jString+'}';
alert (jString);

let txt = "";
for (let x in person1) {
txt += x + ': '+person1[x] + " <br>";
};

document.getElementById("demo1").innerHTML = txt;
document.getElementById("demo2").innerHTML = 'priimek: '+person1.priimek;

}

</script>
<!--
</body>
</html>-->