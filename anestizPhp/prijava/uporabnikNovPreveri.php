<!DOCTYPE html>
<html lang="sl-SI">

<body>
<?php



//vstavi($email,$geslo,$ime,$priimek,$status) 
$registracija=true;
$email=0;



if (empty($_POST["email"])) {
    echo "Email is required";
	$registracija=false;	
  } else {
     $email = test_input($_POST["email"]);;
  }

$nameTable = "uporabnikiTbl";

function test_input1($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//echo "<br>".$keys ."<br>";
//echo $values;

if ($registracija){
    $edini=preveriUnique($nameTable,$email);
	echo $edini . "ta uporabnik že obstaja";
	
	//registracija($nameTable,$keys,$values);	
	}else  {
		
	}
	
	
function preveriUnique($nameTable,$email) {
	
try {
//$email=$geslo=$ime=$priimek=$status="";	
  include '../skupne/prijavniWeb.php';
 
 /*$sql = "SELECT * FROM". " " . $nameTable . " " . " 
  WHERE email='$email'";*/
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