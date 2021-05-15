<!DOCTYPE html>
<html lang="sl-SI">

<body>
<?php

if ($registracija){
    $edini=preveriUnique($nameTable,$email);
	if ($edini){
			echo $edini . "ta uporabnik že obstaja";
	$registracija=false;
		
	}else  {
	$registracija=true;	
	}
}	
	
function preveriUnique($nameTable,$email) {
	
try {

  include '../skupne/prijavniWeb.php';

   $stmt = $conn->prepare("SELECT email,geslo,status FROM $nameTable WHERE email='$email'");
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


</body>
</html>