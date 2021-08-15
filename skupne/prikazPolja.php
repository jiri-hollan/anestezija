<?php
echo "<table id='vrsticeTabela' style='border: solid 1px black;'>";
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

document.getElementById("vrsticeTabela").addEventListener("click", functionRow);
function functionRow (e) {
if (e.path[1]!=undefined) {	
var x = e.path[1];
prvaCelica = x.cells[0].innerHTML;
 //alert(prvaCelica);
celicaFunction(prvaCelica);
}
}
function celicaFunction(prvaCelica) { 
 // alert("to je prva celica: "+prvaCelica);
  window.location.href = "../pregled/bolnikBaze/sprejem.php?id=" + prvaCelica; 
}

</script>';
?>