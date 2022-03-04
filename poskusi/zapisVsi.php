<?php
//------na temelju pregledId pobere podatke iz zapisa z bolnišnice
require_once '../skupne/database.php';
Class PoberZapis{
	public $conn;
	public $zaklad;
	public $status;
	public $pristop;
	
	public function __construct($bolnisnica) {
 $this->bolnisnica = $bolnisnica;
 $this->conn = new Database();	
 $this->nameTable = 'pregledovalciTbl';
   $stolpci = array('*');
//bolnisnicapregledId je obsoječa bolnisnica v tabeli pregledovalciTbl
   $podminka = array("bolnisnica"=>$this->bolnisnica);
   $prebrano = $this->conn->vyber($this->nameTable, $stolpci, $podminka);
echo '<br>Število najdenih zapisov zapis po '. $this->bolnisnica .': '.count($prebrano);	
echo'<br>';
json_encode($prebrano);	
$vrstice = json_encode($prebrano);	
echo $vrstice;
	}//od construct	
	
}//od class PoberZapis
new PoberZapis("izola");
?>
