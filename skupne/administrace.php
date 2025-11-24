<?php
@session_start();
require_once('database.php');
class Administrace {
	public $conn;
	public $zaklad;
	public $koren;	
	public function __construct($koren) {
	 $this->conn = new Database();
     $this->zaklad = new stdClass();	 
	  if ($_SERVER['SERVER_NAME']=="localhost"){
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/'.$koren.'/frontend/';
		// echo"('KOREN: '.$koren)<br>";
	  }else {
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/frontend/';  
	  }
//echo $this->zaklad->url;
	  $casoviLimit = 20;
	  if (isset($_SESSION["uporabnikPrihlasen"])) {
		  $uplinuliCas = time() - $_SESSION["casova_znamka"];
		  if($uplinuliCas <= $casoviLimit){
		      echo ' uplynulyCas: '.$uplinuliCas.'....';
              $_SESSION["casova_znamka"] = time();			  
//echo $uplinuliCas;
		  }
		  elseif ($uplinuliCas > $casoviLimit) {
			  //echo ' čas je potekel: '.$uplinuliCas.' je več kot '.$casoviLimit; 
			  session_unset();
			  session_destroy();
			  echo $uplinuliCas; 
			  exit();
		  }else{$_SESSION["casova_znamka"] = time();}
	  }else{
	       echo" administrace linija30 ";		  
			  session_unset();
			  session_destroy();
			  var_dump ($_SESSION);
			  exit();		   
	  }
	}//od construct	
}//0d class administrace
?>	