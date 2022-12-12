<?php
class Database {
	public $servername = '';
	public $username = '';
	public $password = '';
	public $dbname = '';
	public $connn = '';
	public $bolnikObstaja= '';
	public Function __construct(){
	require 'streznik.php';
      //$this->servername = "sh17.neoserv.si";
		$this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ';charset=UTF8', $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
	}//uzavírací zavorky __construct	
//-----------------konec construct--------------


}//uzavírací zavorky class Database
?>