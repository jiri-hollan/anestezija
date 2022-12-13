
<?php
require_once'database.php';
// aktivace
$tabulka="omejitveTbl";
$sloupce=["nivo"];
$podminka=["razlog"=>"gdpr"];
$database= new Database;
$gdpr=$database->vyber($tabulka,$sloupce,$podminka);

//var_dump($gdpr);
echo '<br>'.count($gdpr).'<br>';
if(count($gdpr)==1){
$gdpr=	$gdpr[0]['nivo'];
echo var_dump($gdpr);
echo '<br>'.$gdpr;
//echo $gdpr->nivo;
}
?>