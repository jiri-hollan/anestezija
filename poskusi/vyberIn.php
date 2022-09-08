<?php

class Database {
	
	public $servername = '';
	public $username = '';
	public $password = '';
	public $dbname = '';
	public $connn = '';
	
	public Function __construct(){
	
      $this->servername = "sh17.neoserv.si";
      $this->username = "anestiz";
      $this->password = "laringoskop";
      $this->dbname = "anestiz_navodila";

          if ( $_SERVER['SERVER_NAME']=="localhost") {
			  $this->servername = "localhost";
              $this->username = "root";
              $this->password = "";
              $this->dbname = "navodila";
            }
		$this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ';charset=UTF8', $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
	echo "na začetku 26";
	}//uzavírací zavorky __construct	
//-----------------konec construct--------------

public function vyberIn($tabulka, $sloupce, $podminka = NULL, $vrednosti=NULL){
	$sloupceSQL = implode(', ', $sloupce);
	$podminkaSQL = '';
	$parametry = array();
		
	if (is_array($vrednosti)){

		$podminkaSQL .=" WHERE " . $podminka ." IN" . "(";	

		$i = 0;			
	//foreach ($vrednosti){
	foreach ($podminka as $sloupec=>$hodnota){					
				$podminkaSQL .="$vrednosti[$i],";								
			$i++;
		}
		$podminkaSQL .=")";	
				echo $podminkaSQL;
	}
	
	/*echo var_dump($parametry) . "<br>";
	  echo var_dump($podminka) . "<br>";
	  echo var_dump($podminkaSQL . "<br>");*/
	$dotaz = $this->conn->prepare("SELECT $sloupceSQL FROM $tabulka". $podminkaSQL);
	
	try {
		$dotaz->execute($parametry);		
		$zaznamy = $dotaz->fetchAll(PDO::FETCH_ASSOC);
	  }catch (PDException $e) {
		  echo $e->getMessage();
		  $zaznamy = false;
	  }
	  
	  $dotaz->closeCursor();
	  return $zaznamy;
	}
//..............konec vyberIn...................................................
}//uzavírací zavorky class Database

Class spisekBolnisnic{
	public $conn;
	public $zaklad;
	public $status; //vključena+baza=2, vljučena=1, nevključena=0
	public function __construct() {
  $this->status = '1';
  $this->conn = new Database();	
  $this->nameTable = 'bolnisniceTbl'; 
  $stolpci = array('mesto','nazivB');
  $poradi = "mesto";
  $podminka = "status";
  $vrednosti = array(1,2);
  $prebrano = $this->conn->vyberIn($this->nameTable, $stolpci, $podminka, $vrednosti, $poradi);
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
//var_dump($seznamBolnisnic);
	}//od construct			
	}//od class spisekBolnisnic
	new spisekBolnisnic();
?>