<?php
session_start();
require_once 'sabloni/zahlavi.php';
require_once 'vnosVrstice.php';
/*
<!DOCTYPE html>
<html  lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/baze.css?<?php echo time(); ?>">
</head>
*/
?>
 <body onload="stolpciFuncton()">
 <a id="buttonNazaj" href="bolnik.php" >Nazaj</a>
<script>
function stolpciFuncton() {
const poljeJS = ["pregledId", "datPregleda", "imeZdravnika"];
const poljeJSON = JSON.stringify(poljeJS);
document.getElementById("data").value = poljeJSON;
}
</script>
<?php 
//session_start();
if (isset($_SESSION["pristop"]) && $_SESSION["pristop"] == 3) {
echo '
<div id="kontejner">';
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
<?php 


echo '
<input id="data" type="hidden" name="data" value="" style="width:90%;"></input><br>
<label for "ustanova">bolnisnica:</label>
<input id="ustanova" type="text" name="ustanova" value="" required ></input>
<label for "stevMaticna">matična stevilka</label>
<input   type="number" name="stevMaticna" required ></input>
<input   type="hidden" name="doBaze" value="vyber" readonly ></input>
<input   type="submit" ></input>
</form>
</div>
';
echo '<script>';
echo 'let x=localStorage.getItem("aktivnaBolnisnica");';
//echo  'alert(x);';
echo 'document.getElementById("ustanova").value= x;';
echo '</script>';

}
 require_once 'sabloni/zapati.php';
?>
