<?php
include 'database1.php';
//$tabulka="uporabnikiTbl2";
$tabulka="pregledovalciTbl";
$data= array("bolnisnica"=>"izola", "ime"=>"Hana", "priimek"=>"Hollan", "status"=>"1");

$vloz = new database($tabulka,$data);
$vloz->vloz($tabulka,$data);
$vlozeno=$vloz->vloz($tabulka,$data );
//echo $vlozeno[1];
echo var_dump($vlozeno);
echo "<br>";
echo count($vlozeno);
echo "<br>";
$dolzina=count($vlozeno);
echo $dolžina;
echo "<br>";


?>