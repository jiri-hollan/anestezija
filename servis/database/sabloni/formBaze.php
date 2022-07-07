<?php
if (isset($_REQUEST["tabulka"])){
	  $tab=$_REQUEST["tabulka"];
	  echo "Tabulka je: ".$tab;
  }
  
?>

<br>
<!--
<button id="vyberId" onclick="manipulace.vyber('<?php echo $tab;?>')">vyber</button>
<button id="vlozId" onclick="manipulace.vloz('<?php echo $tab;?>')">vlož</button>

<button id="vyberId" onclick="const manipulace = new Manipulace('?php echo $tab;?>', 'vyber')">vyber</button>  -->
<button id="vyberId" onclick="manipulaceStart('<?php echo $tab;?>', 'vyber')">vyber</button>



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
