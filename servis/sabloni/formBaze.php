<?php
if (isset($_REQUEST["tabulka"])){
  $tab=$_REQUEST["tabulka"];
// echo "Tabulka je: ".$tab;
  echo rtrim($tab,"Tbl");
  }
 //var_dump($spisek->mestoB);
?>
<br>
<button id="vyberId" onclick="izborFunction('vyber','<?php echo $tab;?>','<?php echo $spisek->mestoB;?>')">izberi</button>
<button id="vlozId" onclick="izborFunction('vloz','<?php echo $tab;?>')">vlož</button>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="hidden" id="akceId" name="akce" value="">
<p id="demo"></p>
<p id="tabSent"></p>
<p id="urejatSent"></p>
<p id="posli"></p>
</form>

<p id="demo3"></p>
