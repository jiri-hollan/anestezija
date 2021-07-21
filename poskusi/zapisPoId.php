<?php
require_once '../skupne/database.php';
$conn = new database;
   $nameTable = 'bolnikTbl';
   $stolpci = array('*');
//pregledId je obsoječi Id v tabeli bolnikTbl
   $podminka = array("pregledId"=>"168");
   $prebrano = $conn->vyber($nameTable, $stolpci, $podminka);
echo '<br>Število najdenih zapisov: '.count($prebrano);	
Return	$prebrano;	
?>