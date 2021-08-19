<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>

<body onload="stolpciFuncton()">
<script>
function stolpciFuncton() {
const poljeJS = ["id"];
const poljeJSON = JSON.stringify(poljeJS);
document.getElementById("stolpci").value = poljeJSON;
}

</script>
<p>vnesi ime tabele and click OK:</p>



<h2>Prikaz tabele uporabnikiTbl2</h2>
<form method="post" action="vnosAdmin.php"> 
<input id="stolpci" type="hidden" name="stolpci" value="" readonly>
<input type="hidden" name="doBaze" value="prikazi">
<input id="id"  type="text" name="id" value="" ></input>
  Tabela: <!--<input type="text" name="nameTable" value="uporabnikiTbl2">-->
  <br><br>
 
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>