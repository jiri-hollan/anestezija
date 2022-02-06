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
	
	}//uzavírací zavorky __construct	
//-----------------konec construct--------------

	public function vyber($tabulka, $sloupce, $podminka = NULL){
	$sloupceSQL = implode(', ', $sloupce);
	//echo '<br>'.$sloupceSQL;
	$podminkaSQL = '';
	$parametry = array();
	
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
		}
	}
	// echo '<br>';
	// echo var_dump($parametry) . "<br>";
	 // echo var_dump($podminka) . "<br>";
	 // echo var_dump($podminkaSQL );
	$dotaz = $this->conn->prepare("SELECT $sloupceSQL FROM $tabulka". $podminkaSQL);
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
	}
//............konec vyber.............................................................


	public function  vloz($tabulka,$data){
       $sloupce = array();
	   $hodnoty = array();
	   $parametry = array();
	   if (is_array($data)) {
		foreach ($data as $sloupec => $hodnota) { 
		 array_push($sloupce, $sloupec);
         array_push($hodnoty, '?');
		 array_push($parametry, $hodnota);		   
	   }		
	}
    $sloupceSQL = implode(', ', $sloupce);
    $hodnotySQL = implode(',  ', $hodnoty);
/*	echo '<br>sloupce: '.$sloupceSQL.'<br>';
	echo 'hodnotySQL: '.$hodnotySQL.'<br>';
	echo 'parametry: '.var_dump($parametry).'<br>';
	*/
    $dotaz = $this->conn->prepare("INSERT INTO $tabulka ($sloupceSQL) VALUES ($hodnotySQL)");

  try {
	  $dotaz->execute($parametry);
	  $pocetVlozenych = $dotaz->rowCount();	 
	  $lastId = $this->conn->lastInsertId();
	  //var_dump($lastId);
	  
  } catch (PDOException $e) {
	  echo $e->getMessage();
	  $pocetVlozenych = false;
	  $lastId =  false;
  }
      $vlozeno['pocetVlozenych'] = $pocetVlozenych;
	  //var_dump ($vlozeno);
	  $vlozeno['lastId'] = $lastId;
	 // echo $pocetVlozenych . 'zadnji Id: '. $vlozeno['lastId'];
  //return $pocetVlozenych;
    return $vlozeno;
}
//.........konec vloz.................................................................

}//uzavírací zavorky class Database
?>