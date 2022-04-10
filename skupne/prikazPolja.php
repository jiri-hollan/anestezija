<!DOCTYPE html>
<html  lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<!--<link rel="stylesheet" type="text/css" href="css/baze.css?<?php echo time(); ?>">-->
<style>
	table {
		border: 1px solid black;
		max_width:500px;		
	}
	
  tr:hover 
 {background-color: yellow;
	}
	
</style>
</head>
<body>


<?php
echo "<table id='vrsticeTabela'>";
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
  window.location.href = "../pregled/sprejem.php?id=" + prvaCelica; 
}

</script>';
?>
</body>
</html>