
//izbira meseca

 
function myFunction(a, b) {
  //document.getElementById("demo").innerHTML = '<iframe id="tabela"  name="plugin" src=" ' + 'razpis/mespdf/' + a + '.pdf ">' +  '</iframe> ' ;


  switch(b) {
	case "dez":
    document.getElementById("demo").innerHTML = '<iframe id="tabela"  name="plugin" src=" ' + 'dezurstva/mesPdf/' + a + '.pdf ">' +  '</iframe> ' ;
    break;
  case "raz":
    document.getElementById("demo").innerHTML = '<iframe id="tabela"  name="plugin" src=" ' + 'razpis/mesPdf/' + a + '.pdf ">' +  '</iframe> ' ;
    break;  
	  
  }
}