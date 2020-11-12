<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>izberi za prikaz</title>
</head>

<body>

<h1 id="sem"></h1>

<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "premedikacija";



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // $stmt = $conn->prepare("SELECT id, ime, priimek, datRojstva, stevMaticna,  FROM novbolniktab");
 // $stmt = $conn->prepare("SELECT *  FROM novbolniktab");
	$stmt = $conn->prepare("SELECT id, ime, priimek, datRojstva, stevMaticna  FROM novbolniktab");
    $stmt->execute();
	
	/* Exercise PDOStatement::fetch styles   */

$result = $stmt->fetch(PDO::FETCH_ASSOC);
print_r($result);
print("\n"); 


   
    foreach ($stmt as $row) {
        print $row["ime"] . "-" . $row["priimek"] ."<br/>";
    }

extract($result);
echo "\$ime = $ime; \$priimek = $priimek; \$stevMaticna = $stevMaticna";


 /* 
// Loop through employee array  
foreach($stmt as $key => $element) {  
   // echo $key . ": " . $element . "<br>"; 
	echo $key . ": " . "<br>";
}  */
	

 
}	
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>
<script type="text/javascript"> 
        var ime = "<?php echo"$ime"?>"; 
		var priimek = "<?php echo"$priimek"?>"; 
		var stevMaticna = "<?php echo"$stevMaticna"?>"; 
		var datRojstva = "<?php echo"$datRojstva"?>"; 
		
        document.getElementById("sem").innerHTML = ime + "  " + priimek + "  " + datRojstva + "  " + stevMaticna;
		window.alert("ime: " + ime)
    </script> 

</body>
</html>