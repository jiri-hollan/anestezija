<?php
@session_start();
require_once 'sabloni/zahlavi.php';
require_once 'vnosVrstice.php';
require_once('../skupne/aktivace.php');
echo'
 <body onload="stolpciFunction()">
 <a id="buttonNazaj" href="bolnik.php" >Nazaj</a>';


if($gdpr==1){
if (isset($_SESSION["pristop"]) && $_SESSION["pristop"] >= 3) {
echo '<div id="kontejner">';
echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" autocomplete="off">';
 
echo '
<input id="data" type="hidden" name="data" value="" style="width:90%;"></input><br>
<label for= "ustanova">bolnišnica:</label>
<input id="ustanova" type="text" name="ustanova" value="" required ></input>
<label for= "stevMaticnaId">matična številka</label>
<input id="stevMaticnaId"  type="number" name="stevMaticna"  ></input>';

echo '
<input   type="hidden" name="doBaze" value="vyber" readonly ></input>
<input   type="submit" ></input>
</form>';
	if ($_SESSION["pristop"] >= 4){
echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" autocomplete="off">';
echo '
<input id="data1" type="hidden" name="data" value="" style="width:90%;"></input><br>
<input id="ustanova1" type="hidden"  name="ustanova" value="" required ></input>
<label for= "priimekId">priimek</label>
<input id="priimekId"  type="text" name="priimek"  ></input>';
	
echo '
<input   type="hidden" name="doBaze" value="vyber" readonly ></input>
<input   type="submit" ></input>
</form>';
	}

echo '</div>';
echo '<script>';
echo 'let x=localStorage.getItem("aktivnaBolnisnica");';
//echo  'alert(x);';
echo 'document.getElementById("ustanova").value= x;';
echo 'document.getElementById("ustanova1").value= x;';
echo '</script>';
}
}
 require_once 'sabloni/zapati.php';
?>
