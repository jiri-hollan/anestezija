
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<?php

/*$servername = "sh17.neoserv.si";
$username = "anestiz";
$password = "laringoskop";*/
include 'prijavniWeb.php';

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Uspešno pripojen na server";
    }
catch(PDOException $e)
    {
    echo "priključitev na server ni uspela: " . $e->getMessage();
    }
	

?>


</body>
</html>