
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
	echo $_POST[$stolpec];
		$data[$stolpec] = ($_POST[$stolpec]);
 } else {
	echo $stolpec . ' ne obstaja';
  }
  
	
}//od foreach
$database = new database;
var_dump ($database);
$ulozeno = $this->conn->vloz($nameTable, $data);
			echo 'uspešno ste se registrirali,<br> pravice do dostopa vam bodo dodeljene po posvetu <br>z obveščevalnimi agencijami.';

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
/*
$keys = ($stolpci); 
$round = count($stolpci);  
for($i=0; $i < $round; ++$i) { 

//echo $keys[$i] . ' ' . $_POST[$keys[$i]] . "\n"; 
$najdene = $najdene . '"' .  $_POST[$keys[$i]] . '"' .  ",";

//$najdene = $najdene . array('"' .  $_POST[$keys[$i]] . '"' .  '","');
//echo $najdene ;

} 


$vrednosti = rtrim($najdene,",");
//echo $najdene ;

//$vrednosti = '"' . implode('","', $_POST) . '"';

//$name_two["zack"]


*/



/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/


/*function vstavi($imeTable,$data)  {
include '../skupne/database.php';	

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDO::ERRMODE_EXCEPTION ERRMODE_SILENT
    $sql = "INSERT INTO " . $imeTable . " ($polja) VALUES ($c)";
    // (ime, priimek, datRojstva, stevMaticna, EMSO)
	//echo $_SERVER["REQUEST_METHOD"];

    // use exec() because no results are returned
    $conn->exec($sql);
   echo "Vložena nova vrstica v podatkovno bazo";
	//echo "<script>naprejFunction</script>";


header('Location: bolnik.php');
 exit;
    }
    catch(PDOException $e)
    { 
    echo "exception" . $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}

vstavi($imeTable, $vrednosti, $polja); */
} //od if 
	} //od construct
	} //od class PrviVpis
	
	$novaVnosVrstice = new PrviVpis;
?>
