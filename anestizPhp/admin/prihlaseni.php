<?php
session_start();
require_once('../skupne/database.php');
global $r;
	  require_once('sabloni/prihlasovaci-formular.php');
Class Prihlaseni {
	public $conn;
	public $zaklad;
	
	public function __construct() {
	  $this->conn = new Database();
	  $this->zaklad = new stdClass();
	  $this->zaklad->url = 'http://'.$_SERVER['SERVER_NAME'].'/anestiz/admin/';
	  $this->inicializuj();

	}
	
	public function inicializuj() {
	  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		  $chiba = $this->overUdaje();
	  }else if (!empty($_GET['stav'] && $_GET['stav'] == 'neaktivni')){
		  $oznameni = 'Ste odjavljeni zaradi neaktivnosti. ' . 'Ponovno se prijavite.';		  
	  }
	  require_once('sabloni/prihlasovaci-formular.php');
	//od function inicializuj
	}
	
	public function prihlaseniUspesne(){
	   $_SESSION['blog_prihlasen'] = true;
	   $_SESSION["casova_znamka"] = time();
	  // header('Location: ' . $this->zaklad->url . 'prispevki.php');
	  header('Location: ' .  'prispevki.php');
	   exit();
	}
	
	public function prihlaseniSelhalo() {
		echo 'iz funkcije prihlaseniSelhalo';
	   return 'Napačno uporabniško ime ali geslo. ';
	}
	
	private function overUdaje() {
		if (!empty($_POST['email']) && !empty($_POST['geslo'])){
			$geslo = md5($_POST['geslo']);
			$uporabnikiTbl = $this->conn->vyber('uporabnikiTbl', array('id'), array('email'=>$_POST['email'], 'geslo'=>$geslo));
		if (count($uporabnikiTbl) > 0)	{
			$this->prihlaseniUspesne();
		} else {
			echo 'iz funkcije overUdaje';
			return $this->prihlaseniSelhalo();
		}   
	  }
	}
	
	//od class prihlaseni
}
Class Registrace {
	public $conn;
	public $zaklad;
	
	public function __construct() {
	  $this->conn = new Database();
	  $this->zaklad = new stdClass();
	  $this->zaklad->url = 'http://'.$_SERVER['SERVER_NAME'].'/anestiz/admin/';
	  $this->inicializuj();

	}
	
	public function inicializuj() {
	  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		  $chiba = $this->overUdaje();
	  }else if (!empty($_GET['stav'] && $_GET['stav'] == 'neaktivni')){
		  $oznameni = 'Ste odjavljeni zaradi neaktivnosti. ' . 'Ponovno se prijavite.';		  
	  }
	  require_once('sabloni/prihlasovaci-formular.php');
	//od function inicializuj
	}
	public function prihlaseniUspesne(){
	   $_SESSION['blog_prihlasen'] = true;
	   $_SESSION["casova_znamka"] = time();
	  // header('Location: ' . $this->zaklad->url . 'prispevki.php');
	  header('Location: ' .  'prispevki.php');
	   exit();
	}
	
	public function prihlaseniSelhalo() {
		echo 'iz funkcije prihlaseniSelhalo';
	   return 'Napačno uporabniško ime ali geslo. ';
	}
	
	private function overUdaje() {
		if (!empty($_POST['email']) && !empty($_POST['geslo'])){
			$geslo = md5($_POST['geslo']);
			$uporabnikiTbl = $this->conn->vyber('uporabnikiTbl', array('id'), array('email'=>$_POST['email'], 'geslo'=>$geslo));
		if (count($uporabnikiTbl) > 0)	{
			$this->prihlaseniUspesne();
		} else {
			echo 'iz funkcije overUdaje';
			return $this->prihlaseniSelhalo();
		}   
	  }
	}
	
	//od class registrace
}
//___________________________________- potomstvo_______________________________________________

Class Singin extend Prijava {
	
	
	
// od class singin	
}
//_____________________________________konec Singin_______________________________________________

//$prihlaseni = new Prihlaseni;
if (isset($_GET['r'])) {
	 // echo 'poskus GET' . $_GET['r'];
	  $r = $_GET['r'];
switch ($r) {
  case "login":
    // echo "poskušate se logirati!"; ta vrstica povzroči napako 
      $prihlaseni = new Prihlaseni;
    echo "poskušate se logirati!"; 

   break;
 case "singin":
  $registrace = new Registrace;
    echo "Poskušate se registrirati!";
    //$prihlaseni = new Prihlaseni;
   break;  
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
}