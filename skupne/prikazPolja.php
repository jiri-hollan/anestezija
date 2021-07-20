<?php
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


 foreach(new TableRows(new RecursiveArrayIterator($najdeno)) as $k=>$v) {
        echo $v;
    }

echo '
<script>

document.getElementById("mojaTabela").addEventListener("click", functionRow);
function functionRow (e) {
if (e.path[1]!=undefined) {	
var x = e.path[1];
prvaCelica = x.cells[0].innerHTML;
 alert("prikazPolja\.php"+prvaCelica);
 
}
}


</script>';
?>