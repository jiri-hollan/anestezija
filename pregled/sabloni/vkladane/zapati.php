
	 
<!--....................................................................................
	...............................................Navigacija.........................-->
	
 <div class="navbar" id="navbar" >
     <span class="" id="odjava" onclick="odjavaFunction()">odjava</span>
	 <!-- Funkcija novBolnikFunction shrani formu u bazo in skoči na vpis novega bolnika -->
	<!-- <span class="navSpan" id="novB" onclick="novBolnikFunction() ">Nov bolnik</span>-->
     <span class="navSpan" id="novB" onclick="location.reload();">Nov bolnik</span>
     <span class="navSpan" id="nazaj" onclick="nazajFunction()">nazaj</span>
     <span class="navSpan" id="predogled" onclick="return reportFunction('p')">predogled</span>
     <span class="navSpan" id="natisni" onclick="return reportFunction('t')">natisni</span> 
 <!--<span class="navSpan" id="vbazo" onclick="return reportFunction('n')">v bazo</span>--> 	 
     <span class="navSpan" id="pomoc" onclick="pomocFunction()">pomoč</span>
	<!-- ________________________________________________________________________________________
	     dokler ni databaze, ostane "submitForm" zakomentiran
	    __________________________________________________________________________________________
	 <button id="submitFrm" type="submit" form="frm" value="Submit">Shrani</button>-->
 <!--<span class="navSpan" id="submitFrm" onclick='document.getElementById("frm").submit();'>shrani</span>-->
 <span class="navSpan" id="submitFrm" onclick="return reportFunction('n')">shrani</span>	
	
 </div>	 


</body>
</html>