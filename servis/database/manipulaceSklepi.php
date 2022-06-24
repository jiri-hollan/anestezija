
<?php
 require_once('../sabloni/vkladane/zahlavi.php');
/* V tom failu so funkcije za spreminjanje tabele databaze*/
 require_once('sabloni/formBaze.php');
 require_once '../../skupne/database.php';
 require_once('manipulaceClass1.php');
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
  //echo var_dump($status) .'<br>';
  akceFunction($akce);
}//od if
  else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["akce"])) {
  $akce = test_input($_GET["akce"]);
  akceFunction($akce);
  }//od else if
  //______________________________________________________________________
  function akceFunction($akce, $tabulka="sklepiTbl"){
switch ($akce) {
case "vyber":
    $bolnisnica=test_input($_POST["bolnisnica"]);		
    //$tabulka="sklepiTbl";
    $stolpci=["*"];
	$vyber = new Vyber($bolnisnica, $tabulka, $stolpci, $poradi='sklep');
	$vyber->vyberFunction();
    break;
case "vloz":
    //$tabulka="sklepiTbl";
    $bolnisnica=test_input($_POST["bolnisnica"]);
    $sklep = test_input($_POST["sklep"]);
   // $priimek = test_input($_POST["priimek"]);
    $aktiven = test_input($_POST["aktiven"]);  
	//$vloz = new Vloz($bolnisnica, $tabulka, $ime, $priimek, $status);
	$vloz = new Vloz($bolnisnica, $tabulka, $sklep, $aktiven);
	$vloz->vlozFunction();	
    break;
case "uredi":
    //$tabulka="sklepiTbl";
    $id=test_input($_POST["id"]);
    $bolnisnica=test_input($_POST["bolnisnica"]);
    $sklep = test_input($_POST["sklep"]);
	//$priimek = test_input($_POST["priimek"]);
	$aktiven = test_input($_POST["aktiven"]); 	
	//$uredi = new Uredi($bolnisnica, $tabulka, $id, $ime, $priimek, $aktiven);
	$uredi = new Uredi($bolnisnica, $tabulka, $id, $sklep, $aktiven);
	$uredi->aktualizujFunction();
    break;


case "edit":
    //$tabulka="sklepiTbl";
    $id = test_input($_GET["id"]);
	//echo "id uporabnika= " .  $id;
	echo "<br>";
	// var_dump($id);
	// echo "<br>"; 
	$edit = new Edit($tabulka, $id); 	 
    break;
case "odstrani":
     //$tabulka="sklepiTbl";
     $id = test_input($_GET["id"]);
	// echo "id uporabnika= " .  $id;
	 echo "<br>";
	$odstrani = new Odstrani($tabulka, $id); 
	//odstraniFunction($podminka);
    // odstraniFunction();
    break;	
default:
    echo "ni izvelo get case"; 
  }//od switch	  

  }//od akceFunction

?>

<script src="js/manipulaceSklepi.js?<?php echo time(); ?>">
</script>



<!--zapati-->
</body>
</html>