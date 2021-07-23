<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<p>vnesi ime tabele and click OK:</p>

<?php
// define variables and set to empty values
$name  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $name = naredi($name);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="bolnikTbl">
  <br><br>
 
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo "<br>";
?>

<?php
function naredi($ime) {
include '../../skupne/streznik.php';
$ime ;

//$dbname="navodila";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
	
    $sql = "ALTER TABLE". " " . $ime . " " . " 
 
 ADD dan INTEGER,
mesec INTEGER,
leto INTEGER,

    ";
	/*ALTER TABLE Customers

  ADD last_name VARCHAR(50),
      first_name VARCHAR(40);*/
	
	

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Tabela" . " " . $ime . " uspešno narejena";
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
