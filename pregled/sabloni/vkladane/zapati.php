 
 
<!--....................................................................................
	...............................................Navigacija.........................-->
	
 <div class="navbar" id="navbar" >
<?php

require_once('../skupne/home.php');
echo '<button class=""id="buttonDomov" onclick="window.location.href=' . "'" . $home . "'" . ';"> Domov </button>';
?>
     <span class="" id="odjava" onclick="odjavaFunction()">odjava</span>
	 <!-- Funkcija novBolnikFunction shrani formu u bazo in skoči na vpis novega bolnika -->
	<!-- <span class="navSpan" id="novB" onclick="novBolnikFunction() ">Nov bolnik</span>-->
     <span class="navSpan" id="novB" onclick="novBolnikFunction(1);">Nov bolnik</span>
	 <div id="najdiZapis"class="dropdown">
<?php
  if (isset($_SESSION["pristop"]))  {
if ($_SESSION["pristop"]==3) {	 
echo '
        <button class="dropbtn">najdi</button>
          <div class="dropdown-content">
          <!--<a href="#">Link 1</a>-->
          <a href="vybere.php">baze</a>
          <!--<a href="#">Link 3</a>-->
       </div>
     ';
} 
  }
?> 
</div>

     <span class="navSpan" id="nazaj" onclick="nazajFunction()">nazaj</span>
     <span class="navSpan" id="predogled" onclick="return reportFunction('p')">predogled</span>
     <span class="navSpan" id="natisni" onclick="return reportFunction('t')">natisni</span> 
 <!--<span class="navSpan" id="vbazo" onclick="return reportFunction('s')">v bazo</span>--> 	 
     <span class="navSpan" id="pomoc" onclick="pomocFunction()">pomoč</span>
	<!-- ________________________________________________________________________________________
	     dokler ni databaze, ostane "submitForm" zakomentiran
	    __________________________________________________________________________________________
	 <button id="submitFrm" type="submit" form="frm" value="Submit">Shrani</button>-->
<!--<span class="navSpan" id="submitFrm" onclick='document.getElementById("frm").submit();'>shrani</span>-->
 <span class="navSpan" id="submitFrm" onclick="return reportFunction('s')">shrani</span>	

 </div>	 


</body>
</html>