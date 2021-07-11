
<?php
require_once '../skupne/database.php';
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



/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/

} //od if 
	} //od construct
	} //od class PrviVpis
	
	$novaVnosVrstice = new PrviVpis;
	//header('Location: bolnik.php');
	
//-------------------------------------------konec PrviVpis---------------------------

Class SpremeniVpis extends Apregled {
		
	public function __construct() {
		    parent::__construct();

	
} //od construct
	} //od class SpremeniVpis
	
//-------------------------------------------konec SpremeniVpis---------------------------	
Class PreberiVpis extends Apregled {
		
	public function __construct() {
		    parent::__construct();
			
if (!empty($_POST)) {			
    $podminka = $_POST;
	
	$database = new database;
//var_dump ($database);
$prebrano = $this->conn->vyberOr($nameTable, $stolpci, $podminka);
			echo 'Zapis vnesen v tabelo';
    } //od if 
  } //od construct
} //od class PreberiVpis

//-------------------------------------------konec PreberiVpis---------------------------		
?>
