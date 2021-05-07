
<?php
session_start();
require_once('../skupne/database.php');
Class Odhlaseni {
	public $conn;
	public $zaklad;
	
	public function __construct() {
	  $this->conn = new Database();
	  $this->zaklad = new stdClass();
	  $this->zaklad->url = 'http://'.$_SERVER['SERVER_NAME'].'/anestiz/admin/';
	  $this->odhlasi();
	}
		public function odhlasi() {
		 session_unset();
			  session_destroy();
			  header('Location: ' . $this->zaklad->url . 'prihlaseni.php?stav=neaktivni');
			  exit();
		
	  require_once('sabloni/prihlasovaci-formular.php');
	//od function inicializuj
	}
	//od class odhlaseni	
}
	$odhlaseni = new Odhlaseni;
