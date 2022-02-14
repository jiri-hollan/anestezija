<?php
require_once 'sabloni/vkladane/zahlavi.php';
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Id</th><th>bolnišnica</><th>ime</th><th>priimek</th><th>status</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {

        // return "<td style='width: 150px;border:1px solid black;' >" . parent::current(). "</td>";
		// return "<input style='width: 150px;border:1px solid black;' value=" . parent::current() . "></input>";	 
		 return "<td  >" . "<input style='width: 150px;border:1px solid black;' value=" . parent::current() . "></input>". "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
include '../../skupne/streznik.php';
try {
	$conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ';charset=UTF8', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM" . " pregledovalciTbl" );
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
require_once 'sabloni/vkladane/zapati.php';
?>

