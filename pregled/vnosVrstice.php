
<?php
require_once '../skupne/database.php';
if ($_SERVER['REQUEST_METHOD']== 'POST') {
	if (isset($_POST['doBaze'])){
		$doBaze  = $_POST['doBaze'];
	} else {
		$doBaze  = "";
	}
	//var_dump($doBaze);
switch ($doBaze) {
  case 'vloz':
  if ($_POST['bolnikId']=="") {
	$novaVnosVrstice = new PrviVpis;
	} else {
	$novaVnosVrstice = new SpremeniVpis;
	}	
    break;
  case 'vyber':
    $najdi = new PreberiVpis;
	//var_dump ($najdi ->prebranoFunction());
	//$najdeno = $najdi->prebranoFunction();
	$prebrano = $najdi->prebranoFunction();
	require_once '../skupne/prikazPolja.php';
    require_once 'bolnikBaze/zapisPoId.php';
	
    break;
  case 'prikazi':
    $prikazi = new PreberiVpis;
   // prikaže preiskavo pod id v formi;
    break;
  case 'aktualizuj':
   // code to be executed if n=label3;
    break;
  case '':
    if ($_POST['bolnikId']=="") {
	$novaVnosVrstice = new PrviVpis;
	} else {
	$novaVnosVrstice = new SpremeniVpis;
	}	
    break;
  default:	
	echo 'doBaze ni v definiranih vrednosteh';
}
}//od if $_SERVER

Class Apregled {
	public $conn;
	public $zaklad;
	public $status;
	
	
	public function __construct() {
	  $this->conn = new Database();
	  $this->zaklad = new stdClass();
	  if ($_SERVER['SERVER_NAME']=="localhost"){
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/anestiz/frontend/'; 
	  }else {
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/frontend/';  
	  } 
	  $this->nameTable = 'bolnikTbl';
	  
      $this->stolpci = array("datPregleda", "imeZdravnika", "stevMaticna", "EMSO", "dan", "mesec", "leto", "datRojstva", "starost", "ime", "priimek", "oddelek", "dgOperativna", "opNacrtovana", "teza", "visina", "bmi", "krvniTlak", "pulz", "hb", "ks", "inr", "aptc", "trombociti", "kreatinin", "laktat", "pbnp", "pct", "crp", "na", "k", "drugiIzvidi", "ekg", "rtg", "dgPridruzene", "terPredhodna", "asa", "mallampati", "alergija", "izvidiInOpombe", "premedVecer", "premedPredOp", "navodila", "sklep"); 
	  
	}	
	
}//od class prihlaseni

//___________________________________- potomstvo_______________________________________________
Class PrviVpis extends Apregled {
		
	public function __construct() {
		    parent::__construct();


if (!empty($_POST)) {
// define variables and set to empty values
$najdene = $ime = $priimek = $datRojstva  = $stevMaticna = $EMSO = "";


// Looping through an array using for 
//echo "\nLOOPING array z uporabo for: \n"; 

foreach ($this->stolpci as $stolpec) {
	
if (isset($_POST[$stolpec])) {
	//echo $_POST[$stolpec];
		$data[$stolpec] = ($_POST[$stolpec]);
 } else {
	echo $stolpec . ' ne obstaja';
  }
  
	
}//od foreach

//$database = new database;
//var_dump ($database);
$ulozeno = $this->conn->vloz($this->nameTable, $data);
			echo 'Zapis vnesen v tabelo';
			//var_dump ($ulozeno);			
            //echo '<br>počet vloženych: '.$ulozeno["pocetVlozenych"];
			echo '<br>last id: '.$ulozeno["lastId"];
			
		 $bolnikId = $ulozeno["lastId"];

    echo '<script>';
    echo 'sessionStorage.setItem("bolnikId",'. $bolnikId .');';		
    //echo 'alert("vnos vrstice: "+sessionStorage.getItem("bolnikId"));';
	echo 'window.location.href = "bolnik\.php";';
    echo '</script>';	
	return;		
	//header('Location: bolnik.php');		
/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/

} //od if 

	} //od construct
	} //od class PrviVpis
	
	
//-------------------------------------------konec PrviVpis---------------------------

Class SpremeniVpis extends Apregled {
		
	public function __construct() {
		    parent::__construct();

	//echo 'V spremeni Vpis';
	if (!empty($_POST)) {
// define variables and set to empty values
$najdene = $ime = $priimek = $datRojstva  = $stevMaticna = $EMSO = "";


// Looping through an array using for 
//echo "\nLOOPING array z uporabo for: \n"; 

foreach ($this->stolpci as $stolpec) {
	
if (isset($_POST[$stolpec])) {
	//echo $_POST[$stolpec];
		$data[$stolpec] = ($_POST[$stolpec]);
 } else {
	echo $stolpec . ' ne obstaja';
  }	
}//od foreach
	
if (isset($_POST['bolnikId'])) {
	//echo $_POST['bolnikId'];
		$podminka['pregledId'] = ($_POST['bolnikId']);
 } else {
	echo 'bolnik Id ne obstaja';
	    echo '<script>';
	
    //echo 'alert("bolnik Id ne obstaja");';
	echo 'window.location.href = "bolnik\.php";';
    echo '</script>';	
	
  }	

//$database = new database;
//var_dump ($database);
$ulozeno = $this->conn->aktualizuj($this->nameTable, $data, $podminka );
			echo 'Zapis aktualizovan in shranjen v tabelo';
			//var_dump ($ulozeno);			
            //echo '<br>počet vloženych: '.$ulozeno["pocetVlozenych"];
			header('Location: bolnik.php');

	}//od if
} //od construct
	} //od class SpremeniVpis
	
//-------------------------------------------konec SpremeniVpis---------------------------	

Class PreberiVpis extends Apregled {

	public function __construct() {
		    parent::__construct();
			//echo 'v preberi vpis';
			
 if (!empty($_POST)) {	
//var_dump($_POST);
//echo '<script> alert("$_POST   ni prazen"); </script> ';	
	foreach ($this->stolpci as $stolpec) {	
       if (isset($_POST[$stolpec])) {
	     //echo $_POST[$stolpec];
		  $podminka[$stolpec] = ($_POST[$stolpec]);
       } else {
	  //echo $_POST[$stolpec] . " ne obstaja" ;
     }
   }//od foreach		
 }//od if !empty
	else  {
	echo ' alert("$_POST   je prazen");  ';			
   } 
	$this->podminka = $podminka;	
} //od construct
  
 function prebranoFunction() {
//var_dump($podminka);	
//var_dump($_POST['data']);
	$this->stolpci = 	json_decode($_POST['data']);	
	//var_dump($this->stolpci);
	//$database = new database;
   //var_dump ($database);
   $prebrano = $this->conn->vyber($this->nameTable, $this->stolpci, $this->podminka);
           echo '<br>';
          //var_dump($prebrano);		  
			echo '<br>Število najdenih zapisov vnos: '.count($prebrano);			
Return	$prebrano;		
} 
  
} //od class PreberiVpis

//-------------------------------------------konec PreberiVpis---------------------------	-------------------------------------------konec PreberiVpis---------------------------		
?>
