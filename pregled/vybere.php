<?php
session_start();
require_once 'sabloni/zahlavi.php';
require_once 'vnosVrstice.php';
require_once 'vybere-items.php';
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
require_once('../skupne/aktivace.php');
if($gdpr==1){
//if (isset($_SESSION["pristop"]) && ($_SESSION["pristop"] == 3) && isset($_POST["trazi"])) {
if (isset($_SESSION["pristop"]) && $_SESSION["pristop"] == 3 ) {
echo '<div id="kontejner">';
echo'
<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post" autocomplete="off">
';

echo$a0;
if(isset($_POST["trazi"])) {
$trazi=$_POST["trazi"];
switch($trazi){
case "stevMaticna":
echo$a1;
break;

case "priimek":
echo$a2;
break;
}
echo'
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
}
}
 require_once 'sabloni/zapati.php';
?>
