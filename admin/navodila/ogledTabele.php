<?php
require_once 'sabloni/vkladane/zahlavi.php';
	  // $imeTable = 'limitiTbl';
	   $imeTable = $_GET['imeTable'];
	   
echo "<table style='border: solid 1px black;'>";
// echo "<tr><th>Id</th><th>bolnišnica</><th>ime</th><th>priimek</th><th>status</th></tr>";

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
	//----------------------------------------------------------------------------------

	   $sql = "select column_name from information_schema.columns where table_name =  '$imeTable'";

//Prepare our SQL statement,
   $stmtl = $conn->prepare($sql);
  // echo "To so stolpci tabele: " . "$imeTable", "<br>";
 echo "<br><table style='border: solid 1px black;'>";
 //echo "<tr><th>Id</th><th>bolnišnica</><th>ime</th><th>priimek</th><th>status</th></tr>";	
 echo "<tr>";
//Execute the statement.
   $stmtl->execute();

//Fetch the rows from our statement.
//$tables = $statement->fetchAll(PDO::FETCH_NUM);
  $tables = $stmtl->fetchAll(PDO::FETCH_NUM);
 
//Loop through our table names.
   foreach($tables as $table){
   //Print the table name out onto the page.
   //echo "stolpci:";
   //echo $table[0], '<br>';
   
  echo '<th>'.$table[0].'</th>';
	} //od foreach
	
	//------------------------------------------------------------------------------
    $stmt = $conn->prepare("SELECT * FROM " . $imeTable );
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

