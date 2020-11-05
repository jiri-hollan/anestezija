<!DOCTYPE html>
<html>
<body>

<!--<h1>Razpored</h1>-->

<?php
$opozorilo= '<script>';
$opozorilo.= 'alert';
$opozorilo.= '("';
$opozorilo.= 'napačno geslo")';
$opozorilo.= ';';
$opozorilo.= '</script>';

if(isset($_POST['psw'])){
	  $geslo = $_POST["psw"];        
}else{
	//echo "geslo ni definirano";


echo $opozorilo;
$pojdi = 'menuFile.html';
	}

 if ($geslo == "bridion@123?") {
//sem pride peklop na razpored
$pojdi = 'oddelek/razpisMeseci.html';
}else{
echo $opozorilo;
//echo "napačno geslo: " . $geslo;
$pojdi = 'menuFile.html';
}

?>

 
	 <script>		  
   window.location.assign("<?php echo $GLOBALS ['pojdi'] ?>");
	</script> 

</body>
</html>