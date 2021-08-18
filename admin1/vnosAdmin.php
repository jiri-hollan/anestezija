
<?php
require_once '../skupne/database.php';
if ($_SERVER['REQUEST_METHOD']== 'POST') {
	
		if (isset($_POST['nameTable'])){
		$nameTable  = $_POST['nameTable'];
	} else {
		$nameTable  = "";
	}
	

/*		if (isset($_POST['pogoj'])){
		$pogoj  = $_POST['pogoj'];
	} else {
		$pogoj  = "";
	}
*/
	if (isset($_POST['stolpci'])){
	 	$stolpci = 	json_decode($_POST['stolpci']);
		//var_dump($stolpci);
		//echo $stolpci;
	} else {
		$stolpci  = "";
	}


//............................................................	
	if (isset($_POST['doBaze'])){
		$doBaze  = $_POST['doBaze'];
	} else {
		$doBaze  = "";
	}
	//var_dump($doBaze);
switch ($doBaze) {
  case 'vloz':
 /* if ($_POST['bolnikId']=="") {
	$novaVnosVrstice = new PrviVpis;
	} else {
	$novaVnosVrstice = new SpremeniVpis;
	}*/	
    break;
  case 'vyber':
   /* $najdi = new PreberiVpis;
	//var_dump ($najdi ->prebranoFunction());
	//$najdeno = $najdi->prebranoFunction();
	$prebrano = $najdi->prebranoFunction();
	require_once '../skupne/prikazPolja.php';
    require_once 'bolnikBaze/zapisPoId.php';
	*/
    break;
  case 'prikazi':

    $prikazi = new PreberiVpis($nameTable, $stolpci);
	$prebrano = $prikazi-> prebranoFunction();
   // prikaže preiskavo pod id v formi;
	require_once 'prikazPoljaAdmin.php';
   // require_once 'bolnikBaze/zapisPoId.php';
   
   
    break;
  case 'aktualizuj':
   // code to be executed if $doBaze==aktualizuj;
    break;
  case '':
   /* if ($_POST['bolnikId']=="") {
	$novaVnosVrstice = new PrviVpis;
	} else {
	$novaVnosVrstice = new SpremeniVpis;
	}	*/
    break;
  default:	
	echo 'doBaze ni v definiranih vrednosteh';
}
}//od if $_SERVER

Class Administrace {
	public $conn;
	public $zaklad;
	public $status;
	

	public function __construct($nameTable) {
	  $this->conn = new Database();
	  $this->zaklad = new stdClass();

	  if ($_SERVER['SERVER_NAME']=="localhost"){
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/anestiz/frontend/'; 
	  }else {
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/frontend/';  
	  } 
	  	  	 // var_dump($nameTable);
	 $this->nameTable = $nameTable;	  
    // $this->stolpci = $_POST['stolpci']; 
	 //$this->stolpci = 	json_decode($_POST['stolpci']);
	}// od 	function __construct
	
}//od class Administrace

//___________________________________- potomstvo_______________________________________________


Class SpremeniVpis extends Administrace {
		
	public function __construct() {
		    parent::__construct();
/*
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

	}//od if*/
} //od construct
	} //od class SpremeniVpis
	
//-------------------------------------------konec SpremeniVpis---------------------------	

Class PreberiVpis extends Administrace {

	public function __construct($nameTable, $stolpci) {
		    parent::__construct($nameTable);
			//echo 'v preberi vpis';
	//var_dump($nameTable);
	$vidno = array('*');
	$podminka = "";
	$this->stolpci=$stolpci;
	//var_dump($this->stolpci);	
	$this->vidno=$vidno;
	//var_dump($this->vidno);
	
	
 if (!empty($_POST)&& $this->stolpci!="") {	
 //if (!empty($_POST) && $stolpci!="*") {	
//var_dump($this->stolpci);
//echo '<script> alert("$_POST   ni prazen"); </script> ';	
	foreach ($this->stolpci as $stolpec) {	
	var_dump($stolpec);
	//var_dump($_POST[$stolpec]);
       if (isset($_POST[$stolpec])) {
	     echo $_POST[$stolpec];
		  $podminka[$stolpec] = ($_POST[$stolpec]);
		 var_dump($podminka[$stolpec]);
       } else {
	  //echo $_POST[$stolpec] . " ne obstaja" ;
     }
   }//od foreach
	//var_dump($this->stolpci);
   	$this->podminka = $podminka;
 }//od if !empty
	else  {
	
	$this->podminka = "";	
	//echo ' alert("$_POST ali $this_stolpci  je prazen");  ';			
   } 

} //od construct
  
 function prebranoFunction() {
//var_dump($podminka);	
//var_dump($_POST['stolpci']);
//var_dump($this->stolpci);
   $prebrano = $this->conn->vyber($this->nameTable, $this->vidno, $this->podminka);
           echo '<br>';
          //var_dump($prebrano);		  
			echo '<br>Število najdenih zapisov vnos: '.count($prebrano);			
Return	$prebrano;		
} 
  
} //od class PreberiVpis

//-------------------------------------------konec PreberiVpis---------------------------		
?>
