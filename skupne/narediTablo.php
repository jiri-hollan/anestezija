<?php

class DatabaseGloboka {
	
	public $servername = '';
	public $username = '';
	public $password = '';
	public $dbname = '';
	public $connn = '';
	
	public Function __construct(){
	include 'streznik.php';
      //$this->servername = "sh17.neoserv.si"; 
		$this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ';charset=UTF8', $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
	
	}//uzavírací zavorky __construct	
//-----------------konec construct--------------

public function naredi($tabulka, $definice) {
$tabulka ;
//$dbname="navodila";
try {
    // sql to create table
    $sql = "CREATE TABLE". " " . $tabulka . " " . " ($definice)";

    // use exec() because no results are returned
    $this->conn->exec($sql);
    echo "Tabela" . " " . $tabulka . " uspešno narejena";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;

}//uzavírací zavorky  naredi
//-------------------konec function naredi-------

public function narediSql($kodaSql) {
try {
    
    $sql = $kodaSql;
	echo "<br>";
	echo $sql . "<br>" ;
	
    // use exec() because no results are returned
    $this->conn->exec($sql);
    echo "Stavek SQL izvrsen";
    }
catch(PDOException $e)
    { 
	echo "napaka";
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

}//uzavírací zavorky function narediSql
//-------------------konec function narediSql-------
}//uzavírací zavorky class DatabaseGloboka

?>