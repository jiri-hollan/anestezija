<!DOCTYPE html>
<html  lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/baze.css?<?php echo time(); ?>">
</head>
 <body onload="stolpciFuncton()">
<script>
function stolpciFuncton() {
const poljeJS = ["pregledId", "datPregleda", "imeZdravnika"];
const poljeJSON = JSON.stringify(poljeJS);
document.getElementById("data").value = poljeJSON;
}
</script>

<form action="../../pregled/vnosVrstice.php" method="post">
<input id="data" type="hidden" name="data" value="" style="width:90%;"></input><br>
<input   type="number" name="stevMaticna" required >matična stevilka</input>
<input   type="hidden" name="doBaze" value="vyber" readonly ></input>
<input   type="submit" ></input>
</form>

</body>
</html>