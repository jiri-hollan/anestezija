<doctyp! html>
<html>
<body>
<div id="result">to je rezult</div>
<p>
<p>
<?php
require_once '../skupne/database.php';
$conn = new Database();
var_dump($_GET);
$id = $_GET["id"];
echo '<p>sprejeto: '.$id.'</p>';
$nameTable = "bolnikTbl";
$stolpci = array('*');
$podminka = array("pregledId"=>$id);
$prebrano = $conn->vyber($nameTable, $stolpci, $podminka);
//var_dump($prebrano[0]);
$iskaniPregled = json_encode($prebrano[0]);

session_start();
$_SESSION["testJSON"] = $iskaniPregled;

?>


<script>
  document.getElementById("result").innerHTML = sessionStorage.getItem("testJSON");
  </script>
  </body>
  </html>