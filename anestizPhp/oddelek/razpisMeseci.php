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


<a id="buttonDomov" href="../menuFile.php" >Domov</a>
<ul id= "meseci">
<?php
$pogled= $_GET['pogled'];
$mesec = array("januar"=>"Januar", "februar"=>"Februar", "marec"=>"Marec", "april"=>"April", "maj"=>"Maj", "junij"=>"Junij", "julij"=>"Julij", "avgust"=>"Avgust", "september"=>"September", "oktober"=>"Oktober", "november"=>"November", "december"=>"December");

foreach($mesec as $x => $val) {
  echo '<li onclick="myFunction(' . "'" . $x . "'" . ',' . "'" . $pogled . "'" . ')">' . $val;   //$x = $val<br>";
}

 
switch ($pogled) {
  case "raz":
    $slika ="slike/vOp.jpg" ;
    break;
  case "dez":
   $slika="slike/zahod.jpg";
    break;
  
  default:
    echo "nekje je prišlo do napake!";
}
 
 
 
?>

</ul>

<!--<p id=demo class=mesecni><img src="slike/vOp.jpg" alt="Standardna oprema" width="460" height="600"></p>-->
<p id=demo class=mesecni><img src="<?php echo $slika;?>" alt="Standardna oprema" width="460" height="600"></p>

</body>
</html>


