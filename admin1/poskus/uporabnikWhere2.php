<?php
require_once '../../skupne/database.php';
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}//od class TableRows
//-------------------------------------------------------------------------------------------------------------

class UporabnikiWhere {
	public $conn;
	  function __construct() {
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Id</th><th>email</th><th>username</th><th>ime</th><th>priimek</th><th>status</th></tr>";

try {
	
	$this->conn =new Database();
	
	$uporabnikiIzbrani = $this->conn->vyber('uporabnikiTbl2', array('id', 'email', 'uname', 'ime', 'priimek', 'status'), array('uname'=>'lanhol'));
	//var_dump($uporabnikiIzbrani);
	//--------------------------------------------------------
   
	//var_dump($stmt->fetchAll());
    foreach(new TableRows(new RecursiveArrayIterator($uporabnikiIzbrani)) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
	  }//od __construct
}//od class UporabnikiWhere
new UporabnikiWhere()
?>

