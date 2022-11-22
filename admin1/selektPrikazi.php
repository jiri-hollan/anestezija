<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<h2>Vsebina table</h2>

<?php
// define variables and set to empty values
$nazaj  = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (isset($_GET['nazaj'])){
  $nazaj = test_input($_GET['nazaj']);
	}else{	
	//var_dump($nazaj); 
	echo "nazaj ne obstaja";	
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo '
<p>vnesi ime tabele and click OK:</p>

<form method="get" action="../skupne/ogledTabele.php">
Ime table: 
<input type="text" name="imeTable">
<input type="hidden" name="nazaj" value='. $nazaj.'>
<input type="submit" name="submit" value="submit">  
</form>
';
/*
echo "<h2>Your Input:</h2>";
echo "ime table=   " . $name;
*/
?>

</body>
</html>