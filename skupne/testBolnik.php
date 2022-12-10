<?php
class DatabaseGloboka {
	public $servername = '';
	public $username = '';
	public $password = '';
	public $dbname = '';
	public $connn = '';
	public Function __construct(){
	require_once 'streznik.php';
      //$this->servername = "sh17.neoserv.si"; 
		$this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ';charset=UTF8', $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
	}//uzavírací zavorky __construct	
//-----------------konec construct--------------
public function pokaziTable() {
try {
   //$sql = "SHOW TABLES";	
   $sql = "SHOW TABLES like 'bolnikTbl'";
   $statement = $this->conn->prepare($sql);
   $statement->execute();
   $tables = $statement->fetchAll(PDO::FETCH_BOTH);
  // var_dump($tables);
  $obstaja=count($tables);
   echo $obstaja;
   echo '<br>';
   switch($obstaja){
	   case 1:
	     echo "iskana tabela obstaja.<br>";
	   break;
	   case 0:
	     echo'iskane tabele ni';
	   break;
	   default:
	   echo'pri iskanju tabele prišlo do napake';
   }
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}//uzavírací zavorky function pokaziTable
//-------------------konec function pokaziTable-------
}//uzavírací zavorky class DatabaseGloboka
$databaseGloboka=new DatabaseGloboka;
$databaseGloboka->pokaziTable();
?>