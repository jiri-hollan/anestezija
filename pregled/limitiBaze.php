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
  // $stolpci = array('*');
   $stolpci = array('ime', 'min', 'max');   
//pregledId je obsoječi Id v tabeli bolnikTbl
$podminka = array("skupina"=>"lab");
  $prebrano = $this->conn->vyber($this->nameTable, $stolpci, $podminka);
  // $prebrano = $this->conn->vyber($this->nameTable, $stolpci);
echo '<br>Število zapisov limiti lab vrednosti: najdeno'.count($prebrano);	
json_encode($prebrano);	
$vrstica = json_encode($prebrano);	
echo ' zapisov'.$vrstica;
	}//od construct	
	
}//od class PoberZapis
$poskus = new PoberLimite();


?>