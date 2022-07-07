<?php
if (isset($_REQUEST["tabulka"])){
	  $tabulka=$_REQUEST["tabulka"];
	  echo "$"."Tabulka je: ".$tabulka;
  }
  
?>

<br>

<!--<button id="vyberId" onclick="manipulace.vyber('<?php echo $tabulka;?>')">vyber</button>-->
<!--<button id="vlozId" onclick="manipulace.vloz('<?php echo $tabulka;?>')">vlož</button>-->

<button id="vyberId" onclick="manipulace.vyber()">vyber</button>
<button id="vlozId" onclick="manipulace.vloz()">vlož</button>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="hidden" id="akceId" name="akce" value="">
<p id="demo"></p>
<p id="tabSent"></p>
<p id="posli"></p>
<!--<input type="submit" name="submit" value="Submit"> -->
</form>
 <br>
<!-- <p id="demo1">demo1</p>
<p id="demo2">demo2</p>-->
<p id="demo3"></p>
