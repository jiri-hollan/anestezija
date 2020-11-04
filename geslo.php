<!DOCTYPE html>
<html>
<body>

<h1>uporaba gesla</h1>

<?php

if(isset($_POST['psw'])){
	  $geslo = $_POST["psw"];        
}else{
	echo "geslo ni definirano";
	}

 if ($geslo == "bridion123") {
//sem pride peklop na razpored
}else{
echo "napačno geslo: " . $geslo;
}

?>

</body>
</html>