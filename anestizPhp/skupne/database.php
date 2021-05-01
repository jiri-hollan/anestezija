<?php

class Database {
	
	public $servername = '';
	public $username = '';
	public $password = '';
	public $dbname = '';
	public $con = '';
	
	public Function __construct(){
	
      $this->servername = "sh17.neoserv.si";
      $this->username = "anestiz";
      $this->password = "laringoskop";
      $this->dbname = "anestiz_navodila";

          if ( $_SERVER['SERVER_NAME']=="localhost") {
			  $this->servername = "localhost";
              $this->username = "root";
              $this->password = "";
              $this->dbname = "navodila";
            }
		$this->con = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname . $this->username . $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
//uzavírací zavorky __construct		
	}
	
	public function vyber($tabulka, $sloupce, $podminka = NULL){
	}
	
	public function  vloz($tabulka,$data){		
	}		
	
	public function aktualizuj($tabulka,data, $podminka){
	}		
	
	public function odsrani($tabulka,$podminka){		
	}		

//uzavírací zavorky class Database	
}