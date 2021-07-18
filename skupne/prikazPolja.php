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
//echo '<p id="gumb">gumb</p>';
$stmt = $prebrano;
//$stmt=array("kvak", "fuj");
 foreach(new TableRows(new RecursiveArrayIterator($stmt)) as $k=>$v) {
        echo $v;
    }


echo '<button id="myBtn">Try it</button>
<script>

document.getElementById("myBtn").addEventListener("click", myFunction);
function myFunction() {
  //alert(document.getElementById("mojaTabela").rows[0].cells.namedItem("id").innerHTML);
    alert(document.getElementById("mojaTabela").rows[0].cells.item(0).innerHTML);
}
</script>';
?>