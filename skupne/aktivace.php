
<?php
require_once'database.php';
// aktivace
$database=new Database;
$database->testirajBolnik();
if($database->bolnikObstaja==2){
$tabulka="bolnikOmejitve";
$sloupce=["razlog", "nivo"];
$podminka=["razlog"=>"gdpr"];
$database= new Database;
$gdpr=$database->vyber($tabulka,$sloupce,$podminka);
//echo '<br>'.count($gdpr).'<br>';
if(count($gdpr)==1){
$gdpr=	$gdpr[0]['nivo'];
//echo var_dump($gdpr);
//echo '<br>'.$gdpr;
}
}else{
$gdpr=0;	
}
?>