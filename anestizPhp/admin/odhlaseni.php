
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
	  echo 'odhlašovani';
	  if (null !== ($_GET['stav'] || $_GET['stav'] == 'odhlasen')) {
	  $this->odhlasi();
     }	
	
	}
	 public function odhlasi() {
			echo 'Odhlasi';
		 session_unset();
		 session_destroy();

			  //exit();
         //echo 'STAV' . $_GET['stav'];
     // if (!empty($_GET['stav'] && $_GET['stav'] == 'odhlasen')){
		  $oznameni = 'Ste odjavljeni, ' . 'ponovno se prijavite.';	
		header('Location: ' . $this->zaklad->url . 'prihlaseni.php?stav=odhlasen');  
	  //}
	  require_once('sabloni/prihlasovaci-formular.php');
	//od function odhlasi
	}

	//od class odhlaseni	

}
	$odhlaseni = new Odhlaseni;
