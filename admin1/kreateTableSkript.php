<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
// define variables and set to empty values
$nameTable = $polja = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nameTable = test_input($_POST["nameTable"]);
  //$nameTable = naredi($_POST["nameTable"]);
  $polja = test_input($_POST["polja"]);
  //$nameTable = naredi($_POST["nameTable"]);
  
  
  echo "<br>";
  echo "nameTable=" . " " . $nameTable;
   echo "<br>";
  echo "polja=" . " " . $polja;
  echo "<br>";
  naredi($nameTable,$polja);
 

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  echo "<br>";
  echo  "Funkcija test data=" . " " . $data;
 
  
  return $data;
}
?>

<h2>Vnesi ime tabele in potrdi</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="nameTable">
        <!--<input type="text" name="polja">-->
		<input type="submit" name="Submit" value="potrdi"> 
		<br>
		<textarea name="polja" rows="10" cols="30"></textarea>
        <!--<input type="submit" name="Submit" value="potrdi"> --> 
</form>





<?php
echo "<h2>Your Input:</h2>";
echo $nameTable . "<br> " . $polja;

?>



<?php
function naredi($imeTable,$polja) {
include '../skupne/streznik.php';



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql za narediti tablo
    $sql = "CREATE TABLE". " " . $imeTable . " " . " ( " . $polja . ")";

    // use exec() because no results are returned
    $conn->exec($sql);
	echo "<br>";
    echo "Table" . " " . $imeTable . " created uspešno";
	echo "<br>";
    }
catch(PDOException $e)
    {
	echo "<br>";	
    echo "to je SQL= <br>" . $sql . "<br><br>" . $e->getMessage();
	echo "<br>";
    }

$conn = null;

}
?>

</body>
</html>
