<?php
class Database {
	public $servername = '';
	public $username = '';
	public $password = '';
	public $dbname = '';
	public $connn = '';
	public $bolnikObstaja= '';
	public Function __construct(){
	require 'streznik.php';
		$this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ';charset=UTF8', $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }//uzavírací zavorky __construct	
//-----------------konec construct--------------
public function vyber ($tabulka, $sloupce, $podminka = NULL, $poradi = NULL){
	$sloupceSQL = implode(', ', $sloupce);
	$podminkaSQL = '';
	$parametry = array();
	$poradiSQL = '';
	if (is_array($podminka)){
		$i = 0;
		foreach ($podminka as $sloupec=>$hodnota){
			if ($i == 0){
				$podminkaSQL .=" WHERE $sloupec = ?";				
			}else {
				$podminkaSQL .=" AND $sloupec = ?";
			}
			$parametry[$i] = $hodnota;
			$i++;
		}//od foreach ($podminka
	}// od if array
	if ($poradi!=NULL){
	   $poradiSQL = " ORDER BY " . $poradi;	
	}
	$dotaz = $this->conn->prepare("SELECT $sloupceSQL FROM $tabulka". $podminkaSQL. $poradiSQL);
	try {
		$dotaz->execute($parametry);		
		$zaznamy = $dotaz->fetchAll(PDO::FETCH_ASSOC);
//echo '<br>v try vyber';
	  }catch (PDException $e) {
		  echo $e->getMessage();
		  $zaznamy = false;
	  }	  
	  $dotaz->closeCursor();
	  return $zaznamy;
 }// od function vyber
//............konec vyber..........................................
}//uzavírací zavorky class Database
?>

<?php
// aktivace
$tabulka="omejitveTbl";
$sloupce=["nivo"];
$podminka=["razlog"=>"gdpr"];
$database= new Database;
$gdpr=$database->vyber($tabulka,$sloupce,$podminka);

//var_dump($gdpr);
echo '<br>'.count($gdpr).'<br>';
if(count($gdpr)==1){
$gdpr=	$gdpr[0]['nivo'];
echo var_dump($gdpr);
echo '<br>'.$gdpr;
//echo $gdpr->nivo;
}
?>