<?php

require_once('../skupne/database.php');

Class Prihlaseni {
	public $conn;
	public $zaklad;
	
	public function __construct() {
	  $this->conn = new Database();
	  $this->zaklad = new stdClass();
	  $this->zaklad->url = 'http://'.$_SERVER['SERVER_NAME'].'anestiz/admin/';
	  $this->inicializuj();
	}
	
	public function inicializuj() {
	  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		  $chiba = $this->overUdaje();
	  }/*else if (!empty($_GET['stav'] && $_GET['stav'] == 'neaktivni')){
		  $oznameni = 'Ste odjavljeni zaradi neaktivnosti. ' + 'Ponovno se prijavite.';		  
	  }*/
	  require_once('sabloni/prihlasovaci-formular.php');
	//od function inicializuj
	}
	
	public function prihlaseniUspesne(){
	   $_SESSION['blog_prihasen'] = true;
	   $_SESSION["casova_znamka"] = time();
	   haeder('Location: ' . $this->zaklad->url . 'prispevki.php');
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
			return $this->prihlaseniSelhalo();
		}   
	  }
	}
	
	//od class prihlaseni
}

$prihlaseni = new Prihlaseni;