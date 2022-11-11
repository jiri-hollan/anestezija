
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<!--<p>Vnos novega besedila v tabelo:</p>-->

<?php
// define variables and set to empty values
$nameTable = $naslov = $direktorij  =  $fajl = "";
//$nameTable = $imeZdr = $priimekZdr  = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nameTable = test_input($_POST["nameTable"]);
 // $nameTable = vstavi($_POST["nameTable"]);
  
    
  $naslov = test_input($_POST["naslov"]);
  $direktorij = test_input($_POST["direktorij"]);
  $fajl = test_input($_POST["fajl"]); 

 
  
vstavi($nameTable,$naslov,$direktorij,$fajl);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
echo "<h2>Your Input:</h2>";
echo $nameTable . "<br>" . $naslov . " " . $direktorij . " " . $fajl;


?>



<?php


function vstavi($nameTable,$naslov,$direktorij,$fajl) {
	include '../../skupne/streznik.php';

$nameTable;
$naslov;
$direktorij;
$fajl;



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO". " " . $nameTable . " " . " (naslov, direktorij, fajl)
    VALUES ('$naslov', '$direktorij', '$fajl')";
	echo "<br>";
	echo $sql . "<br>" ;
	
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    { 
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?>

</body>
</html>