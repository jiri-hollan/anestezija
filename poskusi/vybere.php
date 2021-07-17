<!DOCTYPE html>
<html  lang="sl-SI">
<head>
</head>
<body> 
 <body onload="stolpciFuncton()">
<script>
function stolpciFuncton() {
const poljeJS = ["datPregleda", "imeZdravnika"];
const poljeJSON = JSON.stringify(poljeJS);
document.getElementById("data").value = poljeJSON;
}
</script>

<form action="../pregled/vnosVrstice.php" method="post">
<input id="data" type="text" name="data" value="" style="width:90%;"></input><br>
<input   type="number" name="stevMaticna" required >matična stevilka</input>
<input   type="text" name="doBaze" value="vyber" readonly>do baze</input>
<input   type="submit" ></input>i
</form>
<?php
/*require_once('vnosVrstice.php');
$tabela = "bolnikTbl";
$data = ['pregledId'];
$podminka ['stevMaticna']=12345;*/
//new PreberiVpis($tabela, $data);
?>

</body>
</html>