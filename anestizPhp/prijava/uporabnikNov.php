<!DOCTYPE html>
<html lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
<?php



//vstavi($email,$geslo,$ime,$priimek,$status) 
$registracija=true;
$email=$geslo=$ime=$priimek=$status=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//echo $_POST["ime"];	
if (empty($_POST["ime"])) {
    echo"ime is required";
	$registracija=false;
	
	
  } else {
    $ime = test_input($_POST["ime"]);
  }	

if (empty($_POST["priimek"])) {
    echo "priimek is required";
	$registracija=false;
  } else {
    $priimek = test_input($_POST["priimek"]);  
  }
if (empty($_POST["email"])) {
    echo "Email is required";
	$registracija=false;	
  } else {
    $email = test_input($_POST["email"]);
  }

if ($_POST["geslo"]!=$_POST["psw-repeat"]) {
    echo "napačen vnos gesla";
	$registracija=false;	
  } else {
    $geslo = test_input($_POST["geslo"]);
  }
  
}
$status = 1;
$nameTable = "uporabnikiTbl";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($registracija){
	registracija($nameTable,$email,$geslo,$ime,$priimek,$status);
	}


function registracija($nameTable,$email,$geslo,$ime,$priimek,$status) {
	
try {
	
  include '../skupne/prijavniWeb.php';
 
  $sql = "INSERT INTO". " " . $nameTable . " " . " (email,geslo,ime,priimek,status)
  VALUES ('$email','$geslo','$ime','$priimek','$status')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Uporabnik je registriran";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}
?>


</body>
</html>