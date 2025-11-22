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
		  echo ' uplynulyCas: '.$uplinuliCas.'....';
		  if ($uplinuliCas > $casoviLimit) {
			  echo ' čas je potekel: '.$uplinuliCas.'!!!!'; 
			  session_unset();
			  session_destroy();
			  //header('Location: ' . $this->zaklad->url . 'prihlaseni.php?stav=neaktivni');
			  exit();
		  }else{$_SESSION["casova_znamka"] = time();}
	  }else{
	       echo" administrace linija30";
		  if (empty($_SESSION['uporabnikPrihlasen'])) {
			  session_unset();
			  session_destroy();
	/*echo'<script> 
	sessionStorage.removeItem("testJSON");	
	sessionStorage.removeItem("bolnikId"); 
	</script>';	*/    
	//header('Location: ' . $this->zaklad->url . 'prihlaseni.php?stav=odhlasit'); 
			  exit();
		  } else {
	          echo" administrace linija41";			  
			  $this->conn = new Database();
		  }
	  }
	}//od construct	
}//0d class administrace
?>	