<!DOCTYPE html>
<html>
<body>

<h1>Razpored</h1>

<?php

if(isset($_POST['psw'])){
	  $geslo = $_POST["psw"];        
}else{
	echo "geslo ni definirano";
	}

 if ($geslo == "bridion123") {
//sem pride peklop na razpored
include 'oddelek/razpisMeseci.php';
}else{
echo "napačno geslo: " . $geslo;
}

?>

</body>
</html>