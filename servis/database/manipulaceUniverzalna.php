
<?php
//$tabulka=$_GET["imeTable"];
   //$tabulka= "pregledovalciTbl";
//	var_dump($tabulka);
 require_once('../sabloni/vkladane/zahlavi.php');
/* V tom failu so funkcije za spreminjanje tabele databaze*/
 require_once('sabloni/formBaze.php');
 require_once '../../skupne/database.php';
 require_once('manipulaceClassUniversal.php');
 //	echo($_GET["imeTable"] . "<br>");
 if (isset($_GET["imeTable"])) {
 $tabulka=$_GET["imeTable"];    
   //$tabulka= "pregledovalciTbl";
	//var_dump($tabulka);
 }else {
	// $tabulka=$tabulka= "pregledovalciTbl";
	echo "ni tabulke";
	 //	var_dump($tabulka);
 }
 //	var_dump($tabulka);
function test_input($test) {
  $test = trim($test);
  $test = stripslashes($test);
  $test = htmlspecialchars($test);
 // $test = strtolower($test);
  return $test;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $akce = test_input($_POST["akce"]);
  $bolnisnica = test_input($_POST["bolnisnica"]);
  echo strtoupper($akce) .': ';
  echo strtoupper($bolnisnica) .'<br>';
//  echo var_dump($tabulka) .'<br>';
  akceFunction($akce, $tabulka);
}//od if
  else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["akce"])) {
  $akce = test_input($_GET["akce"]);
// $tabulka = test_input($_GET["imeTable"]);
  akceFunction($akce);
  }//od else if
 require_once('akceUniverzalna.php');
?>
<script src="js/manipulaceUniverzalna.js?<?php echo time(); ?>">
</script>



<!--zapati-->
</body>
</html>