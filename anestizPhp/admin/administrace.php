<?php
require_once('../skupne/database.php');

class Administrace {
	public $conn;
	public $zaklad;
	
	public function __construct() {
	  $this->conn = new Database();
      $this->zaklad = new stdClass();
      $this->zaklad->url ="http.//".$_SERVER['SERVER_NAME'].'/anestiz/admin/';
	
	}
//0d class administrace	
}