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
    $sql = "CREATE TABLE". " " . $ime . " " . " (
pregledId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
datPregleda DATE,
imeZdravnika VARCHAR(100),
stevMaticna INTEGER,
EMSO NUMERIC(20), 
dan INTEGER,
mesec INTEGER,
leto INTEGER,
datRojstva VARCHAR(100),
starost NUMERIC(3),
ime VARCHAR(100),
priimek VARCHAR(100),
oddelek VARCHAR(100),
dgOperativna VARCHAR(100),
opNacrtovana VARCHAR(100),
teza DECIMAL(5),
visina DECIMAL(4,2),
bmi INTEGER,
krvniTlak VARCHAR(100),
pulz NUMERIC(3),
hb DECIMAL(3),
ks DECIMAL(3,1),
inr DECIMAL(3,1),
aptc DECIMAL(3),
trombociti DECIMAL(4),
kreatinin DECIMAL(3),
laktat NUMERIC(3),
pbnp NUMERIC(3),
pct NUMERIC(3),
crp NUMERIC(3),
na NUMERIC(3),
k NUMERIC(3),
drugiIzvidi VARCHAR(100),
ekg VARCHAR(255),
rtg VARCHAR(255),
dgPridruzene VARCHAR(255),
terPredhodna VARCHAR(255),
asa INTEGER,
mallampati INTEGER,
alergija VARCHAR(100),
izvidiInOpombe BLOB(2147483647),
premedVecer VARCHAR(100),
premedPredOp VARCHAR(100),
navodila VARCHAR(255),
sklep VARCHAR(255),
status CHARACTER(15)
    )";

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
