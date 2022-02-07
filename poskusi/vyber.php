<!DOCTYPE html>
<html lang="cs-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!--konec zahlavi-->

<?php
include 'database1.php';
//$tabulka="uporabnikiTbl2";
$tabulka="pregledovalciTbl";
$stolpci=["*"];
//$stolpci=["ime","priimek"];
$podminka = array("ime"=>"Jiří");
//$podminka = array("ime"=>"Jiří", "Ben"=>"37", "Joe"=>"43");


$vyber = new database($tabulka, $stolpci, $podminka );
$vyber->vyber($tabulka, $stolpci, $podminka);
$vybrano=$vyber->vyber($tabulka, $stolpci, $podminka );
//echo $vybrano[1];
echo var_dump($vybrano);
echo "<br>";
echo count($vybrano);
$dolzina=count($vybrano);
//echo $vybrano[1];
echo "<br>";
for ($i = 0; $i < $dolzina; $i++) {
foreach ($vybrano[$i] as $key => $value) {
   // echo "$key: $value\n";
	echo "$value\n";
}//od foreach
}//od for

?>
<!--zapati-->
</body>
</html>