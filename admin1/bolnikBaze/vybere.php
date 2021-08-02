<!DOCTYPE html>
<html  lang="sl-SI">
<head>
</head>
<body> 
 <body onload="stolpciFuncton()">
<script>
function stolpciFuncton() {
const poljeJS = ["pregledId", "datPregleda", "imeZdravnika"];
const poljeJSON = JSON.stringify(poljeJS);
document.getElementById("data").value = poljeJSON;
}
</script>

<form action="../../pregled/vnosVrstice.php" method="post">
<input id="data" type="text" name="data" value="" style="width:90%;"></input><br>
<input   type="number" name="stevMaticna" required >matična stevilka</input>
<input   type="text" name="doBaze" value="vyber" readonly hidden></input>
<input   type="submit" ></input>
</form>
<?php

?>

</body>
</html>