<?php
//------na temelju pregledId pobere podatke iz zapisa s tem id
require_once '../skupne/database.php';
Class PoberLimite{
	public $conn;
	public $zaklad;
	public $status;
	public $pristop;
	
	public function __construct() {
 //$this->id = $id;
 $this->conn = new Database();	
 $this->nameTable = 'limitiTbl';
   $stolpci = array('*');
//pregledId je obsoječi Id v tabeli bolnikTbl
 //  $podminka = array("pregledId"=>$this->id);
  //  $prebrano = $this->conn->vyber($this->nameTable, $stolpci, $podminka);
   $prebrano = $this->conn->vyber($this->nameTable, $stolpci);
echo '<br>Število najdenih zapisov zapis po id: '.count($prebrano);	
json_encode($prebrano);	
$vrstica = json_encode($prebrano);	
echo ' Najdeno'.$vrstica.' zapisov';
	}//od construct	
	
}//od class PoberZapis
$poskus = new PoberLimite();


?>