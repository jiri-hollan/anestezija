<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Novi bolnik</title>
</head>

<body>
<?php

$imeTable = 'novBolnikTab';
$zaporednaId = 0;
//------------------------------------------------------------------
$bolnik = $_POST;
$vnasanjePolja="";

foreach($bolnik as $x => $x_value) {
	
	    if ($x == 'Submit') {
        break;    /* You could also write 'break 1;' here. */
		
    }
		
  
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$vnasanjePolja=$vnasanjePolja . ", " . $x . "='" . $x_value . "'";
				
}
		
}
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 
		 
		$vnasanjePolja = ltrim($vnasanjePolja,", ");	
		 echo $vnasanjePolja;
		 echo "<br>";
		 
 napolni($imeTable,$vnasanjePolja,$zaporednaId);   
} 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

include '../servis/prijavniWeb.php';	



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	
	 $sql = "UPDATE" . " " . $imeTable . " " . "SET" . " " . $vnasanjePolja . " " ."WHERE" . " " . "ID =" . $zaporednaId; 
	                                          	
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
    catch(PDOException $e)
    { 
    echo "exception" . $sql . "<br>" . $e->getMessage();
    }                                                       

$conn = null;
}               
?>

</body>
</html>