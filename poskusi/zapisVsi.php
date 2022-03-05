<!DOCTYPE html>
<html  lang="sl-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<!--<link rel="stylesheet" type="text/css" href="css/baze.css?<?php echo time(); ?>">-->
</head>
<body>



<!DOCTYPE html>
<html lang="cs-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
$vrstice = json_encode($prebrano, JSON_UNESCAPED_UNICODE);	
echo $vrstice;
echo'<br>';
//var_dump($prebrano);
echo'<br>';
//echo $prebrano[0]["ime"].'<br>';
$celoIme=array();
for ($i = 0; $i < count($prebrano); $i++) {
//echo $prebrano[$i]["ime"].' '.$prebrano[$i]["priimek"].'<br>';	
$celoIme1= $prebrano[$i]["ime"].' '.$prebrano[$i]["priimek"];
echo $celoIme1.'<br>';//izpiše celo ime na zaslon
array_push($celoIme,$celoIme1);	
//array_push($celoIme,$prebrano[$i]["ime"]);	

}//od for 
echo '<br>var dump celo ime:<br>';
var_dump($celoIme);
$celoImeJson = json_encode($celoIme, JSON_UNESCAPED_UNICODE);
echo'<br><br>celo ime json:<br>';	
echo $celoImeJson;
echo '<script>';
echo 'var celoImeJson= ' . json_encode( $celoImeJson, JSON_UNESCAPED_UNICODE) . ';';
echo '</script>';

	}//od construct	
	}//od class PoberZapis
new PoberZapis("izola");
 
?>
<script>
alert("celo ime Json:" + celoImeJson);

</script>

 </body>
  </html>