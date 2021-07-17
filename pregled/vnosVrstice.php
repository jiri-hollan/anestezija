
<?php

require_once '../skupne/database.php';
if ($_SERVER['REQUEST_METHOD']== 'POST') {
	if (isset($_POST['doBaze']))
switch ($_POST['doBaze']) {
  case 'vloz':
  if ($_POST['bolnikId']=="") {
	$novaVnosVrstice = new PrviVpis;
	} else {
	$novaVnosVrstice = new SpremeniVpis;
	}	
    break;
  case 'vyber':
    new PreberiVpis;
    break;
  case aktualizuj:
   // code to be executed if n=label3;
    break;

}



	else if ($_POST['bolnikId']=="") {
	$novaVnosVrstice = new PrviVpis;
	} else {
		/*echo '<script>';
		echo 'alert("bolnik Id ni nula");';
		echo '</script>';*/
		$novaVnosVrstice = new SpremeniVpis;
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
	  
      $this->stolpci = array("datPregleda", "imeZdravnika", "stevMaticna", "EMSO", "datRojstva", "starost", "ime", "priimek", "oddelek", "dgOperativna", "opNacrtovana", "teza", "visina", "bmi", "krvniTlak", "pulz", "hb", "ks", "inr", "aptc", "trombociti", "kreatinin", "drugiIzvidi", "ekg", "rtg", "dgPridruzene", "terPredhodna", "asa", "mallampati", "alergija", "izvidiInOpombe", "premedVecer", "premedPredOp", "navodila", "sklep"); 
	  
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

$database = new database;
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

	echo 'V sprmeni Vpis';
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

$database = new database;
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
			echo 'v preberi vpis';
			
			
	foreach ($this->stolpci as $stolpec) {
	
if (isset($_POST[$stolpec])) {
	//echo $_POST[$stolpec];
		$podminka[$stolpec] = ($_POST[$stolpec]);
 } else {
	//echo $stolpec . ' ne obstaja';
  }
  

}//od foreach		
			
			
		//var_dump($podminka);		
			
	$this->stolpci = array('datPregleda', 'imeZdravnika' );
	$this->podminka = $podminka;
	
/*if (!empty($_POST)) {			
    $podminka = $_POST;*/
	
	$database = new database;
//var_dump ($database);
$prebrano = $this->conn->vyber($this->nameTable, $this->stolpci, $this->podminka);
           echo '<br>';
           var_dump($prebrano);
			echo 'Zapisi najdeni';
//    } //od if 
  } //od construct
} //od class PreberiVpis

//-------------------------------------------konec PreberiVpis---------------------------		
?>
