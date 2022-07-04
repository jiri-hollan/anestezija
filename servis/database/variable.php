<?php
$dataPreg= '["bolnisnica", "ime", "priimek", "status"]';
$dataSklep= '["bolnisnica", "sklep", "status"]';
$poradiPreg= "priimek";
$poradiSklep= "sklep";

foreach (json_decode($dataPreg) as $value) {
  echo "$value <br>";
}
?>

