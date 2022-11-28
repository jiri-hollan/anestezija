

<?php
require_once '../skupne/sabloni/zahlavi.php';
/*xx
function test_input($test) {
  $test = trim($test);
  $test = stripslashes($test);
  $test = htmlspecialchars($test);
  return $test;
}*/
class NarediBazo {
	
	public $servername = '';
	public $username = '';
	public $password = '';
	public $dbname = '';
	public $connn = '';
	
	public Function __construct(){
	include '../skupne/streznik.php';

try {
    $this->conn = new PDO("mysql:host=" . $this->servername , $this->username, $this->password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
    echo "Connected successfully","<br>";
    }
catch(PDOException $e)
    {
    echo "Povezava na server ni uspela: " . $e->getMessage();
    }

try {
    $sql = "CREATE DATABASE navodila";
    // use exec() because no results are returned
    $this->conn->exec($sql);
    echo "Database <navodila> je pravkar narejena<br>";
    }
catch(PDOException $e)
    {
    echo "baza ni bila narejena " . $sql . "<br>" . $e->getMessage();
    }

$conn = null;
	}//uzavírací zavorky __construct	
//-----------------konec construct--------------
}//uzavírací zavorky class NarediBazo
new NarediBazo;
?>

</body>
</html>