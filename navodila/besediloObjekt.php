<?php
require_once '../skupne/database.php';
/* prikazi raznih navodil*/
class Besedila {
	public $otazka;//kaj hočem vedet
	public function __construct($otazka) {	
	$tabulka="besedilaTbl";
	$stolpci=["id", "tematika", "naslov", "direktorij","fajl"];
	$podminka=[""];
	$vyber = new database();
	$vybrano=$vyber->vyber($tabulka, $stolpci, $podminka );
//echo $vybrano[1];
//echo var_dump($vybrano);
	echo "<br>";
	try {
/*$teme vsebuje polja "tematika" iz tabele besedila "covid,cellsaver,premedikacija in mogoče še ..."*/
		$teme=array();
        foreach ($vybrano as $value) {
		$teme[] = $value["tematika"];
		$teme = array_unique($teme);
/*za enkrat ta array ni v uporabi*/

		}
//echo var_dump($teme);
//echo $value["tematika"];
/*izpiše nadpise iz tabele pod temo v stavku if($value["tematika"])*/
    echo '<ul class= "navodilaId">';
    foreach ($vybrano as $value) {
//var_dump($value);
        if($value["tematika"]==$otazka){
        echo '<li><a href= "' . $value["direktorij"] . $value["fajl"] . '" >' . $value["naslov"] . '</a></li>';
      }
    }
    echo '</ul><br>';
	 }
	catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
}
$conn = null;
	}//od construct	
}//0d class Besedila

/*prikaže izbiro vnešenega besedila iz podatkov v bazi "navodila" tabela "besedilaTbl"*/

?>
