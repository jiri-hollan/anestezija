<?php
require_once('../skupne/database.php');

class Administrace {
	public $con;
	public $zaklad;
	
	public function __construct() {
	  $this->con = new Database();
      $this->zaklad = new stdClass();
      $this->zklad->url ="http.//".$_SERVER['SERVER_NAME'].'/anestiz/admin/';
	
	}
//0d class administrace	
}