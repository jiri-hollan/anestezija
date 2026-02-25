<?php
@session_start();
require_once 'sabloni/zahlavi.php';
require_once 'vnosVrstice.php';
?>
 <body onload="stolpciFunction()">
 <a id="buttonNazaj" href="bolnik.php" >Nazaj</a>
<script>
 function stolpciFunction() {
 const poljeJS = ["pregledId", "datPregleda", "imeZdravnika"];
 const poljeJSON = JSON.stringify(poljeJS);
 document.getElementById("data").value = poljeJSON;
 }
</script>
<?php
require_once('../skupne/aktivace.php');
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
	if ($_SESSION["pristop"] >= 4){
	/*echo '	
	<label for= "priimekId">priimek</label>
	<input id="priimekId"  type="text" name="priimek"  ></input>';*/
	}

echo '
<input   type="hidden" name="doBaze" value="vyber" readonly ></input>
<input   type="submit" ></input>
</form>';
echo '</div>';
echo '<script>';
echo 'let x=localStorage.getItem("aktivnaBolnisnica");';
//echo  'alert(x);';
echo 'document.getElementById("ustanova").value= x;';
echo '</script>';
}
}
 require_once 'sabloni/zapati.php';
?>
