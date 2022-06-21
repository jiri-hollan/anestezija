<br>
<button id="vyberId" onclick="izborFunction('vyber')">vyber</button>
<button id="vlozId" onclick="izborFunction('vloz')">vlož</button>
<?php
echo $tabulka;

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]). "?imeTable=".$tabulka;?>">

<!--naslednjo vrstico tok programe preskoči     -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]). "?imeTable=pregledovalciTbl";?>">
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<input type="hidden" id="akceId" name="akce" value="">
<p id="demo"></p>
<p id="posli"></p>
<!--<input type="submit" name="submit" value="Submit"> -->
</form>
 <br>
<!-- <p id="demo1">demo1</p>
<p id="demo2">demo2</p>-->
<p id="demo3"></p>
<?php

?>