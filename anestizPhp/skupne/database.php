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
		$this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
//uzavírací zavorky __construct		
	}
	
	public function vyber($tabulka, $sloupce, $podminka = NULL){
	$sloupceSQL = implode(', ', $sloupce);
	$podminkaSQL = '';
	$parametry = array();
	
	if (is_array($podminka)){
		$i = 0;
		foreach ($podminka as $sloupec=>$hodnota){
			if ($i == 0){
				$podminkaSQL .=" WHERE $sloupec = ?";				
			}else {
				$podminkaSQL .= " AND $sloupec = ?";
			}
			$parametry[$i] = $hodnota;
			$i++;
		}
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
//..................................................................................	
	public function  vloz($tabulka,$data){
       $sloupce = array();
	   $hodnoty = array();
	   $parametry = array();
	   if (is_array($data)) {
		foreach ($data as $sloupec => $hodnota) { 
		 array_push($sloupce, "'$sloupec'");
         array_push($hodnoty, '?');
		 array_push($parametry, $hodnota);		   
	   }		
	}
    $sloupceSQL = implode(', ', $sloupce);
    $hodnotySQL = implode(',  ', $hodnoty);
	echo $sloupceSQL.'<br>';
	echo $hodnotySQL.'<br>';
	echo var_dump($parametry).'<br>';
    $dotaz = $this->conn->prepare("INSERT INTO '$tabulka' ($sloupceSQL) VALUES ($hodnotySQL)");

  try {
	  $dotaz->execute($parametry);
	  $pocetVlozenych = $dotaz->rowCount();	  
  } catch (PDOException $e) {
	  echo $e->getMessage();
	  $pocetVlozenych = false;
  }
  
  return $pocetVlozenych;
}
//.......................................................................................
	public function aktualizuj($tabulka,$data,$podminka){
	}		
	
	public function odsrani($tabulka,$podminka){		
	}		

//uzavírací zavorky class Database	
}