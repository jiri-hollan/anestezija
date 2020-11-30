<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>izberi za prikaz</title>
</head>

<body>

<h1 id="sem"></h1>

<?php


include 'prijavniWeb.php';


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // $stmt = $conn->prepare("SELECT id, ime, priimek, datRojstva, stevMaticna,  FROM bolniktab");
 // $stmt = $conn->prepare("SELECT *  FROM novbolniktab");
	$stmt = $conn->prepare("SELECT pregledId, ime, priimek, datRojstva, stevMaticna  FROM bolnikTable");
    $stmt->execute();
	
	/* Exercise PDOStatement::fetch styles   */

$result = $stmt->fetch(PDO::FETCH_ASSOC);

/*print_r($result);
print("\n"); 
print "<br>";*/

   
 foreach ($stmt as $row) {
       //print "<br>" . $row["ime"] . " " . $row["priimek"] ."<br/>";
		echo "<br>" . $row["ime"] . " " . $row["priimek"] ."<br/>";
		
    }


 /*foreach ($stmt as $row) {
        print "<br>" . $row["priimek"] ."<br/>";
    }*/


/*extract($result);
echo "\$ime = $ime \$priimek = $priimek \$stevMaticna = $stevMaticna";
echo "<br>";
echo "$ime $priimek  $stevMaticna";*/


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