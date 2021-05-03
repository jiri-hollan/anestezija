<?php

require_once('../skupne/database.php');

Class Prihlaseni {
	public $con;
	public $zaklad;
	
	public function__construct() {
	  $this->con = nev Database();
	  $this->zaklad = new stdClass();
	  $this->zaklad->url = 'http://'.$_SERVER['SERVER_NAME'].'anestiz/admin/';
	  $this->inicializuj();
	}
	
	public function inicializuj() {
	  if ($_SERVER['REQUEST_METOD'] == 'POST') {
		  $chiba = $this->overUdaje();
	  }else if (!empty($_GET['stav'] && $_GET[stav] == 'neaktivni')){
		  $oznameni = 'Ste odjavljeni zaradi neaktivnosti. ' + 'Ponovno se prijavite.';		  
	  }
	  require_once(sabloni/prihlasovaci-formular.php);
	//od function inicializuj
	}
	
	public function prihlaseniUspesne(){
	   haeder('Location: ' . $this->zaklad->url . 'prispevki.php');
	}
	
	public function_prihlaseniSelhalo() {
	   return 'Napačno uporabniško ime ali geslo. ';
	}
	
	private function ovrUdaje() {
		if (!empty($_POST['jmeno']) && !empty($_POST'geslo')){
			$geslo = md5($_POST['geslo']);
			$uzivatele = $this->con->vyber('uzivatele', array('id'),
			   array('jmeno'=>$_POST['jmeno'], 'geslo'=>$geslo));
		if (count($uzivatele) > 0)	{
			$this->prihlaseniUspesne();
		} else {
			retur $this->prihlaseniSelhalo();
		}   
	  }
	}
	
	//od class prihlaseni
}

$prihlaseni = new Prihlaseni;