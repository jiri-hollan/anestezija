<?php

if ($registracija){
    $edini=preveriUnique($nameTable,$email,$uname);
	if ($edini){
			echo $edini . "ta uporabnik že obstaja";
	$registracija=false;
		
	}else  {
	$registracija=true;	
	}
}	
	
function preveriUnique($nameTable,$email,$uname) {
	
try {

  include '../skupne/prijavniWeb.php';

   $stmt = $conn->prepare("SELECT email,uname,geslo,status FROM $nameTable WHERE uname='$uname' OR email='$email'");
  $stmt->execute();
 
  $edini = $stmt->rowCount()>0;

 if ($edini){
	  echo "Uporabnik je registriran"; 
 }
  return $edini;
  
} catch(PDOException $e) {
  echo "napaka" . "<br>" . $e->getMessage();
}

$conn = null;
}
?>

