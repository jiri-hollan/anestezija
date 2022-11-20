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
function pokaziStolpce($tabulka) {
include '../skupne/narediTablo.php';	
$databaseGloboka=new DatabaseGloboka;	
$databaseGloboka->	pokaziStolpce($tabulka); 
	
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