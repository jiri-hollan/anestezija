<!DOCTYPE html>
<html lang="sl-SI">
<head>
<meta http-equiv="cache-control" content="No-Cache">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico?<?php echo time(); ?>">
	<link href='../favicon120.png?<?php echo time(); ?>' rel='icon' sizes='120x120'/>
    <title>Anestiz</title>
  
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


<!--<script>sbFunction()</script>-->
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
<p id="aktBolnisnica">.</p>
<h1>Prijava</h1>
	 <!-- Izbira bolnišnice -->
<label for="bolnisnica" >Bolnišnica:</label> 
<input id="bolnisnica"  list="bolnisnice" name="bolnisnica"  onfocusout="bolnisnicaFunction()" required> 
  <datalist id="bolnisnice">  
    <option value='Bolnišnica'>    
  </datalist>
	 <!-- Izbira zdravnika -->
<br><label for="zdravnik" > Zdravnik:</label> 
<input id="zdravnik"  list="zdravniki" name="zdravnik"  onfocusout="zdravnikFunction()" required> 
  <datalist id="zdravniki">  
    <option value='ime zdravnika'>    
  </datalist>
<p> <button ​ onclick="naprejFunction()">Naprej</button>
<p id="result"> </p>

</div>

<div class="navbar" id="navBolnisnice" style='display:z-index:1;'>
<?php

require_once('../skupne/home.php');
require_once('zapisVsi.php');
require_once('bolnisnice.php');
echo '<button id="buttonDomov" onclick="window.location.href=' . "'" . $home . "'" . ';"> Domov </button>';
?>
 <script>
 // alert("celo ime Json:" + celoImeJson);
  var zdravListX = JSON.parse(celoImeJson);
  //alert(zdravListX);
  listaZdravnikovFunction(zdravListX);
  </script>
     <span class="" id="odjava" onclick="odjavaFunction()">odjava</span>
	 <!-- Preklapljanje med bolnišnicami -->
	<span class="navSpan" id="sbi" onclick="sbFunction('Izola')">S.B. Izola</span>
	<span class="navSpan" id="sbj" onclick="sbFunction('SBJ')">S.B. Jesenice</span>	
	
 </div>	 



</body>
</html>
