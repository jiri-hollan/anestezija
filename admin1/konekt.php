
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<?php

class Konekt {
	
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
    echo "Uspešno pripojen na server";
    }
catch(PDOException $e)
    {
    echo "Povezava na server ni uspela: " . $e->getMessage();
    }
}//uzavírací zavorky __construct	
//-----------------konec construct--------------
}//uzavírací zavorky class Konekt
new Konekt;
?>
</body>
</html>