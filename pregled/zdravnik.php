<!DOCTYPE html>
<html lang="sl-SI">
<meta http-equiv="cache-control" content="No-Cache">
<meta charset="UTF-8">

<head>
<script src="js/prijava.js?<?php echo time(); ?>"></script> 
<script src="js/odjava.js?<?php echo time(); ?>"></script>
<link rel="stylesheet" type="text/css" href="css/zdravnik.css?<?php echo time(); ?>">
</head>
<body>
<!--_____________________________________________________________________________________________________________________
ZA DOLOČITEV BOLNIŠNICE JE POTREBNO VPISATI PARAMETR FUNKCIJE sbFunction ZA IZOLO "i" ZA JESENICE "j"
oziroma to določi izbira NAV bara, če je ta aktivirana
________________________________________________________________________________________________________________________
-->

<script>sbFunction()</script>
<!--<script>sbFunction('i')</script>-->
Če niste odprli program v Google Chromu, ne bo delal pravilno
<!--[if IE]>
    <div class="IE" style="
    width: 500px;
    margin: auto;
    padding: 30px;
    background-color: #e26f6f;
    border: 2px solid #ce1313;
    margin-top: 30px;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    color: #560808;
">Ta brskalnik ni podprt. Uporabite Google Chrome</div>
[endif]-->
   
   
<div id="prijava" >
<h1>Prijava</h1>

<label for="zdravnik" >Zdravnik:</label> 
<input id="zdravnik"  list="zdravniki" name="zdravnik"  onfocusout="zdravnikFunction()" required> 
  <datalist id="zdravniki">  
    <option value='ime zdravnika'>    
  </datalist>
<p> <button ​ onclick="naprejFunction()">Naprej</button>
<p id="result"> </p>
<p id="aktBolnica">.</p>
  <script>listaZdravnikovFunction();</script>

</div>

<div class="navbar" id="navBolnice" style='display:z-index:1;'>
     <button id="buttonDomov" onclick="window.location.href='../menuFile.php';"> Domov </button>
     <span class="" id="odjava" onclick="odjavaFunction()">odjava</span>
	 <!-- Preklapljanje med bolnišnicami -->
	<span class="navSpan" id="sbi" onclick="sbFunction('i')">S.B. Izola</span>
	<span class="navSpan" id="sbj" onclick="sbFunction('j')">S.B. Jesenice</span>	
    <!-- <span class="navSpan" id="novB" onclick="location.reload();">Nov bolnik</span>    	 
     <span class="navSpan" id="pomoc" onclick="pomocFunction()">pomoč</span>-->
  <!--<span class="navSpan" id="klous" onclick='document.getElementById("frm").submit();'>ynos v bazo</span>-->
	
	
 </div>	 



</body>
</html>
