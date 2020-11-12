<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Novi bolnik</title>
</head>

<body>
<?php
// define variables and set to empty values
$ime = $priimek = $datRojstva  = $stevMaticna = $EMSO = "";
//$imeTable = 'novBolnikTab';
$imeTable = 'bolnikTable';

/*$polja = implode(',', array_keys($_POST));
echo $polja . "1 "; */

//$stolpci = array("id", "datPregleda", "imeZdravnika", "stevMaticna", "EMSO", "datRojstva", "starost", "ime", "priimek", "oddelek", "dgOperativna", "opNacrtovana", "teza", "visina", "bmi", "krvniTlak", "pulz", "Hb", "Ks", "INR", "aPTC", "trombociti", "kreatinin", "drugiIzvidi", "EKG", "RTG", "dgPridruzene", "terPredhodna", "ASA", "Mallapati", "alergija", "izvidiInOpombe", "premedVecer", "premedPredOp, navodila", "status", "sklepNo", "sklep"); 

$stolpci = array("datPregleda", "imeZdravnika", "stevMaticna", "EMSO","datRojstva", "starost", "ime", "priimek", "oddelek", "dgOperativna", "opNacrtovana", "teza", "visina", "bmi", "krvniTlak", "pulz", "hb", "ks", "inr", "aptc", "trombociti", "kreatinin", "drugiIzvidi", "ekg", "rtg", "dgPridruzene", "terPredhodna", "asa", "mallampati", "alergija", "izvidiInOpombe", "premedVecer", "premedPredOp", "navodila", "sklep"); 



$polja = implode(',', $stolpci);

//echo $polja . " ";

// Looping through an array using for 
echo "\nLooping using for: \n"; 


$keys = ($stolpci); 
$round = count($stolpci);  
for($i=0; $i < $round; ++$i) { 

echo $keys[$i] . ' ' . $_POST[$keys[$i]] . "\n"; 
$najdene = $najdene . '"' .  $_POST[$keys[$i]] . '"' .  ",";

//$najdene = $najdene . array('"' .  $_POST[$keys[$i]] . '"' .  '","');
//echo $najdene ;

} 


$vrednosti = rtrim($najdene,",");

//$vrednosti = '"' . implode('","', $_POST) . '"';

//$name_two["zack"]


vstavi($imeTable, $vrednosti, $polja);



/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/


function vstavi($imeTable,$c,$polja)  {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "premedikacija";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO " . $imeTable . " ($polja) VALUES ($c)";
    // (ime, priimek, datRojstva, stevMaticna, EMSO)
	//echo $_SERVER["REQUEST_METHOD"];

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