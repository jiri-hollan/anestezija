<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="css/gesla.css">
</head
<body>
<div id= "vstop">
<form action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
  <label id= "label" for="pwd">Geslo:</label><br>
  <input type="password" id="psw" name="psw"><br><br>
  <input type="submit" value="Potrdi">
</form>
</div>
<!--<h1>Razpored</h1>-->

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	gesloFunction();
}

function gesloFunction() {
echo "na zacetku";
$opozorilo= '<script>';
$opozorilo.= 'alert';
$opozorilo.= '("';
$opozorilo.= 'napačno geslo")';
$opozorilo.= ';';
$opozorilo.= '</script>';	
	
if(isset($_POST['psw'])){
	  $geslo = $_POST["psw"];        
}else{
//-----------naj bi izpisalo pozorilo----------------
echo $opozorilo;
	}

 if ($geslo == "bridion@123?") {
//---------------------sem pride peklop na razpored-----------------------------
header('Location: oddelek/razpisMeseci.php');
}else{
//--------------------naj bi izpisalo "napačno geslo: "in vrnilo na menuFile.php----------------
echo $opozorilo;
header('Location: menuFile.php?pogled="raz"');
}
}
?>


</body>
</html>