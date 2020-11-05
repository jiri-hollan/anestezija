<!DOCTYPE html>
<html>
<body>

<!--<h1>Razpored</h1>-->

<?php

if(isset($_POST['psw'])){
	  $geslo = $_POST["psw"];        
}else{
	//echo "geslo ni definirano";
$pojdi = 'menuFile.html';
	}

 if ($geslo == "bridion@123?") {
//sem pride peklop na razpored
$pojdi = 'oddelek/razpisMeseci.html';
}else{
//echo "napačno geslo: " . $geslo;
$pojdi = 'menuFile.html';
}

?>

 
	 <script>		  
   window.location.assign("<?php echo $GLOBALS ['pojdi'] ?>");
	</script> 

</body>
</html>