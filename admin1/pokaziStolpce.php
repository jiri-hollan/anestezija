<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<?php

 $imeTable  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $imeTable = test_input($_POST["imeTable"]);
  //$imeTable = pokaziStolpce($_POST["imeTable"]);
  $imeTable = pokaziStolpce($imeTable);
}
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} 
function pokaziStolpce($ime) {
include '../skupne/streznik.php';	
	    echo $ime, '<br>';
		
//Connect to MySQL using the PDO object.
    $pdo = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
	    // $conn = new PDO("mysql:host=$servername", $username, $password);
    // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//Our SQL statement, which will select a list of tables from the current MySQL database.
// $sql = "SELECT * FROM podatkiVsi";
 //$sql = "select column_name from information_schema.columns where table_name = 'kartakoTabela'";
 
   $sql = "select column_name from information_schema.columns where table_name = '$ime'";
   echo $sql, "<br>";
//Prepare our SQL statement,
   $statement = $pdo->prepare($sql);
   echo "To so stolpci tabele: " . $ime, "<br>";
//Execute the statement.
   $statement->execute();
 
//Fetch the rows from our statement.
//$tables = $statement->fetchAll(PDO::FETCH_NUM);
  $tables = $statement->fetchAll(PDO::FETCH_NUM);
//Loop through our table names.
   foreach($tables as $table){
   //Print the table name out onto the page.
   //echo "stolpci:";
   //echo $table[0], '<br>';
   print_r($table);
   echo '<br>';	
}
}
?>
<h2>Prikaz stolpcev v izbrani tabeli</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="imeTable">
  <br><br>
 
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>