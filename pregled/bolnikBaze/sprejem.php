<doctyp! html>
<html lang="cs-SI">
<head>
<meta charset="utf-8">
</head>
<body>
<!--<div id="result" >to je rezult</div>-->
<p>
<p>
<?php
//session_start();
require_once '../../skupne/database.php';
$conn = new Database();
//var_dump($_GET);
$id = $_GET["id"];
//echo '<p>sprejeto: '.$id.'</p>';
$nameTable = "bolnikTbl";
$stolpci = array('*');
$podminka = array("pregledId"=>$id);
$prebrano = $conn->vyber($nameTable, $stolpci, $podminka);
//var_dump($prebrano[0]);
// tu treba odstraniti pregledId
unset($prebrano[0]['pregledId']);
$iskaniPregled = json_encode($prebrano[0]);


//$_SESSION["testJSON"] = $iskaniPregled;
$GLOBALS['testJSON'] = $iskaniPregled;
?>


<script>
  stringJson='<?php echo $GLOBALS['testJSON'];?>';
  //alert(stringJson);
  sessionStorage.setItem("testJSON", stringJson);
 
 // document.getElementById("result").innerHTML = sessionStorage.getItem("testJSON");
  //alert(sessionStorage.getItem("testJSON"));  
  window.location.href = "../bolnik.php"; 
  
  </script>
  </body>
  </html>