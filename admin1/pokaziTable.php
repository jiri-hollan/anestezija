
<?php
require_once '../skupne/sabloni/zahlavi.php';
include '../skupne/narediTablo.php';	
$databaseGloboka=new DatabaseGloboka;
$databaseGloboka->pokaziTable();
require_once '../skupne/sabloni/zapati.php';
?>