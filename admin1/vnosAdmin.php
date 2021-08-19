
<?php
require_once '../skupne/database.php';
$stolpci = array("id", "email", "uname", "geslo", "ime", "priimek", "status", "pristop");	
$nameTable = "uporabnikiTbl2";
if ($_SERVER['REQUEST_METHOD']== 'POST') {
	
/*		if (isset($_POST['nameTable'])){
		$nameTable  = $_POST['nameTable'];
	} else {
		$nameTable  = "";
	}*/
	

/*		if (isset($_POST['pogoj'])){
		$pogoj  = $_POST['pogoj'];
	} else {
		$pogoj  = "";
	}
*/
/*	if (isset($_POST['stolpci'])){
	 	$stolpci = 	json_decode($_POST['stolpci']);
		//var_dump($stolpci);
		//echo $stolpci;
	} else {
		$stolpci  = "";
	}*/


//............................................................	
	if (isset($_POST['doBaze'])){
		$doBaze  = $_POST['doBaze'];
	} else {
		$doBaze  = "";
	}
//$stolpci = array("id", "email", "uname", "geslo", "ime", "priimek", "status", "pristop");	
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
	

	public function __construct($nameTable, $stolpci) {
	  $this->conn = new Database();
	  $this->zaklad = new stdClass();

	  if ($_SERVER['SERVER_NAME']=="localhost"){
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/anestiz/frontend/'; 
	  }else {
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/frontend/';  
	  } 
	  	  	 // var_dump($nameTable);
	 $this->nameTable = $nameTable;	  
    // $this->stolpci = array("id", "email", "uname", "geslo", "ime", "priimek", "status", "pristop"); 
	$this->stolpci = $stolpci;
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
		    parent::__construct($nameTable, $stolpci);
			//echo 'v preberi vpis';
			
 if (!empty($_POST)) {		
//var_dump($this->stolpci);
//echo '<script> alert("$_POST   ni prazen"); </script> ';	
	foreach ($this->stolpci as $stolpec) {
	//echo('<br>$stolpec=   ');	
	//var_dump($stolpec);
	//var_dump($_POST[$stolpec]);
       if (isset($_POST[$stolpec])&& $_POST[$stolpec]!="") {
		  $podminka[$stolpec] = ($_POST[$stolpec]);
		// var_dump($_POST[$stolpec]);
		//  echo ('<br>');
		 // echo ('$podminka[$stolpec]= ');
		 // var_dump($podminka[$stolpec]);
       } else {
	 // echo $stolpec . " ne obstaja" ;

     }//od if isset
   }//od foreach
 }//od if !empty
	else  {
	echo ' alert("$_POST   je prazen");  ';	
	$this->podminka = "";	
	//echo ' alert("$_POST ali $this_stolpci  je prazen");  ';			
   } 
   if (isset($podminka)){
	$this->podminka = $podminka;
	 // echo ('<br> $podminka= ');  
     //var_dump($podminka);
   }else {$this->podminka ="";}
   
} //od construct
  
 function prebranoFunction() {
//var_dump($podminka);	
//var_dump($_POST['stolpci']);
//var_dump($this->stolpci);
     $prebrano = $this->conn->vyber($this->nameTable, $this->stolpci, $this->podminka); 
           echo '<br>';
          //var_dump($prebrano);		  
			echo '<br>Število najdenih zapisov: '.count($prebrano);			
Return	$prebrano;		
 }//od prebranoFunction   
} //od class PreberiVpis

//-------------------------------------------konec PreberiVpis---------------------------		
?>
