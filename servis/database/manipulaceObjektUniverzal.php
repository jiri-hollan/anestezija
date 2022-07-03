 <?php 
 //$tabulka="pregledovalciTbl";
 require_once('../sabloni/vkladane/zahlavi.php');
/* V tom failu so funkcije za spreminjanje tabele databaze*/
 require_once('sabloni/formBaze.php');
 require_once '../../skupne/database.php';
 //require_once('manipulaceClassUniverzal.php');

//_____________________________________________________________
if (isset($_REQUEST["akce"])) {
	  $akce = new Test_input($_REQUEST["akce"]);
	  $akce = $akce->get_test();
  if (isset($_REQUEST["bolnisnica"])){
	  $bolnisnica = new Test_input($_REQUEST['bolnisnica']); 
      $bolnisnica = $bolnisnica->get_test();
	  
  }else {
	 $bolnisnica = "";   
  }
 if (isset($tabulka)){
	  $tabulka= $tabulka; 
  }else if (isset($_REQUEST["tabulka"])){
	  //$tabulka= test_input($_REQUEST["tabulka"]);
	  $tabulka= new Test_input($_REQUEST["tabulka"]);
	  $tabulka = $tabulka->get_test();
  }else {
	  echo "ni tabulke v post";
	 //$tabulka = "pregledovalciTbl"; 
  }
  //var_dump($akce);
    echo strtoupper($akce) .': ';
  echo strtoupper($bolnisnica) .'<br>';
 // akceFunction($akce,$tabulka,$bolnisnica);
  new $akce($bolnisnica, $tabulka);

	  
}//od if
//_________________________________
 
 	class Test_input {
	public $test;	
  function __construct($test) {
	//parent::__construct($test);
   $test = trim($test);
  $test = stripslashes($test);
  $this->test = htmlspecialchars($test);
 // $this->test = strtolower($this->test);
  //return $this->test;
  }//od construct
  function get_test() {
    return $this->test;
  }
  
  
}//od class Test_input

//____________________________________________________________________________________________
 
 ?>
<?php 
 class DostopPost{
  public $bolnisnica;		
  public $tabulka;
  function __construct($bolnisnica="", $tabulka="") {
	    $bolnisnica=strtolower($bolnisnica); 
        $bolnisnica=ucfirst($bolnisnica); 
	    $this->bolnisnica = $bolnisnica;
   //echo $this->bolnisnica;		
        $this->tabulka = $tabulka; 
  } //od construct
}//od class dostopPost


//____________________________________________________________________________________________
	class Uredi extends DostopPost{
  public $id;
  public $ime;
  public $priimek;
  public $status; 
  public function __construct($bolnisnica, $tabulka, $podminka, $data) {
	parent::__construct($bolnisnica, $tabulka);
    $this->podminka = $podminka;
    $this->data = $data;	
  }
  function aktualizujFunction() {
    	$aktualizuj = new database();
		$aktualizovano=$aktualizuj->aktualizuj($this->tabulka,$this->data,$this->podminka);
  }
}// od class uredi
// klic $uredi = new Uredi($bolnisnica, $tabulka, $id, $ime, $priimek, $status);
// $uredi->aktualizujFunction();
//_____________________________________________________________________________________

	class Vyber extends DostopPost{
  public $stolpci;
  function __construct($bolnisnica, $tabulka, $stolpci="*", $poradi=NULL) {
	parent::__construct($bolnisnica, $tabulka);
    $this->stolpci = $stolpci;	
	echo "v class vyber";
	if ($this->bolnisnica == "") {
	$this->podminka = NULL;
   } else {
    $this->podminka = array("bolnisnica"=>$this->bolnisnica);
   }//od else
   $this->poradi=$poradi;
  }	
	
	function vyberFunction(){
$vyber = new database();
$vybrano=$vyber->vyber($this->tabulka, $this->stolpci, $this->podminka, $this->poradi );
//echo $vybrano[1];
//echo var_dump($vybrano);
//echo "<br>";
//echo count($vybrano);
//$dolzina=count($vybrano);
//echo $vybrano[1];
echo "<br>";
if(count($vybrano)>0){	
	
foreach(new TableRows(new RecursiveArrayIterator($vybrano)) as $k=>$v) {
        echo $v;

}//od foreach
}//od if(cout)
else{
echo "Za izbrano bolnico ni zapisa v bazi";	
}//od else
}//od vyberFunction  
}//od class vyber
// klic $vyber = new Vyber($bolnisnica, $tabulka, $stolpci);
// $vyber->vyberFunction();
//________________________________________________________________________________________	
	class Vloz extends DostopPost {

  function __construct($bolnisnica, $tabulka) {
	parent::__construct($bolnisnica, $tabulka);
	echo $tabulka;
	$this->tabulka = $tabulka;
	$this->bolnisnica = $bolnisnica;
	$ime = new test_input($_POST["ime"]);
	$this->ime = $ime->get_test();
    $priimek = new test_input($_POST["priimek"]);
	$this->priimek = $priimek->get_test();
    $status = new test_input($_POST["status"]); 
	$this->status = $status->get_test();
	$this->data = array("bolnisnica"=>$this->bolnisnica, "ime"=>$this->ime, "priimek"=>$this->priimek, "status"=>$this->status);

 
  //function vlozFunction(){
     $vloz = new database();
     $vlozeno=$vloz->vloz($this->tabulka,$this->data);
    //echo $vlozeno[1];
     echo "<br>";
     print_r($vlozeno);
     echo "<br>";
     echo count($vlozeno);
     echo "<br>";
	 
  }	 
//}//od vlozFunction    
}// od class Vloz

//-------------------------iterator-----------------------------------------------------
	class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
	echo "<table id='osebe' style='border: solid 1px black;'>";
    echo "<tr><th>Id</th><th>bolnišnica</><th>ime</th><th>priimek</th><th>status</th></tr>";	
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() { 
		 return "<td  >"  . parent::current() . "</td>";
    }
    function beginChildren() {
        echo "<tr>";
    }
    function endChildren() {
        echo "<td class='urediCls' onclick=" . '"izborFunction('. "'edit'".')"'.'"' . ">edit</td>
		<td class='odstraniCls' onclick=" . '"izborFunction('. "'odstrani'".')"'.'"' . ">odstrani</td>
		
		</tr>" . "\n";
    }
} // od class TableRows

//____________________________________________________________________________________________________

    class Edit {
	public $id;	
	public $tabulka;
	 function __construct($tabulka, $id) {
	 $this->tabulka=$tabulka;
	 $this->id=$id;
	 $podminka = array("id"=>$this->id);	
	 $stolpci=["*"];
	 $vyber = new database();
	 $vybrano=$vyber->vyber($this->tabulka, $stolpci, $podminka );
	 echo "<br>";
     //echo "število vybranych zapisov= " . count($vybrano);
     $dolzina=count($vybrano);
	 echo "<br>";
     echo "<form  method='post'>";
     for ($i = 0; $i < $dolzina; $i++) {
       foreach ($vybrano[$i] as $key => $value) {
   // echo "$key: $value\n";
	   echo " $key: <input name=$key value=$value\n></input>";
	//echo "$value\n";
      }//od foreach	 
	 echo "<input type='hidden' name='akce' value='uredi'></input><br><br><button class='submit' type='submit'>potrdi</button><button type='reset'>reset</button> ";
     echo "</form>";
       }//od for	
	 }//od construct	
	}//od class edit
//________________________________________________________________________________________________

    class odstrani {
	public $id;	
	public $tabulka;
	 function __construct($tabulka, $id) {
	 $this->tabulka=$tabulka;
	 $this->id=$id;
	 $stolpci=["*"];	 
	 $podminka = array("id"=>$this->id);
	 $odstrani = new database();
//$vyber->vyber($tabulka, $stolpci, $podminka);
    $najdeno=$odstrani->vyber($this->tabulka, $stolpci, $podminka );
	print_r($najdeno);
	$odstranjeno=$odstrani->odstrani($this->tabulka, $podminka );
	echo 'Odstranjen je bil '.$odstranjeno.' uporabnik';
	 }//od construct
	 }//od class odstrani
	?>
<script src="js/manipulacePregledovalci.js?<?php echo time(); ?>">
</script>

<!--zapati-->
</body>
</html>	