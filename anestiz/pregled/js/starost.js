  //................ Izračun starosti.............
  

  var dateParts;
  var starost;
  var datRojstva;

 function starostFunction()
 {
var dan = document.getElementById("dan").value ;
var mesec = document.getElementById("mesec").value ;
var leto =  document.getElementById("leto").value ;
if(dan*mesec*leto >0){

 datRojstva = dan + "." + mesec + "." + leto;
  var dateParts = datRojstva.split(".");  

/*  datRojstva = document.getElementById("dan").value ;
  datRojstva = datRojstva + "." + document.getElementById("mesec").value ;
  datRojstva = datRojstva + "." +  document.getElementById("leto").value ;*/


  //var dateParts = datRojstva.split(".");  
//alert (dateParts);

//............ month is 0-based, that's why we need dataParts[1] - 1  roj = dateObject.......
 document.getElementById("datRojstva").value = leto + "-" + mesec + "-" + dan; 
  var roj =  new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]); 
//alert (datRojstva);
  var d1 = Date.parse(roj);
  var d2 = Date.parse(Date());
  var d3 = d2 - d1;
  var n = 1000*60*60*24*365.25;
// window.alert ("n= " + n);
  var starost = ~~(d3 / n);
 //window.alert (starost);
  document.getElementById("starost").value = starost; 
}
}

var as = ["1", "2", "3", "4", "5"];
var mal = ["1", "2", "3", "4"];
var allNumb = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
function isNumber(evt, a)
{ 
    var allowed_characters = a;
    
    if (allowed_characters.indexOf(evt.key) > -1) {
        return true;
    }
    return false;
}