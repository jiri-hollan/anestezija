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
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/anestiz/admin/'; 
	  }else {
		 $this->zaklad->url = 'http://' . $_SERVER['SERVER_NAME'].'/admin/';  
	  }
	  
	  //$this->zaklad->url = 'http://'.$_SERVER['SERVER_NAME'].'/anestiz/admin/';
	  //$this->inicializuj();

	}
	
	/*public function inicializuj() {
	  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		  $chiba = $this->overUdaje();
		  echo var_dump($chiba);
	  }else if (!empty($_GET['stav'] && $_GET['stav'] == 'neaktivni')){
		  $oznameni = 'Ste odjavljeni zaradi neaktivnosti. ' . 'Ponovno se prijavite.';		  
	  }
	  require_once('sabloni/prihlasovaci-formular.php');
	//od function inicializuj
	}  */
	

	
	//od class prihlaseni
}

//___________________________________- potomstvo_______________________________________________

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
	
	public function prihlaseniUspesne($status){
	   $_SESSION['blog_prihlasen'] = true;
	   $_SESSION["casova_znamka"] = time();
	   $_SESSION["status"] = $status;
	  //echo $status;
	  // header('Location: ' . $this->zaklad->url . 'prispevki.php');
	 // header('Location: ' .  'prispevki.php');
	
	 header('Location: ' .  'menuFile1.php'); 
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
			$uporabnikiTbl2 = $this->conn->vyber('uporabnikiTbl2', array('status'), array('uname'=>$_POST['uname'], 'geslo'=>$geslo));
         //echo $uporabnikiTbl2[0]['status'];
		 //$status=$uporabnikiTbl2[0]['status'];
		// echo $status;
		//echo var_dump($uporabnikiTbl2) .'<br>';
	
		
		if (count($uporabnikiTbl2) == 1)	{
			$status=$uporabnikiTbl2[0]['status'];
		// echo $status;
			$this->prihlaseniUspesne($status);
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
$uname=$geslo=$ime=$priimek=0;
$status = 1;
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
    echo "Uporabniško ime is required";
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
			//$uporabnikiTbl2 = $this->conn->vyber($nameTable, array('id'), array('uname'=>$_POST['uname']));
			$uporabnikiTbl2 = $this->conn->vyber($nameTable, array('id'), array('uname'=>$data['uname']));
            //$uporabnikiTbl2 = $this->conn->vyber($nameTable, array('id'), $data['uname']);
		if (count($uporabnikiTbl2) > 0)	{
			//$this->prihlaseniUspesne();
			echo 'to uporabniško ime že obstaja';
			
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

//_____________________________________konec Registrace_______________________________________________



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
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
}