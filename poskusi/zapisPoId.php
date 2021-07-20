<?php
require_once '../skupne/database.php';
$database = new database;
   $this->nameTable = 'bolnikTbl';
   $this->stolpci = *;
   $this->podminka = id;
   $prebrano = $this->conn->vyber($this->nameTable, $this->stolpci, $this->podminka);
echo '<br>Število najdenih zapisov: '.count($prebrano);	
Return	$prebrano;	
?>