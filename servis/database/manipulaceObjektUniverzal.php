
<?php
 //$tabulka poslana kot GET ali POST,;
 require_once('../sabloni/vkladane/zahlavi.php');
/* V tom failu so funkcije za spreminjanje tabele databaze*/
 require_once('sabloni/formBaze.php');
 require_once '../../skupne/database.php';
 require_once('manipulaceClassUniverzal.php');
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
	  switch ($tabulka){
		case "pregledovalciTbl" :
          $poradi='priimek';
        break;	   
		case "sklepiTbl": 
          $poradi="sklep";	
        break;
        default:
		 $poradi="";
	  }//od switch
  }else {
	  echo "ni tabulke v post";
	 //$tabulka = "pregledovalciTbl"; 
  }
    echo strtoupper($akce) .': ';
  echo strtoupper($bolnisnica) .'<br>';
      $stolpci=["*"];
  akceFunction($akce,$tabulka,$bolnisnica,$stolpci,$poradi);

	  
}//od if
//_________________________________________________________________

  //______________________________________________________________________
  function akceFunction($akce,$tabulka, $bolnisnica="",$stolpci, $poradi){

switch ($akce) {
case "vyber":
   // $bolnisnica=test_input($_POST["bolnisnica"]);		    
    //$stolpci=["*"];
	$vyber = new Vyber($bolnisnica, $tabulka, $stolpci, $poradi);
	$vyber->vyberFunction();
    break;
case "vloz":    
   // $bolnisnica=test_input($_POST["bolnisnica"]);
    $ime = test_input($_POST["ime"]);
    $priimek = test_input($_POST["priimek"]);
    $status = test_input($_POST["status"]);  
	$data = array("bolnisnica"=>$bolnisnica, "ime"=>$ime, "priimek"=>$priimek, "status"=>$status);	
	$vloz = new Vloz($bolnisnica, $tabulka, $data);
	$vloz->vlozFunction();	
    break;
case "uredi":
echo "case uredi <br>";
print_r($_POST);
echo "<br>";
    $id=test_input($_POST["id"]);
   // $bolnisnica=test_input($_POST["bolnisnica"]);
    $ime = test_input($_POST["ime"]);
	$priimek = test_input($_POST["priimek"]);
	$status = test_input($_POST["status"]); 

    $podminka = array("id"=>$id);
	$data = array("bolnisnica"=>$bolnisnica, "ime"=>$ime, "priimek"=>$priimek, "status"=>$status);
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

<script src="js/manipulacePregledovalci.js?<?php echo time(); ?>">
</script>

<!--zapati-->
</body>
</html>