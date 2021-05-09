 <?php
session_start();
require_once('../skupne/database.php');
global $r;
	  require_once('sabloni/prihlasovaci-formular.php');
Class Prihlaseni {
	public $conn;
	public $zaklad;
	
	public function __construct() {
	  $this->conn = new Database();
	  $this->zaklad = new stdClass();
	  $this->zaklad->url = 'http://'.$_SERVER['SERVER_NAME'].'/anestiz/admin/';
	  $this->inicializuj();

	}
	
	public function inicializuj() {
	  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		  $chiba = $this->overUdaje();
	  }else if (!empty($_GET['stav'] && $_GET['stav'] == 'neaktivni')){
		  $oznameni = 'Ste odjavljeni zaradi neaktivnosti. ' . 'Ponovno se prijavite.';		  
	  }
	  require_once('sabloni/prihlasovaci-formular.php');
	//od function inicializuj
	}
	

	
	//od class prihlaseni
}

//___________________________________- potomstvo_______________________________________________

Class Prijava extends Prihlaseni {
	public function prihlaseniUspesne(){
	   $_SESSION['blog_prihlasen'] = true;
	   $_SESSION["casova_znamka"] = time();
	  // header('Location: ' . $this->zaklad->url . 'prispevki.php');
	  header('Location: ' .  'prispevki.php');
	   exit();
	}
	
	public function prihlaseniSelhalo() {
		echo 'iz funkcije prihlaseniSelhalo';
	   return 'Napačno uporabniško ime ali geslo. ';
	}
	
	public function overUdaje() {
		if (!empty($_POST['email']) && !empty($_POST['geslo'])){
			$geslo = md5($_POST['geslo']);
			$uporabnikiTbl = $this->conn->vyber('uporabnikiTbl', array('id'), array('email'=>$_POST['email'], 'geslo'=>$geslo));
		if (count($uporabnikiTbl) > 0)	{
			$this->prihlaseniUspesne();
		} else {
			echo 'iz funkcije overUdaje';
			return $this->prihlaseniSelhalo();
		}   
	  }
	}
	
	
// od class Prijava	
}
//_____________________________________konec Prijava_______________________________________________
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

Class Registrace extends Prihlaseni {

public $keys;
public $values;
public $nameTable;
	public function __construct() {
$registracija=true;
$email=$geslo=$ime=$priimek=0;
$status = 1;
$nameTable = "uporabnikiTbl";

$uporabnik['email'] = $email;
$uporabnik['geslo'] = $geslo;
$uporabnik['ime'] = $ime;
$uporabnik['priimek'] = $priimek;
$uporabnik['status'] = $status;


   $keys = implode(", ",array_keys($uporabnik));
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	

	//echo $_POST["ime"];	
if (empty($_POST["ime"])) {
    echo"ime is required";
	$registracija=false;	
  } else {
    $ime = $this->test_input($_POST["ime"]);
  }	

if (empty($_POST["priimek"])) {
    echo "priimek is required";
	$registracija=false;
  } else {
    $priimek = $this->test_input($_POST["priimek"]);  
  }
if (empty($_POST["email"])) {
    echo "Email is required";
	$registracija=false;	
  } else {
    $email = $this->test_input($_POST["email"]);
  }
  
  
if ($_POST["geslo"]!=$_POST["psw-repeat"]) {
    echo "napačen vnos gesla";
	$registracija=false;	
  } else {
    $geslo = $this->test_input($_POST["geslo"]);
	$geslo = md5($geslo);
  }
$uporabnik['email'] = $email;
$uporabnik['geslo'] = $geslo;
$uporabnik['ime'] = $ime;
$uporabnik['priimek'] = $priimek;
$uporabnik['status'] = $status;

 $values= "'" . implode("','",array_values($uporabnik)) . "'";
//echo "<br>".$keys ."<br>";
//  echo $values; 
 //include 'uporabnikNovPreveri.php';	 
}



if ($registracija){
	//echo $values.'<br>'; 
	 echo 'V if registracija'.$nameTable.'<br>';
    $this->registracija($nameTable,$keys,$values);
//	$this->registracija();	
	}
// od construct
}
	
function registracija($nameTable,$keys,$values) {
	
try {
	
 // require_once '../skupne/prijavniWeb.php';
  echo 'v registraciji'.$nameTable . '<br>';
  
  $sql = "INSERT INTO $nameTable ($keys)  VALUES ($values)";

  echo  $sql.'<br>';
  // use exec() because no results are returned
  $this->conn->exec($sql);
  echo "Uporabnik je registriran";
} catch(PDOException $e) {
  echo "<br>email  " .  $e->getMessage();
}

$conn = null;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



// od class Registrace	
}
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
Class Registracex extends Prihlaseni {
	/*	public function prihlaseniUspesne(){
	   $_SESSION['blog_prihlasen'] = true;
	   $_SESSION["casova_znamka"] = time();
	  // header('Location: ' . $this->zaklad->url . 'prispevki.php');
	  header('Location: ' .  'prispevki.php');
	   exit();
	}*/
	
	public function prihlaseniNadaljuj() {
		echo 'iz funkcije prihlaseniNadaljuj';
	   return 'uporabniško ime še ni v bazi ';
	}
	
	public function overUdaje() {
		if (!empty($_POST['email'])){
			
			$uporabnikiTbl = $this->conn->vyber('uporabnikiTbl', array('id'), array('email'=>$_POST['email']));
		if (count($uporabnikiTbl) > 0)	{
					echo 'iz funkcije overUdaje uporabnik obstaja';
			//$this->prihlaseniUspesne();
		} else {
			echo 'iz funkcije overUdaje';
			return $this->prihlaseniNadaljuj();
		}   
	  }
	}
	

	
	
// od class Registrace	
}
//_____________________________________konec Registrace_______________________________________________



//$prihlaseni = new Prihlaseni;
if (isset($_GET['r'])) {
	 // echo 'poskus GET' . $_GET['r'];
	  $r = $_GET['r'];
switch ($r) {
  case "login":
    // echo "poskušate se logirati!"; ta vrstica povzroči napako 
      $prihlaseni = new Prijava;
    echo "poskušate se logirati!"; 

   break;
 case "singin":
  $prihlaseni = new Registrace;
    echo "Poskušate se registrirati!";
    //$prihlaseni = new Prihlaseni;
   break;  
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
}