<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/razpisMeseci.js?<?php echo time(); ?>"></script> 
<link rel="stylesheet" href="../css/razpisMeseci.css?<?php echo time(); ?>">
</head>
<body>
<?php

require_once('../frontend/home.php');

echo '<a id="buttonDomov" href="' . $home . '" >Domov</a>';
?>

<!--<a id="buttonDomov" href="../menuFile.php" >Domov</a>-->
<ul id= "meseci">
<?php


if (isset($_GET['pogled'])) {
$pogled= $_GET['pogled'];	
$mesec = array("januar"=>"Januar", "februar"=>"Februar", "marec"=>"Marec", "april"=>"April", "maj"=>"Maj", "junij"=>"Junij", "julij"=>"Julij", "avgust"=>"Avgust", "september"=>"September", "oktober"=>"Oktober", "november"=>"November", "december"=>"December");

function writeMesece() {
global $mesec;
global $pogled;
foreach($mesec as $x => $val) {
  echo '<li onclick="myFunction(' . "'" . $x . "'" . ',' . "'" . $pogled . "'" . ')">' . $val;   //$x = $val<br>";
  }
}
 
switch ($pogled) {
  case "raz":
    $slika ="slike/vOp.jpg" ;
	writeMesece();
    break;
  case "dez":
   $slika="slike/zahod.jpg";
   writeMesece();
    break;
  
  default:
    echo "nekje je prišlo do napake!";
}
}else {
 //---------------če ni definiran $pogled, vrne se v osnovni menu--------
  header('Location: ../menuFile.php');
}

?>

</ul>

<!--<p id=demo class=mesecni><img src="slike/vOp.jpg" alt="Standardna oprema" width="460" height="600"></p>-->
<p id=demo class=mesecni><img src="<?php echo $slika;?>" alt="Standardna oprema" width="460" height="600"></p>

</body>
</html>


