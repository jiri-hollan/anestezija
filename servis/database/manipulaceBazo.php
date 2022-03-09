
<?php
 require_once('../sabloni/vkladane/zahlavi.php');
/* V tom failu so funkcije za spreminjanje tabele databaze*/
 require_once('sabloni/formBaze.php');
 require_once '../../skupne/database.php';
 require_once('manipulaceClass.php');
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
  //$akce = naredi($akce);
switch ($akce) {
case "vyber":
    $bolnisnica=test_input($_POST["bolnisnica"]);		
    $tabulka="pregledovalciTbl";
    $stolpci=["*"];
	$vyber = new Vyber($bolnisnica, $tabulka,$stolpci);
	$vyber->vyberFunction();
    break;
case "vloz":
    $tabulka="pregledovalciTbl";
    $bolnisnica=test_input($_POST["bolnisnica"]);
    $ime = test_input($_POST["ime"]);
    $priimek = test_input($_POST["priimek"]);
    $status = test_input($_POST["status"]);  
	$vloz = new Vloz($bolnisnica, $tabulka, $ime, $priimek, $status);
	$vloz->vlozFunction();	
    break;
case "uredi":
    $tabulka="pregledovalciTbl";
    $id=test_input($_POST["id"]);
    $bolnisnica=test_input($_POST["bolnisnica"]);
    $ime = test_input($_POST["ime"]);
	$priimek = test_input($_POST["priimek"]);
	$status = test_input($_POST["status"]); 	
	$uredi = new Uredi($bolnisnica, $tabulka, $id, $ime, $priimek, $status);
	$uredi->aktualizujFunction();
    break;
default:
    echo "ni izvelo case";	
}//od switch
}//od if

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["akce"])) {
  $akce = test_input($_GET["akce"]);
switch ($akce) {
case "uredi":
    $tabulka="pregledovalciTbl";
    $id = test_input($_GET["id"]);
	echo "id uporabnika= " .  $id;
	echo "<br>";
	// var_dump($id);
	// echo "<br>"; 
	$edit = new Edit($tabulka, $id); 	 
    break;
case "odstrani":
     $tabulka="pregledovalciTbl";
     $id = test_input($_GET["id"]);
	 echo "id uporabnika= " .  $id;
	 echo "<br>";
	$odstrani = new Odstrani($tabulka, $id); 
	//odstraniFunction($podminka);
    // odstraniFunction();
    break;	
default:
    echo "ni izvelo get case"; 
  }//od switch	  
}//od if

//________________________________________________________________________________

//_______________________________________________________________________________________
function odstraniFunction($podminka){
	//echo 'odstraniFunction še ni napisana';
	$tabulka="pregledovalciTbl";
	$stolpci=["*"];
	$odstrani = new database();
//$vyber->vyber($tabulka, $stolpci, $podminka);
    $najdeno=$odstrani->vyber($tabulka, $stolpci, $podminka );
	var_dump($najdeno);
	$odstranjeno=$odstrani->odstrani($tabulka, $podminka );
	echo 'Odstranjen je bil '.$odstranjeno.' uporabnik';
}//od odstraniFunction

?>

<script src="js/manipulaceBazo.js?<?php echo time(); ?>">
</script>



<!--zapati-->
</body>
</html>