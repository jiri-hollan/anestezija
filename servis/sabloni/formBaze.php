<?php
if (isset($_REQUEST["tabulka"])){
  $tab=$_REQUEST["tabulka"];
// echo "Tabulka je: ".$tab;
  echo rtrim($tab,"Tbl");
  }
 //echo($spisek->mestoB);
 $mestoB=json_encode( $spisek->mestoB, JSON_UNESCAPED_UNICODE);
 var_dump ($mestoB);
?>
<script>
const myArray = JSON.parse(<?php echo $mestoB;?>);
alert(myArray);
</script>
<br>
<button id="vyberId" onclick="izborFunction('vyber','<?php echo $tab;?>', myArray)">izberi</button>
<button id="vlozId" onclick="izborFunction('vloz','<?php echo $tab;?>')">vlož</button>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="hidden" id="akceId" name="akce" value="">
<p id="demo"></p>
<p id="tabSent"></p>
<p id="urejatSent"></p>
<p id="posli"></p>
</form>

<p id="demo3"></p>
