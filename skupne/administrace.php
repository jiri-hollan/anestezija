<?php
@session_start();
require_once('database.php');
class Administrace {
	public $conn;
	public $zaklad;
	public $koren;	
	public function __construct($koren) {
			  echo"administrace linija9";
	 $this->conn = new Database();
     $this->zaklad = new stdClass();	 
	  if ($_SERVER['SERVER_NAME']=="localhost"){
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/'.$koren.'/frontend/';
		// echo"('KOREN: '.$koren)<br>";
	  }else {
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/frontend/';  
	  }
//echo $this->zaklad->url;
	  $casoviLimit = 100;
	  if (isset($_SESSION["uporabnikPrihlasen"])) {
		  $uplinuliCas = time() - $_SESSION["casova_znamka"];
		  echo ' uplynulyCas: '.$uplinuliCas.'<br>';
		  if ($uplinuliCas > $casoviLimit) {
			  echo ' čas je potekel: '.$uplinuliCas.'<br>'; 
			  session_unset();
			  session_destroy();
			  //header('Location: ' . $this->zaklad->url . 'prihlaseni.php?stav=neaktivni');
			  $glava=$this->zaklad->url . 'prihlaseni.php?stav=neaktivni';
			  die("<script> location.href = '$glava'; </script>");
			  exit();
		  }
	  }
	  $_SESSION["casova_znamka"] = time();
	  echo"administrace linija34";
	  //$prihlasen = $_SESSION['uporabnikPrihlasen'];
	  if (empty($_SESSION['uporabnikPrihlasen'])) {
	  echo"administrace linija37";		  
		  session_unset();
		  session_destroy();
	echo'<script>
	sessionStorage.removeItem("testJSON");	
	sessionStorage.removeItem("bolnikId"); 
	</script>';	  
		  
		  //header('Location: ' . $this->zaklad->url . 'prihlaseni.php?stav=odhlasit');
			  $glava=$this->zaklad->url . 'prihlaseni.php?stav=odhlasit';
			  die("<script> location.href = '$glava'; </script>");		  
		  exit();
	  } else {
	  echo"administrace linija50";		  
		  $this->conn = new Database();
	  }  
	}//od construct	
}//0d class administrace
?>	