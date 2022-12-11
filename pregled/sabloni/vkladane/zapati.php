  
<!--.................................................Navigacija.........................-->	
 <div class="navbar" id="navbar" >
<?php
require_once('../skupne/home.php');
echo '<button class=""id="buttonDomov" onclick="window.location.href=' . "'" . $home . "'" . ';"> Domov </button>';
?>
     <span class="" id="odjava" onclick="odjavaFunction()">odjava</span>
<!-- Funkcija novBolnikFunction shrani formu u bazo in skoči na vpis novega bolnika -->
     <span class="navSpan" id="novB" onclick="novBolnikFunction(1);">Nov bolnik</span>
	 <div id="najdiZapis"class="dropdown">
<?php
$database=new Database;
$database->testirajBolnik();
if($database->bolnikObstaja==1){
	if (isset($_SESSION["pristop"]) && $_SESSION["pristop"] == 3) {
echo '
<button class="dropbtn">najdi</button>
<div class="dropdown-content">
<a href="vybere.php">baze</a>
</div>
';
  }
  }
?> 
</div>
     <span class="navSpan" id="nazaj" onclick="nazajFunction()">nazaj</span>
     <span class="navSpan" id="predogled" onclick="return reportFunction('p')">predogled</span>
     <span class="navSpan" id="natisni" onclick="return reportFunction('t')">natisni</span> 	 
     <span class="navSpan" id="pomoc" onclick="pomocFunction()">pomoč</span>
<?php
$database=new Database;
$database->testirajBolnik();
if($database->bolnikObstaja==1){
 echo '<span class="navSpan" id="submitFrm" onclick="return reportFunction'."('s')".'">shrani</span>';
  }else{
	echo '<span class="navSpan" id="submitFrm" ></span>';  
  }
?> 
  <!--   <span class="navSpan" id="submitFrm" onclick="return reportFunction('s')">shrani</span> -->
	 
 </div>	 
</body>
</html>