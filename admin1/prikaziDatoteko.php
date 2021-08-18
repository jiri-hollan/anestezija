<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>

<body onload="stolpciFuncton()">
<script>
function stolpciFuncton() {
const poljeJS = ["*"];
const poljeJSON = JSON.stringify(poljeJS);
document.getElementById("stolpci").value = poljeJSON;
}
</script>
<p>vnesi ime tabele and click OK:</p>



<h2>Prikaz tabele uporabnikiTbl2</h2>
<form method="post" action="vnosAdmin.php"> 
<input id="stolpci" type="hidden" name="stolpci" value="*" readonly>
<input type="hidden" name="doBaze" value="prikazi">
<input id="id"  type="hidden" name="id"  ></input>
  Tabela: <input type="text" name="nameTable" value="uporabnikiTbl2">
  <br><br>
 
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
/*echo "<h2>Your Input:</h2>";
echo "ime table=   " . $name;

function prikazi($ime) {
echo "<table style='border: solid 1px black;'>";


class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
include '../skupne/streznik.php';
$ime ;
try {
	$conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ';charset=UTF8', $username, $password);
   // $conn = new PDO("mysql:host=$servername;dbname=$dbname";charset=UTF8, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM" . " " . $ime );
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
}*/
?>

</body>
</html>