
<?php
//------upam da naredi primeren jason iz limitiTbl
require_once '../skupne/database.php';
Class PoberZapis{
	public $conn;
	public $zaklad;
	//public $status;
	//public $pristop;
	public function __construct() {
// $this->bolnisnica = $bolnisnica;
 // $this->status = '1';
 $this->conn = new Database();	
 $this->nameTable = 'limitiTbl';
 //$stolpci = array('*');
 $stolpci = array('ime','min', 'max');
  // $poradi = "priimek";
   $poradi = "";
//bolnisnicapregledId je obsoječa bolnisnica v tabeli limitiTbl
 //  $podminka = array("bolnisnica"=>$this->bolnisnica,"status"=>$this->status); 
 $podminka = array();
   $prebrano = $this->conn->vyber($this->nameTable, $stolpci, $podminka, $poradi);
/*     
$celoIme=array();
for ($i = 0; $i < count($prebrano); $i++) {
//echo $prebrano[$i]["ime"].' '.$prebrano[$i]["priimek"].'<br>';	
$celoIme1= $prebrano[$i]["ime"].' '.$prebrano[$i]["priimek"];
//echo $celoIme1.'<br>';//izpiše celo ime na zaslon
array_push($celoIme,$celoIme1);	

}//od for 
//echo '<br>var dump celo ime:<br>';
//var_dump($celoIme);
$celoImeJson = json_encode($celoIme, JSON_UNESCAPED_UNICODE);
*/
//var_dump($prebrano);
$limitiJson = json_encode($prebrano, JSON_UNESCAPED_UNICODE);
echo '<script>';
echo 'var limitiJson= ' . json_encode( $limitiJson, JSON_UNESCAPED_UNICODE) . ';';
echo 'alert (limitiJson);';
echo '</script>';

	}//od construct	
	}//od class PoberZapis
/*if (isset($_GET['aktivnaBolnisnica'])) {
	$aktivnaBolnisnica = $_GET['aktivnaBolnisnica'];
}else {$aktivnaBolnisnica = '';
}
//var_dump($aktivnaBolnisnica);*/
new PoberZapis();
 
?>
