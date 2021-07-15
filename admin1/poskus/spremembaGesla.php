<?php
require_once('../../skupne/database.php');

Class Prihlaseni {
	public $conn;
	public $zaklad;
	public $status;
	
	public function __construct() {
	  $this->conn = new Database();
	  $this->zaklad = new stdClass();
	  if ($_SERVER['SERVER_NAME']=="localhost"){
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/anestiz/frontend/'; 
	  }else {
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/frontend/';  
	  }
	  

	}	
	
}//od class prihlaseni
//public function aktualizuj($tabulka,$data,$podminka)
class SpremembaG extends Prihlaseni  {
	public $tabulka;
    public $data;
    public $podminka;

 public function __construct() {
		    parent::__construct();
    $tabulka = 'uporabnikiTbl2';
    $data = array('geslo'=>"b");
    $podminka = array('id'=>3);
//require_once '../../skupne/database.php';

new Database;
$uporabnikiTbl2 = $this->conn->aktualizuj($tabulka,$data,$podminka);
//aktualizuj($tabulka,$data,$podminka);
 }
}
new SpremembaG;
?>