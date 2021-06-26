<!DOCTYPE html>
<html  lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>Novi bolnik</title>
<script src="js/bmi.js?<?php echo time(); ?>"></script>
<script src="js/vpis.js?<?php echo time(); ?>"></script>
<script src="js/starost.js?<?php echo time(); ?>"></script>
<script src="js/report.js?<?php echo time(); ?>"></script>
<script src="js/preklopCss.js?<?php echo time(); ?>"></script>
<script src="js/odjava.js?<?php echo time(); ?>"></script>
<script src="js/dan.js?<?php echo time(); ?>"></script>
<script src="js/evaluacija.js?<?php echo time(); ?>"></script>
<script src="js/drugiIzvidi.js?<?php echo time(); ?>"></script>
<script src="js/prijava.js?<?php echo time(); ?>"></script>
<link rel="stylesheet" type="text/css" href="css/novPolnjenje.css?<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="css/premedikacijaTisk.css?<?php echo time(); ?>">

</head>

<!-- <body onload="danesFunction()">  -->
     <body onload="vpisFunction()">
	 
	 
<!--....................................................................................
	...............................................Navigacija.........................-->
	
 <div class="navbar" id="navbar" style='display:z-index:1;'>
     <span class="" id="odjava" onclick="odjavaFunction()">odjava</span>
	 <!-- Funkcija novBolnikFunction shrani formu u bazo in skoči na vpis novega bolnika -->
	<!-- <span class="navSpan" id="novB" onclick="novBolnikFunction() ">Nov bolnik</span>-->
     <span class="navSpan" id="novB" onclick="location.reload();">Nov bolnik</span>
     <span class="navSpan" id="nazaj" onclick="nazajFunction()">nazaj</span>
     <span class="navSpan" id="predogled" onclick="return reportFunction('p')">predogled</span>
     <span class="navSpan" id="natisni" onclick="return reportFunction('t')">natisni</span>     
     <span class="navSpan" id="pomoc" onclick="pomocFunction()">pomoč</span>
	<!-- ________________________________________________________________________________________
	     dokler ni databaze, ostane "submitForm" zakomentiran
	    __________________________________________________________________________________________
	 <button id="submitFrm" type="submit" form="frm" value="Submit">Shrani</button>-->
 <span class="navSpan" id="submitFrm" onclick='document.getElementById("frm").submit();'>shrani</span>
	
	
 </div>	 