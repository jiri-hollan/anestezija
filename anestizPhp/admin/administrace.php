<?php
session_start();
require_once('../skupne/database.php');
require_once('sabloni/vkladane/zahlavi.php');
class Administrace {
	public $conn;
	public $zaklad;
	
	public function __construct() {
	  $this->conn = new Database();
      $this->zaklad = new stdClass();
      $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/anestiz/admin/';
	  //echo $this->zaklad->url;
	  $casoviLimit = 600;
	  if (isset($_SESSION["blog_prihlasen"])) {
		  $uplinuliCas = time() - $_SESSION["casova_znamka"];
		  if ($uplinuliCas > $casoviLimit) {
			  session_unset();
			  session_destroy();
			  header('Location: ' . $this->zaklad->url . 'prihlaseni.php?stav=neaktivni');
			  exit();
		  }
	  }
	  $_SESSION["casova_znamka"] = time();
	  $prihlasen = $_SESSION['blog_prihlasen'];
	  if (empty($prihlasen)) {
		  session_unset();
		  session_destroy();
		  header('Location: ' . $this->zaklad->url . 'prihlaseni.php?stav=odhlasen');
		   
	// header('Location: localhost/anestiz/admin/prihlaseni.php?stav=odhlasen');
		   
		   exit();
	  } else {
		  $this->conn = new Database();
	  }
//od construct	  
	}
//0d class administrace	
}