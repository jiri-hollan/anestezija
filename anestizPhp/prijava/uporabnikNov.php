<!DOCTYPE html>
<html lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
<?php



//vstavi($email,$geslo,$ime,$priimek,$status) 

$email=$geslo=$ime=$priimek=$status=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//echo $_POST["ime"];	
if (empty($_POST["ime"])) {
    echo"ime is required";
  } else {
    $ime = test_input($_POST["ime"]);
  }	

if (empty($_POST["priimek"])) {
    echo "priimek is required";
  } else {
    $priimek = test_input($_POST["priimek"]);  
  }
if (empty($_POST["email"])) {
    echo "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

if (empty($_POST["email"])) {
    echo "Email is required";
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


	include '../skupne/prijavniWeb.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO". " " . $nameTable . " " . " (email,geslo,ime,priimek,status)
  VALUES ('$email','$geslo','$ime','$priimek','$status')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>


</body>
</html>