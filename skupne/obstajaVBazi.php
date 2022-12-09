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
	$sql = "SHOW TABLES";
//Prepare our SQL statement,
 $statement = $this->conn->prepare($sql);
//Execute the statement.
   $statement->execute();
//Fetch the rows from our statement.
//$tables = $statement->fetchAll(PDO::FETCH_NUM);
   $tables = $statement->fetchAll(PDO::FETCH_BOTH);
//Loop through our table names.
foreach($tables as $table){
//Print the table name out onto the page.
//echo $table[0], '<br>';
	print_r($table);
	echo '<br>';
print("\n");
} 
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}//uzavírací zavorky function pokaziTable
//-------------------konec function pokaziTable-------
}//uzavírací zavorky class DatabaseGloboka
?>