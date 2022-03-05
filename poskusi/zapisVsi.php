<!DOCTYPE html>
<html  lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/baze.css?<?php echo time(); ?>">
</head>
<body>




<?php
//------na temelju pregledId pobere podatke iz zapisa z bolnišnice
require_once '../skupne/database.php';
Class PoberZapis{
	public $conn;
	public $zaklad;
	public $status;
	public $pristop;
	public $celoIme=array();
	public function __construct($bolnisnica) {
 $this->bolnisnica = $bolnisnica;
 $this->conn = new Database();	
 $this->nameTable = 'pregledovalciTbl';
// $stolpci = array('*');
   $stolpci = array('ime','priimek');
//bolnisnicapregledId je obsoječa bolnisnica v tabeli pregledovalciTbl
   $podminka = array("bolnisnica"=>$this->bolnisnica);
   $prebrano = $this->conn->vyber($this->nameTable, $stolpci, $podminka);
echo '<br>Število najdenih zapisov zapis po '. $this->bolnisnica .': '.count($prebrano);	
echo'<br>';
//json_encode($prebrano);	
$vrstice = json_encode($prebrano);	
echo $vrstice;
echo'<br><br>';
var_dump($prebrano);
echo'<br>';
echo $prebrano[0]["ime"].'<br>';
for ($i = 0; $i < count($prebrano); $i++) {
echo $prebrano[$i]["ime"].' '.$prebrano[$i]["priimek"];	
//array_push($celoIme,$prebrano[$i]["ime"]);	
//var_dump($prebrano);
}//od for 
	}//od construct	
	}//od class PoberZapis
new PoberZapis("izola");
?>


 </body>
  </html>