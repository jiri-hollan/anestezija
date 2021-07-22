<?php
//------na temelju pregledId pobere podatke iz zapisa s tem id
require_once '../skupne/database.php';
Class PoberZapis{
	public $conn;
	public $zaklad;
	public $status;
	
	
	public function __construct($id) {
 $this->id = $id;
 $this->conn = new Database();	
 $this->nameTable = 'bolnikTbl';
   $stolpci = array('*');
//pregledId je obsoječi Id v tabeli bolnikTbl
   $podminka = array("pregledId"=>$this->id);
   $prebrano = $this->conn->vyber($this->nameTable, $stolpci, $podminka);
echo '<br>Število najdenih zapisov: '.count($prebrano);	
json_encode($prebrano);	
$vrstica = json_encode($prebrano);	
echo $vrstica;
	}//od construct	
	
}//od class PoberZapis
/*
Class PrikazPolja{
	public function __construct($id) {	
	
echo "<table id='mojaTabela' style='border: solid 1px black;'>";
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
//echo '<p id="gumb">gumb</p>';
$stmt = $prebrano;
//$stmt=array("kvak", "fuj");
 foreach(new TableRows(new RecursiveArrayIterator($stmt)) as $k=>$v) {
        echo $v;
    }

echo '
<script>

document.getElementById("mojaTabela").addEventListener("click", functionRow);
function functionRow (e) {
if (e.path[1]!=undefined) {	
var x = e.path[1];
prvaCelica = x.cells[0].innerHTML;
 alert(prvaCelica);
}
}

</script>';
	}//od construct	
}//od class PrikazPolja */
?>