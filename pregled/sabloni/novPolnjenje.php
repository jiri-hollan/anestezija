
<!--<form method="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">-->
<form id="frm" name="bolnikForma" method="post" action="vnosVrstice.php" autocomplete="off"> 
<fieldset class="novBolnik" id="prva">
    <legend id="novB">Nov bolnik</legend>
    <h2 id="lab6"> </h2>
    <label for="ime">Ime:</label>  
    <input id="ime" type="text" name="ime" pattern="[A-Za-zŽžšŠđĐćĆčČ]{1,}" required><br>    
    <label for="priimek">Priimek:</label>
    <input id="priimek" type="text" name="priimek" pattern="[A-Za-zŽžšŠđĐćĆčČ]{1,}" required><br>     
    <label for="dan">Datum rojstva:</label>
    <input id="dan" type="text"   list="dnevi"  name="dan" size="1" maxlength="2"  onfocus="stevilkaFunction(32, 'dan', 'dnevi')"  onkeyup="starostFunction()" required > . 
    <datalist id="dnevi">
    <option value='dan Meseca'>
    </datalist>
   <input id="mesec" type="text"   list="meseci"  name="mesec" size="1" maxlength="2"  onfocus="stevilkaFunction(13, 'mesec', 'meseci')"  onkeyup="starostFunction()" required >  
    <datalist id="meseci">
    <option value='mesec leta'>
    </datalist>
    <input id="leto"type="text" name="leto" size="2" maxlength="4" required onkeyup="starostFunction()" ><br>

    <label for="stevMaticna">Matična številka:</label>
    <input id="stevMaticna"type="text" name="stevMaticna" pattern="[0-9]{1,}" required onkeypress=" return isNumber(event, allNumb)"/><br>
  <label for="EMSO">EMŠO:</label>
    <input id="EMSO" type="text" name="EMSO"pattern="[0-9]{1,}" placeholder="pusti prazno" onkeypress=" return isNumber(event, allNumb)"/ >  
    <!-- //<label for="datPregleda" hidden >Današnji datum:</label>-->  
    <input id="datRojstva" type = "hidden" name = "datRojstva" readonly  >   
    <input id="datPregleda" type = "hidden" name = "datPregleda" readonly  >
    <br>
  <!-- <label for="starost">Starost:<input id="starost" type = "text" name = "starost" readonly  ></label> <br>-->
  <br>

  
     <button class="naprej" id="naprej" ime = naprej  onclick = "return osebniFunction()"><b>Naprej</b></button>


           <!-- <p ime = naprej style="background-color:blue; color:white;" onclick = "return osebniFunction()"><b>Naprej</b></p>-->

       
    
  <!-- </p>-->
 
 </fieldset>  
<!-- ______________________________________________________________________________________

...........................Drugi del formularja................................-->

 <div class="glavna" id="druga">

	<h3 id="osebni"> osebni</h3>

 <fieldset class="zacetek">
    <legend></legend>      
 <!-- <label>Za oddelek:<input type="text" name="oddelek" required></label> --> 


  <label>Za oddelek:<input id="zaOdd" list="oddelek" name="oddelek"required></label>  
  <datalist id="oddelek">
    <option value="Kirurgija">
    <option value="ginekologija">
    <option value="urologija">
    <option value="ORL">
    <option value="RTG">
	<option value="interna">
  </datalist>
  
  <label for="imeZdravnika">Zdravnik: <input id="imeZdravnika" type="text" name="imeZdravnika" readonly tabindex="-1"></label>
    <br> 
 </fieldset>


 <fieldset class="diagnoze">
    <legend></legend>
	<label for="dgOperativna" >Operativna diagnoza:</label>
	<input id="dgOperativna" type="text" name="dgOperativna" required>
    <br>  
	<label for="opNacrtovana">Načrtovana operacija:</label>  
    <input id="opNacrtovana"  type="text" name="opNacrtovana" required >
 </fieldset>

 

  <fieldset class="meritve">
    <legend></legend>	
    <label for="starost">Starost:<input  id="starost" type="text" name="starost" size="1" readonly tabindex="-1"></label>      
    <label for = "teza">Teža:<input id = "teza" type = "text" name = "teza" onkeyup="bmiFunction()" required>kg</label>
    <label for = "visina">Višina:<input id = "visina" type = "text" name = "visina" size="1" onkeyup="bmiFunction()" required>m</label> 
    <label for = "bmi">BMI: <input id = "bmi" type = "text" name = "bmi" id = "bmi" onclick = "bmiFunction()" readonly tabindex="-1"></label>  
    <label for = "krvniTlak">Krvni Tlak:<input id = "krTlak" type="text" name="krvniTlak" size="1" ></label>    
    <label for = "pulz">Pulz:<input id = "pulz" type="text" name="pulz" size="1" ></label>  
    <br> 
 </fieldset>

 <fieldset id="lab">
<div id="stolpec1">
    <label for="hb">Hb:</label>  
    <input id="hb" type="text" name="hb" size="1" onfocusout=  "laborFunction(name,value)"><br>
    <label for="ks">KS:</label>  
    <input id="ks"type="text" name="ks" size="1" onfocusout=  "laborFunction(name,value)"> <br>
    <label for="inr">INR:</label>  
    <input id="inr" type="text" name="inr" size="1" onfocusout=  "laborFunction(name,value)"><br> 
    <label for="aptc">APTČ:</label>  
    <input id="aptc" type="text" name="aptc" size="1" onfocusout=  "laborFunction(name,value)"><br>
    <label for="trombociti">Trombociti:</label>  
    <input id="trombociti" type="text" name="trombociti" size="1" onfocusout=  "laborFunction(name,value)"><br>
    <label for="kreatinin">Kreatinin:</label>  
    <input id="kreatinin" type="text" name="kreatinin" size="1" onfocusout=  "laborFunction(name,value)"><br> 
   
</div>
<div id="stolpec2">
    <label for="laktat">laktat:</label>  
    <input id="laktat" type="text" name="laktat" size="1" onfocusout=  "laborFunction(name,value)"><br>
    <label for="pbnp">P-BNP:</label>  
    <input id="pbnp" type="text" name="pbnp" size="1" onfocusout=  "laborFunction(name,value)"><br>
    <label for="pct">PCT:</label>  
    <input id="pct" type="text" name="pct" size="1" onfocusout=  "laborFunction(name,value)"><br>
    <label for="crp">CRP:</label>  
    <input id="crp" type="text" name="crp" size="1" onfocusout=  "laborFunction(name,value)"><br>
    <label for="na">Na:</label>  
    <input id="na" type="text" name="na" size="1" onfocusout=  "laborFunction(name,value)"><br>
    <label for="k">K:</label>  
    <input id="k" type="text" name="k" size="1" onfocusout=  "laborFunction(name,value)"><br>
</div>
<div id="stolpec3">
    Drugi izvidi<br>
  <label for="x1"></label>  
    <input id="x1" type="text" name="x1" size="1" onkeyup= "drugiIzvidiFunction()" tabindex="-1"><br>
   <label for="x2"></label>  
    <input id="x2" type="text" name="x2" size="1"onkeyup= "drugiIzvidiFunction()"  tabindex="-1"><br>
   <label for="x3"></label>  
    <input id="x3" type="text" name="x3" size="1" onkeyup= "drugiIzvidiFunction()"tabindex="-1"><br>
   <label for="x4"></label>  
    <input id="x4" type="text" name="x4" size="1" onkeyup= "drugiIzvidiFunction()"tabindex="-1"><br>
   <label for="x5"></label>  
    <input id="x5" type="text" name="x5" size="1" onkeyup= "drugiIzvidiFunction()"tabindex="-1"><br>
	<input id="drugiIzvidi" type="hidden" name="drugiIzvidi" readonly>
	
	
	
	
</div>
 </fieldset>

 
    <legend></legend>
    <label for="ekg">EKG:</label>  
    <textarea id="ekg" class="mala" rows="1" cols="200"  name="ekg" ></textarea><br> 
    <label for="rtg">RTG:</label>  
    <textarea id="rtg" class="mala" rows="1" cols="200"   name="rtg" ></textarea><br> 


    <label for="dgPridruzene">Pridružene bolezni:</label><br>  
    <textarea id= "dgPridruzene" class="mala" rows="4" cols="200" name="dgPridruzene"></textarea><br>

    <label for="terPredhodna">Predhodna terapija:</label><br>   
    <textarea id="terPredhodna" class="mala" rows="4" cols="200" name="terPredhodna"></textarea>

 <fieldset class="alergija">
    <legend></legend>
     <label>ASA:<input id="asa" type="text"  list="ase"  name="asa" size="1" maxlength="1"   onfocus="stevilkaFunction(6, 'asa', 'ase')"  onkeypress=" return isNumber(event, as)"/ ></label>  
	<datalist id="ase">
    <option value='st asa'>
    </datalist>
	 
     <label>Mallampati:<input id="mall" type="text"   list="mally"  name="mallampati" size="1" maxlength="1"  onfocus="stevilkaFunction(5, 'mall', 'mally')"  onkeypress=" return isNumber(event, mal)"/></label> 
     <datalist id="mally">
     <option value='st mall'>
     </datalist>
     
     <label for="alergija">Alergija:<input id="alergija" type="text" name="alergija"  ></label>
	 
 </fieldset>
 
	<labelfor="izvidiInOpombe">Izvidi in opombe:</label><br>  
    <textarea id="izvidiInOpombe" class="velka"   rows="4" cols="200"  name="izvidiInOpombe" required></textarea><br>

 <label>Sklep:<input id="sklep"  list="sklepi" name="sklep" required></label> 
 <datalist id="sklepi">
    <option value="Lahko se uvrsti na operativni program">
    <option value="Potrebna je dodatna obdelava">
    <option value="Ni primeren za operacijo v naši bolnišnici">
	<option value="Zaradi splošno slabega stanja mora biti uvrščen na program kot prvi">
  </datalist>
<br><br>
 <fieldset class="zaklucek">premedikacija 
  <div id="zaklucek">
	<label for="premedVecer">Zvečer:..<input id="premedVecer" type="textarea" name="premedVecer" ></label>  
    <br>
	<label for="premedPredOp">Pred op.:<input id="premedPredOp" type="textarea" name="premedPredOp" ></label> <br> 


  

    <textarea id="navodila" class="mikro"  name="navodila" placeholder="Navodila" rows="3" ></textarea>
   </div>
  </fieldset>
 


 <!--<p> <button id="bolnikButon" type="submit">Shrani</button> </p> -->
 	
 </fieldset>	
</div>
</form>
<!--buton je premeščen v navMenu
<button id="bolnikButon"  type="submit" form="frm" value="Submit">Submit</button>-->



<!-- ______________________________________________________________________________________

...........................Tretji del TISK................................-->

<div class="celaStran" id="tretja">
  <div id="logo"><img  id="imgBol" src="logoSBI.png"></div>
  
 <!-- <div id="logo"><img  id="imgBol" src="logoSBI.png" alt="logo SBI" width="200" height="100"></div> -->
<!-- <div id="logo"><img id="imgBol" src="logoSBj.png" alt="logo SBI" width="200" height="100"></div>-->
  <h1>Anesteziološki pregled</h1>
   <div id="nalepkaR">nalepka</div> 
    <p id="obravnavaR"></p>  
<div class="paragrafi">	
<div class="prvigrafi">	
    <p id="diagnozaR">op.diagnoza</p>
    <p id="operacijaR">predvidevana op.</p>
    <p id="meritveR">meritve</p>
    <p id="labR">lab</p>
  <div class="asmalR">
       ASA: <span id="asaR"​ class="kvadrat" >.</span><span style="padding-left:10px;"> Mallampati:</span> <span id="mallR" class="kvadrat" >.</span> <span style="padding-left:10px;">Alergija:</span> <span id="alergijaR"></span>
  </div>

 <!-- <textarea id="pridBolezniR"  class="mala" >pridružene bolezni</textarea>
  <textarea id="predTerapR"  class="mala" >predhodna terapija</textarea>-->
 </div>


  <div class="velka" id="izvidiR">Izvidi in opombe</div>
</div> 
   <div id="premedikacijaR"><i>premedikacija</i></div>
   <div id="zdravnikR">zdravnik</div>
   <div id="navodilaR">navodila</div>

</div>