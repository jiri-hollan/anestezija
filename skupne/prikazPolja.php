<?php
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

$stmt = $prebrano;
//$stmt=array("kvak", "fuj");
 foreach(new TableRows(new RecursiveArrayIterator($stmt)) as $k=>$v) {
        echo $v;
    }

?>