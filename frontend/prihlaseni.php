<?php
session_start();
require_once('../skupne/database.php');
global $r;
	  require_once('sabloni/prihlasovaci-formular.php');
Class Prihlaseni {
	public $conn;
	public $zaklad;
	public $status;
	
	public function __construct() {
	  $this->conn = new Database();
	  $this->zaklad = new stdClass();
	  if ($_SERVER['SERVER_NAME']=="localhost"){
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/anestiz/frontend/'; 
	  }else {
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/frontend/';  
	  }
	  

	}	
	
}//od class prihlaseni

//___________________________________- potomstvo_______________________________________________
Class odjava extends Prihlaseni {
		
	public function __construct() {
		    parent::__construct();
	

	  //echo 'odhlašovani';
	  if (null !== ($_GET['stav'] || $_GET['stav'] == 'odhlasit')) {
	  $this->odhlasi();
     }	
		}//od __construct	
		
		 public function odhlasi() {
			//echo 'Odhlasi';
		 session_unset();
		 session_destroy();
            echo 'Odjavljen';
		  $oznameni = 'Ste odjavljeni, ' . 'ponovno se prijavite.';	
//		header('Location: ' . $this->zaklad->url . 'prihlaseni.php?stav=odhlasit');  

	  require_once('sabloni/prihlasovaci-formular.php');
	
	}//od function odhlasi		
	}//od clas odjava


//____________________________________konec clas odjava_______________________________________
Class Prijava extends Prihlaseni {
	
	
	public function __construct() {
		    parent::__construct();
	 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		  $chiba = $this->overUdaje();
		  //echo var_dump($chiba);
	  }else if (!empty($_GET['stav'] && $_GET['stav'] == 'neaktivni')){
		  $oznameni = 'Ste odjavljeni zaradi neaktivnosti. ' . 'Ponovno se prijavite.';		  
	  }
	  require_once('sabloni/prihlasovaci-formular.php');
	//od function inicializuj		
	}
	
	public function prihlaseniUspesne($status, $uname){
	   $_SESSION['blog_prihlasen'] = true;
	   $_SESSION["casova_znamka"] = time();
	   $_SESSION["status"] = $status;
	   $_SESSION["uname"] = $uname;
	  //echo $status;
	  // header('Location: ' . $this->zaklad->url . 'prispevki.php');
	 // header('Location: ' .  'prispevki.php');
	
	 header('Location: '.'menuFile1.php'); 
	// header('Location: ' .  'vertikalMenu.php');
	   exit();
	}
	
	public function prihlaseniSelhalo() {
		//echo 'iz funkcije prihlaseniSelhalo';
	   return 'Napačno uporabniško ime ali geslo. ';
	}
	
	public function overUdaje() {
		if (!empty($_POST['uname']) && !empty($_POST['geslo'])){
			$geslo = md5($_POST['geslo']);
			$uporabnikiTbl2 = $this->conn->vyber('uporabnikiTbl2', array('status', 'uname'), array('uname'=>$_POST['uname'], 'geslo'=>$geslo));
         //echo $uporabnikiTbl2[0]['status'];
		 //$status=$uporabnikiTbl2[0]['status'];
		// echo $status;
		//echo var_dump($uporabnikiTbl2) .'<br>';
	
		
		if (count($uporabnikiTbl2) == 1)	{
			$status=$uporabnikiTbl2[0]['status'];			
			//echo $status;
			$uname=$uporabnikiTbl2[0]['uname'];
			echo $uname;
		// echo $status;
			$this->prihlaseniUspesne($status, $uname);
		} else {
			//echo 'iz funkcije overUdaje';
			return $this->prihlaseniSelhalo();
		}   
	  }
	}
	
	
// od class Prijava	
}
//_____________________________________konec Prijava_______________________________________________
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

Class Registrace extends Prihlaseni {
    public $data;
    public $nameTable;
   
	public function __construct() {
		    parent::__construct();
			
			
$registracija=true;
$email=$geslo=$ime=$priimek=$uname=0;
$status = 0;
$nameTable = "uporabnikiTbl2";

	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	

	//echo $_POST["ime"];	
if (empty($_POST["ime"])) {
    echo"ime is required";
	$registracija=false;	
  } else {
	$data['ime'] = $this->test_input($_POST["ime"]);
   // $ime = $this->test_input($_POST["ime"]);
  }	

if (empty($_POST["priimek"])) {
    echo "priimek is required";
	$registracija=false;
  } else {
    $data['priimek'] = $this->test_input($_POST["priimek"]);  
  }
if (empty($_POST["email"])) {
    echo "Email is required";
	$registracija=false;	
  } else {
    $data['email'] = $this->test_input($_POST["email"]);
  }
  if (empty($_POST["uname"])) {
    echo "Uporabniško ime je obvezno";
	$registracija=false;	
  } else {
    $data['uname'] = $this->test_input($_POST["uname"]);
  }
  
if ($_POST["geslo"]!=$_POST["psw-repeat"]) {
    echo "napačen vnos gesla";
	$registracija=false;	
  } else {
    $geslo = $this->test_input($_POST["geslo"]);
	$data['geslo'] = md5($geslo);
  }
    $data['status'] = $status;
  //echo '<br>status: ' .$status;
  //echo'<br>data: '. $data["status"].'<br>';
}


if ($registracija){
	//echo $values.'<br>'; 
	 //echo '<br>'.'V if registracija: '.$nameTable.var_dump($data).'<br>';
  //  $this->registracija($nameTable,$keys,$values);
      $chiba = $this->overUdaje($nameTable, $data);
     // $ulozeno = $this->conn->vloz($nameTable, $data);
	}
// od construct
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
public function overUdaje($nameTable, $data) {
	if (!empty($data['uname'])){
		echo $data['ime'] .' '. $data['priimek'].', ';

			$uporabnikiTbl2 = $this->conn->vyberOr($nameTable, array('id'), array('uname'=>$data['uname'], 'email'=>$data['email'] ));

		if (count($uporabnikiTbl2) > 0)	{
			//$this->prihlaseniUspesne();
			echo 'To uporabniško ime ali email je že v upoabi.';
			
		} else {
			//echo 'iz funkcije overUdaje';
			//return $this->prihlaseniSelhalo();
			$ulozeno = $this->conn->vloz($nameTable, $data);
			echo 'uspešno ste se registrirali,<br> pravice do dostopa vam bodo dodeljene po posvetu <br>z obveščevalnimi agencijami.';
		}   
	  }
}

// od class Registrace	
}

//____________________________konec Registrace_______________________________
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

Class Profil extends Prihlaseni {
    public $data;
    public $nameTable;
   
	public function __construct() {
		    parent::__construct();
			
			
//$registracija=true;
//$email=$geslo=$ime=$priimek=$uname=0;
//$status = 0;
//$nameTable = "uporabnikiTbl2";
//echo 'Uname: '. $_SESSION["uname"];

if (isset($_SESSION["uname"])) {
$data['uname'] = $_SESSION["uname"];
//var_dump ($data);
require_once 'uporabnikWhere2.php';
new UporabnikiWhere($data);
require_once 'sabloni/spremembaGesla.php';
} else{
echo 'NISTE PRIJAVLJENI';	
}
//new SpremembaG;
  }// od construct
}// od class profil
//________________________________konec Profil________________________
//---------------------SPREMEMBA G------------------------------------

class SpremembaG extends Prihlaseni  {
	public $tabulka;
    public $data;
    public $podminka;

 public function __construct() {
		    parent::__construct();
			
    $tabulka = 'uporabnikiTbl2';
	$geslo=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	echo 'v server rekvest';
	var_dump($_POST["sGeslo"]);
	//var_dump($_POST["id"]);
	if (isset($_SESSION["uname"]) && !empty($_POST["sGeslo"])) {
	$podminka['uname'] = $_SESSION["uname"];
	$sGeslo = md5($_POST["sGeslo"]);
	$podminka['geslo'] = $sGeslo;
	
	
	if ($_POST["geslo"]!=$_POST["psw-repeat"]) {
    echo "napačen vnos gesla";
	//$registracija=false;	
  } else {
    $geslo = $_POST["geslo"];
	$data['geslo'] = md5($geslo);
	var_dump($data);
  }
	
	}//od if isset session
	

	
/*	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/
	
	
	
   // $data = array('geslo'=>"m");
    //$podminka = array('id'=>5);
//require_once '../../skupne/database.php';

new Database;
$uporabnikiTbl2 = $this->conn->aktualizuj($tabulka,$data,$podminka);
//aktualizuj($tabulka,$data,$podminka);

}//od if $ server
else {
	echo "nekaj je narobe";
}	
 }//od construct
}//od class spremembaG
//new SpremembaG;

//_____________________konec clas spremembaG___________________________
//$prihlaseni = new Prihlaseni;
if (isset($_GET['r'])) {
	 // echo 'poskus GET' . $_GET['r'];
	  $r = $_GET['r'];
switch ($r) {
  case "login":
    
      $prihlaseni = new Prijava;
    //echo "poskušate se logirati!"; 
   break;
   
 case "singin":
  $prihlaseni = new Registrace;
    //echo "Poskušate se registrirati!";
   break;
   
case "logout":
  $prihlaseni = new Odjava;
    //echo "Poskušate se odjaviti!"; 
   break;  
   
case "profil":
  $prihlaseni = new Profil;
    //echo "V profilu"; 
   break;  
   
case "spremembaG":
  $prihlaseni = new SpremembaG;
    //echo "V profilu"; 
   break;  
   
  default:
    //echo "Your favorite color is neither red, blue, nor green!";
}
}