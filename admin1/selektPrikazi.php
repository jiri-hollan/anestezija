
<?php
require_once '../skupne/sabloni/zahlavi.php';
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

function test_input($test) {
  $test = trim($test);
  $test = stripslashes($test);
  $test = htmlspecialchars($test);
  return $test;
}

echo '
<p>vnesi ime tabele and click OK:</p>

<form method="post" action="../skupne/ogledTabele.php">
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