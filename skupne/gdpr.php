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
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION		
 }//uzavírací zavorky __construct	
//-----------------konec construct--------------
public ($tabulka, $sloupce, $podminka = NULL, $poradi = NULL){
	$sloupceSQL = implode(', ', $sloupce);
//echo '<br>'.$sloupceSQL;
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
// echo $poradiSQL;
// echo '<br>';
// echo var_dump($parametry) . "<br>";
// echo var_dump($podminka) . "<br>";
// echo var_dump($podminkaSQL );
	$dotaz = $this->conn->prepare("SELECT $sloupceSQL FROM $tabulka". $podminkaSQL. $poradiSQL);
//var_dump($dotaz);
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