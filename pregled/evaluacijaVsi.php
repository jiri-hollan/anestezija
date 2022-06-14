
<?php
//------upam da naredi primeren jason iz limitiTbl
require_once '../skupne/database.php';
Class PoberZapise{
	public $conn;
	public $zaklad;
	//public $status;
	//public $pristop;
	public function __construct() {
// $this->bolnisnica = $bolnisnica;
 $this->conn = new Database();	
 $this->nameTable = 'limitiTbl';
 $stolpci = array('ime','min', 'max');
 $poradi = "";
 $podminka = array();
   $prebrano = $this->conn->vyber($this->nameTable, $stolpci, $podminka, $poradi);
//var_dump($prebrano);
//______________________________________________________________-
$limiti=array();
for ($i = 0; $i < count($prebrano); $i++) {
$ime= $prebrano[$i]["ime"];
$min= $prebrano[$i]["min"];
$max= $prebrano[$i]["max"];
$limiti[$ime]=array("min"=>$min,"max"=>$max);
//echo $limiti1.'<br>';//izpiše limite na zaslon
}//od for 
//echo '<br>var dump celo ime:<br>';
//var_dump($limiti);

//________________________________________________________________

$limitiJson = json_encode($limiti, JSON_UNESCAPED_UNICODE);
echo '<script>';
echo 'var limitiJson= ' . json_encode( $limitiJson, JSON_UNESCAPED_UNICODE) . ';';
//echo 'console.log(limitiJson);';
echo  'var limitiJsonx = JSON.parse(limitiJson);';
echo '</script>';
	}//od construct	
	}//od class PoberZapise
new PoberZapise();
 
?>
<script>
 console.log(limitiJsonx);
 function laborFunction(ime,vrednost)
{	

 max = limitiJsonx[ime]["max"];
 max = parseFloat(max);
 console.log(max);
  min = limitiJsonx[ime]["min"];
   min = parseFloat(min);
 console.log(min);

if(vrednost == ""||vrednost == 0||vrednost=== null) { 
	 pozorFunction(ime, 2);

	
  } else if(vrednost != "" && vrednost>max) {
     //alert (ime + " je nad zgornjo mejo mormale");
     pozorFunction(ime, 1);	
	 
 /*} else if(vrednost == ""||vrednost == 0||vrednost=== null) { 
	 pozorFunction(ime, 2); */
	 
 } else if (vrednost !="" && vrednost<min) {
    //alert (ime + " je pod spodnjo mejo mormale");
    pozorFunction(ime, 0);
	 
  } else {
    pozorFunction(ime, 3);	
 }

}//od function laborFunction
</script>