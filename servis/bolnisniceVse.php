<?php
//------na temelju pregledId pobere podatke iz zapisa z bolnišnice
require_once '../skupne/database.php';
Class PoberBolnisnice{
	public $conn;
	public $bolnisnicaStatus;
	//public $pristop;
	public $nameTable;
	public function __construct() {		
 $this->bolnisnicaStatus = '1';
 $this->conn = new Database();	
 $this->nameTable = 'bolnisniceTbl';
 $stolpci = array('*');
 $poradi = "";
//bolnisnicapregledId je obsoječa bolnisnica v tabeli pregledovalciKomb
 $podminka = array(""); 
 $prebrano = $this->conn->vyber($this->nameTable, $stolpci, $podminka, $poradi);     
 $bolnisnica=array();
 for ($i = 0; $i < count($prebrano); $i++) {
//echo $prebrano[$i]["bolnisnica"].'<br>';	
   $bolnisnica1= $prebrano[$i]["mesto"];
//echo $bolnisnica1.'<br>';//izpiše  bolnisnica na zaslon
   array_push($bolnisnica,$bolnisnica1);	
}//od for 
//var_dump($bolnisnica);
  $bolnisnicaJson = json_encode($bolnisnica, JSON_UNESCAPED_UNICODE);
  echo($bolnisnicaJson);
  echo'<script src="js/bolnisnice.js?'.time().'"></script>';
  echo '<script> 
  var bolnisnicaJson= ' . $bolnisnicaJson . '; 
  listaBolnisnicFunction(bolnisnicaJson); 
  var bolnisnicaJson= ' . json_encode( $bolnisnicaJson, JSON_UNESCAPED_UNICODE) . ';
  alert(bolnisnicaJson); 
  echo </script>';
  
}//od construct	
}//od class PoberBolnisnice
new PoberBolnisnice(); 
?>
