
<?php
require_once '../skupne/database.php';
Class Apregled {
	public $conn;
	public $zaklad;
	public $status;
	
	public function __construct() {
	  $this->conn = new Database();
	/*  $this->zaklad = new stdClass();
	  if ($_SERVER['SERVER_NAME']=="localhost"){
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/anestiz/frontend/'; 
	  }else {
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/frontend/';  
	  } */
	  

	}	
	
}//od class prihlaseni

//___________________________________- potomstvo_______________________________________________
Class PrviVpis extends Apregled {
		
	public function __construct() {
		    parent::__construct();


if (!empty($_POST)) {
// define variables and set to empty values
$najdene = $ime = $priimek = $datRojstva  = $stevMaticna = $EMSO = "";
//$imeTable = 'novBolnikTab';
$nameTable = 'bolnikTbl';

$stolpci = array("datPregleda", "imeZdravnika", "stevMaticna", "EMSO", "datRojstva", "starost", "ime", "priimek", "oddelek", "dgOperativna", "opNacrtovana", "teza", "visina", "bmi", "krvniTlak", "pulz", "hb", "ks", "inr", "aptc", "trombociti", "kreatinin", "drugiIzvidi", "ekg", "rtg", "dgPridruzene", "terPredhodna", "asa", "mallampati", "alergija", "izvidiInOpombe", "premedVecer", "premedPredOp", "navodila", "sklep"); 



//$polja = implode(',', $stolpci);

//echo $polja . " ";

// Looping through an array using for 
//echo "\nLOOPING array z uporabo for: \n"; 

foreach ($stolpci as $stolpec) {
	
if (isset($_POST[$stolpec])) {
	//echo $_POST[$stolpec];
		$data[$stolpec] = ($_POST[$stolpec]);
 } else {
	echo $stolpec . ' ne obstaja';
  }
  
	
}//od foreach
$database = new database;
//var_dump ($database);
$ulozeno = $this->conn->vloz($nameTable, $data);
			echo 'Zapis vnesen v tabelo';

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX




/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/


/*
	 
header('Location: bolnik.php');

 */
} //od if 
	} //od construct
	} //od class PrviVpis
	
	$novaVnosVrstice = new PrviVpis;
	header('Location: bolnik.php');
?>
