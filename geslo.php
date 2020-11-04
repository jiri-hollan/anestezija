<!DOCTYPE html>
<html>
<body>

<!--<h1>Razpored</h1>-->

<?php

if(isset($_POST['psw'])){
	  $geslo = $_POST["psw"];        
}else{
	//echo "geslo ni definirano";
	}

 if ($geslo == "bridion@123?") {
//sem pride peklop na razpored
//include 'oddelek/razpisMeseci.php';
$pojdi = 'oddelek/razpisMeseci.html';
}else{
//echo "napačno geslo: " . $geslo;
}

?>

 
	 <script>		  
   window.location.assign("<?php echo $GLOBALS ['pojdi'] ?>");
	</script> 

</body>
</html>