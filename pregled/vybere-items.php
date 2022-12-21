<?php
if(isset($_POST["trazi"])) {
$trazi=$_POST["trazi"];
 /*    $a0= '
	   <input id="data" type="hidden" name="data" value="" style="width:90%;"></input><br>
<label for "ustanova">bolnišnica:</label>
<input id="ustanova" type="text" name="ustanova" value="" required ></input>'; */
switch($trazi){
case "stevMaticna":
$najdeno='
<label for "stevMaticna">matična številka</label>
<input   type="number" name="stevMaticna"  ></input>
'; 
break;
case "priimek":
$najdeno= '<label for "priimek">Priimek</label>
<input   type="text" name="priimek"  ></input>
';
break;
}
} 
?>