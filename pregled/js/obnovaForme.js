
const person1 = {};	
function formFunction() {
//const person1 = {};	
var inputs = document.getElementById("frm").elements;

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

const myJSON = JSON.stringify(person1);
sessionStorage.setItem("testJSON", myJSON);
//return person1;
}//od formFunction

function formNazajFunction(person1) {
	//alert ('obnovaForme45');
	if (sessionStorage.getItem("testJSON")!=null){
	 let text = sessionStorage.getItem("testJSON");
//alert (text);	

     let obj = JSON.parse(text);

//alert (obj.izvidiInOpombe);
	
//var kljuc;	
var inputs = document.getElementById("frm").elements;
for (i = 0; i < inputs.length; i++) {
  if (inputs[i].nodeName === "INPUT" ||inputs[i].nodeName === "TEXTAREA") {
	 var kljuc=inputs[i].name;
 //alert (kljuc); 	 
	 if (obj[kljuc] !== undefined) {
		document.getElementsByName(kljuc)[0].value = obj[kljuc].replace(/\&quot;/g,'\\"').replace(/\&amp;/g, "&"); //person1[kljuc]; 
	 }
//alert(kljuc + ": " +person1[kljuc]);

} // od if
} //od for
starostFunction();
document.getElementById("novBLegend").style.display = "none"; 
labevalFunction();
	}//od if
} //od function formNazajFunction

