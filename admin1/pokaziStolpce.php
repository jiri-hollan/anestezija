<!--<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
-->
<?php
require_once '../skupne/sabloni/zahlavi.php';
 $imeTable  = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (isset($_GET['imeTable'])){
  $imeTable = test_input($_GET["imeTable"]);
  //$imeTable = pokaziStolpce($_POST["imeTable"]);
  $imeTable = pokaziStolpce($imeTable);
		}
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
<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: 
  <input type="text" name="imeTable">
  <input type="hidden" name="nazaj" value= <?php echo $nazaj;?>> 
  <br><br>
 
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>