
<?php
 //$tabulka="pregledovalciTbl";
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
  if (isset($_POST["bolnisnica"])){
	  $bolnisnica = test_input($_POST["bolnisnica"]);  
  }else {
	 $bolnisnica = "";   
  }
  
   if (isset($tabulka)){
	  $tabulka= $tabulka; 
  }else if (isset($_POST["tabulka"])){
	  $tabulka= test_input($_POST["tabulka"]); 
  }else {
	  echo "ni tabulke v post";
	 $tabulka = "pregledovalciTbl"; 
  }
  //$tabulka= test_input($_POST["tabulka"]);
  echo strtoupper($akce) .': ';
  echo strtoupper($bolnisnica) .'<br>';
  //echo var_dump($status) .'<br>';
  akceFunction($akce,$tabulka,$bolnisnica);
}//od if
  else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["akce"])) {
  $akce = test_input($_GET["akce"]);
    if (isset($_GET["bolnisnica"])){
	  $bolnisnica = test_input($_GET["bolnisnica"]);  
  }else {
	 $bolnisnica = ""; 
  }
      if (isset($tabulka)){
	  $tabulka= $tabulka; 
  }else if (isset($_GET["tabulka"])){
	  $tabulka = test_input($_GET["tabulka"]);  
  }else {
	  echo "ni tabulke v get";
	 $tabulka = "pregledovalciTbl"; 
  }
  akceFunction($akce,$tabulka,$bolnisnica);
  }//od else if
  //______________________________________________________________________
  function akceFunction($akce,$tabulka, $bolnisnica="" ){
switch ($akce) {
case "vyber":
   // $bolnisnica=test_input($_POST["bolnisnica"]);		    
    $stolpci=["*"];
	$vyber = new Vyber($bolnisnica, $tabulka, $stolpci, $poradi='priimek');
	$vyber->vyberFunction();
    break;
case "vloz":    
   // $bolnisnica=test_input($_POST["bolnisnica"]);
    $ime = test_input($_POST["ime"]);
    $priimek = test_input($_POST["priimek"]);
    $status = test_input($_POST["status"]);  
	$vloz = new Vloz($bolnisnica, $tabulka, $ime, $priimek, $status);
	$vloz->vlozFunction();	
    break;
case "uredi":
    $id=test_input($_POST["id"]);
   // $bolnisnica=test_input($_POST["bolnisnica"]);
    $ime = test_input($_POST["ime"]);
	$priimek = test_input($_POST["priimek"]);
	$status = test_input($_POST["status"]); 	
	$uredi = new Uredi($bolnisnica, $tabulka, $id, $ime, $priimek, $status);
	$uredi->aktualizujFunction();
    break;
case "edit":   
    $id = test_input($_GET["id"]);
	//echo "id uporabnika= " .  $id;
	echo "<br>";
	// var_dump($id);
	// echo "<br>"; 
	$edit = new Edit($tabulka, $id); 	 
    break;
case "odstrani":
     
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

<script src="js/manipulacePregledovalci.js?<?php echo time(); ?>">
</script>

<!--zapati-->
</body>
</html>