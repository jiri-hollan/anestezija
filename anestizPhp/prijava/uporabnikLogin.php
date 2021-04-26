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



if (empty($_POST["email"])) {
    echo "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

if (empty($_POST["geslo"])) {
    echo "geslo is required";
  } else {
    $geslo = test_input($_POST["geslo"]);
  }
  
}

$nameTable = "uporabnikiTbl";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


	
try {
	
  require '../skupne/prijavniWeb.php';

 // $sql = "SELECT email,geslo,status FROM $nameTable WHERE email='$email' AND geslo='$geslo' ";
 
  // use exec() because no results are returned
//$conn->exec($sql);
  
  $stmt = $conn->prepare("SELECT email,geslo,status FROM $nameTable WHERE email='$email' AND geslo='$geslo' ");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  //var_dump ($stmt->fetchAll());
    echo $stmt->rowCount() . " zapisov<br>";
   
  if ($stmt->rowCount()>0){
	  echo "Uporabnik je prijavljen";  
  }else{
	  echo "geslo ali username ni pravilno";
  }

  
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>


</body>
</html>