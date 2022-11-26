
<?php
require_once '../skupne/sabloni/zahlavi.php';

function test_input($test) {
  $test = trim($test);
  $test = stripslashes($test);
  $test = htmlspecialchars($test);
  return $test;
}
 include '../skupne/narediTablo.php';	
$databaseGloboka=new DatabaseGloboka;
$databaseGloboka->pokaziTable();
?>
</body>
</html>