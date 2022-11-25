<?php
require_once 'sabloni/zahlavi.php';
	  // $imeTable = 'limitiTbl';
	  if (isset($_POST['imeTable'])){
		  
	   $imeTable = $_POST['imeTable'];		  
	  }
	  if (isset($_GET['imeTable'])){	  
	   $imeTable = $_GET['imeTable'];
	  }
echo "<table style='border: solid 1px black;'>";
// echo "<tr><th>Id</th><th>bolnišnica</><th>ime</th><th>priimek</th><th>status</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() { 
		return "<td style='width:250px;border:1px solid black;'>" . parent::current() . "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
include 'narediTablo.php';	
$databaseGloboka=new DatabaseGloboka;
$databaseGloboka->ogled($imeTable);

//-----------------------------------------------

echo "</table>";
require_once 'sabloni/zapati.php';
?>

