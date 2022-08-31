<?php
//------seznam bolnišnic
require_once '../skupne/database.php';
Class spisekZdravnikov{
	public $conn;
	public $zaklad;
	public $status; //vljučena=1, nevključena=0
	public function __construct() {
  $this->status = '1';
  $this->conn = new Database();	
  $this->nameTable = 'bolnisniceTbl'; 
  $stolpci = array('mesto');
  $poradi = "mesto";
  $podminka = array("status"=>$this->status); 
  $prebrano = $this->conn->vyber($this->nameTable, $stolpci, $podminka, $poradi);
  $mestoBolnisnice=array();
  for ($i = 0; $i < count($prebrano); $i++) {
//echo $prebrano[$i]["mesto"].'<br>';	

array_push($mestoBolnisnice,$prebrano[$i]["mesto"]);	
    }//od for 
	}//od construct			
	}//od class spisekZdravnikov
?>