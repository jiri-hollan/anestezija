<?php
//------seznam bolnišnic
require_once '../skupne/database.php';
Class spisekBolnisnic{
	public $conn;
	public $zaklad;
	public $status; //vljučena=1, nevključena=0
	public function __construct() {
  $this->status = '1';
  $this->conn = new Database();	
  $this->nameTable = 'bolnisniceTbl'; 
  $stolpci = array('mesto','nazivB');
  $poradi = "mesto";
  $podminka = array("status"=>$this->status); 
  $prebrano = $this->conn->vyber($this->nameTable, $stolpci, $podminka, $poradi);
 // var_dump ($prebrano);
  $nazivBolnisnice=array();
  $sezamBolnisnic=array();
  $mestoBolnisnice=array();
  for ($i = 0; $i < count($prebrano); $i++) {
//echo $prebrano[$i]["mesto"].'<br>';	

array_push($nazivBolnisnice,$prebrano[$i]["nazivB"] );
array_push($mestoBolnisnice,$prebrano[$i]["mesto"]);	
    }//od for 
	//echo '<br>var dump mesto Bolnišnice:<br>';
//var_dump($mestoBolnisnice);
$seznamBolnisnic=array_combine($mestoBolnisnice,$nazivBolnisnice);
var_dump($seznamBolnisnic);
$mestoBolnisniceJson = json_encode($mestoBolnisnice, JSON_UNESCAPED_UNICODE);

echo '<script>';
echo 'var mestoBolnisniceJson= ' . json_encode( $mestoBolnisniceJson, JSON_UNESCAPED_UNICODE) . ';';
echo '</script>';
	}//od construct			
	}//od class spisekBolnisnic
	new spisekBolnisnic();
?>