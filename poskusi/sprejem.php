
<doctyp! html>

<html>
<body>
<div id="result" >to je rezult</div>
<p>
<p>
<?php
//session_start();
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


//$_SESSION["testJSON"] = $iskaniPregled;
$GLOBALS['testJSON'] = $iskaniPregled;
?>


<script>
 // document.getElementById("result").innerHTML = sessionStorage.getItem("testJSON");
 // alert(sessionStorage.getItem("testJSON"));
  document.getElementById("result").innerHTML = sessionStorage.getItem("$GLOBALS['testJSON']");
  alert(sessionStorage.getItem("$GLOBALS['testJSON']"));  
  
  
  
  </script>
  </body>
  </html>