
<?php
 //$tabulka="sklepiTbl";
 require_once('../sabloni/vkladane/zahlavi.php');
/* V tom failu so funkcije za spreminjanje tabele databaze*/
 require_once('sabloni/formBaze.php');
 require_once '../../skupne/database.php';
 require_once('manipulaceClassUniverzal1.php');
function test_input($test) {
  $test = trim($test);
  $test = stripslashes($test);
  $test = htmlspecialchars($test);
 // $test = strtolower($test);
  return $test;
}
//_____________________________________________________________
if (isset($_REQUEST["akce"])) {
	  $akce = test_input($_REQUEST["akce"]);
  if (isset($_REQUEST["bolnisnica"])){
	  $bolnisnica = test_input($_REQUEST['bolnisnica']);  
  }else {
	 $bolnisnica = "";   
  }
 if (isset($tabulka)){
	  $tabulka= $tabulka; 
  }else if (isset($_REQUEST["tabulka"])){
	  $tabulka= test_input($_REQUEST["tabulka"]);	  
  }else {
	  echo "ni tabulke v post";
	 //$tabulka = "sklepiTbl"; 
  }
    echo strtoupper($akce) .': ';
  echo strtoupper($bolnisnica) .'<br>';
  akceFunction($akce,$tabulka,$bolnisnica);

	  
}//od if
//_________________________________________________________________

  //______________________________________________________________________
  function akceFunction($akce,$tabulka, $bolnisnica="" ){

switch ($akce) {
case "vyber":
   // $bolnisnica=test_input($_POST["bolnisnica"]);		    
    $stolpci=["*"];
	$vyber = new Vyber($bolnisnica, $tabulka, $stolpci, $poradi='sklep');
	$vyber->vyberFunction();
    break;
case "vloz":    
   // $bolnisnica=test_input($_POST["bolnisnica"]);
    $sklep = test_input($_POST["sklep"]);
    $aktiven = test_input($_POST["aktiven"]);  
	$data = array("bolnisnica"=>$bolnisnica, "sklep"=>$sklep, "aktiven"=>$aktiven);	
	$vloz = new Vloz($bolnisnica, $tabulka, $data);
	$vloz->vlozFunction();	
    break;
case "uredi":
echo "case uredi <br>";
print_r($_POST);
echo "<br>";
    $id=test_input($_POST["id"]);
   // $bolnisnica=test_input($_POST["bolnisnica"]);
    $sklep = test_input($_POST["sklep"]);
	$aktiven = test_input($_POST["aktiven"]); 

    $podminka = array("id"=>$id);
	$data = array("bolnisnica"=>$bolnisnica, "sklep"=>$sklep, "aktiven"=>$aktiven);
	$uredi = new Uredi($bolnisnica, $tabulka, $podminka, $data);
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

<script src="js/manipulaceSklepi.js?<?php echo time(); ?>">
</script>

<!--zapati-->
</body>
</html>