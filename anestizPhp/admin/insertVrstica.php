
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

p>Novi zapis v tabelo:</p>

<?php
// define variables and set to empty values
$nameTable = $imeZdr = $priimekZdr  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nameTable = test_input($_POST["nameTable"]);
 // $nameTable = vstavi($_POST["nameTable"]);
  
    
  $imeZdr = test_input($_POST["imeZdr"]);
 // $imeZdr = vstavi($_POST["imeZdr"]);
  
  $priimekZdr = test_input($_POST["priimekZdr"]);
 // $priimekZdr = vstavi($_POST["priimekZdr"]);
 
  
vstavi($nameTable,$imeZdr,$priimekZdr);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Vpis Vrstice</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  ime tabele: <input type="text" name="nameTable">
  <br><br>
 ime Zdravnika: <input type="text" name="imeZdr">
  <br><br>
 priimek Zdravnika: <input type="text" name="priimekZdr">
 
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $nameTable . "<br>" . $imeZdr . " " . $priimekZdr;


?>



<?php


function vstavi($nameTable,$imeZdr,$priimekZdr) {
	include '../skupne/streznik.php';

$nameTable;
$imeZdr;
$priimekZdr;



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO". " " . $nameTable . " " . " (firstname, lastname)
    VALUES ('$imeZdr', '$priimekZdr')";
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