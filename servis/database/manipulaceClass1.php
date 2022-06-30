 
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
  public $sklep;
  //public $priimek;
  public $aktiven; 
  public function __construct($bolnisnica, $tabulka, $id, $sklep, $aktiven) {
	parent::__construct($bolnisnica, $tabulka);
	$this->id = $id; 
	$this->sklep = $sklep; 
   // $this->priimek = $priimek; 
    $this->aktiven = $aktiven; 
    $this->podminka = array("id"=>$this->id);
    $this->data = array("bolnisnica"=>$this->bolnisnica, "sklep"=>$this->sklep, "aktiven"=>$this->aktiven);	
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
  function __construct($bolnisnica, $tabulka, $stolpci, $poradi=NULL) {
	parent::__construct($bolnisnica, $tabulka);
    $this->stolpci = $stolpci;	
	
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
  public $sklep;
  //public $priimek;
  public $aktiven; 
  function __construct($bolnisnica, $tabulka, $sklep, $aktiven) {
	parent::__construct($bolnisnica, $tabulka);
	$this->sklep = $sklep; 
    //$this->priimek = $priimek; 
    $this->aktiven = $aktiven; 
    $this->data = array("bolnisnica"=>$this->bolnisnica, "sklep"=>$this->sklep, "aktiven"=>$this->aktiven);	
  }

  
  function vlozFunction(){

$vloz = new database();
$vlozeno=$vloz->vloz($this->tabulka,$this->data);
//echo $vlozeno[1];
echo "<br>";
echo var_dump($vlozeno);
echo "<br>";
echo count($vlozeno);
echo "<br>";
}//od vlozFunction
  
  
}// od class Vloz
// klic $vloz = new Vloz($bolnisnica, $tabulka, $ime, $priimek, $status);
// $vloz->aktualizujFunction();
//_____________________________________________________________________________________



//-------------------------iterator-----------------------------------------------------
	class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
	echo "<table id='osebe' style='border: solid 1px black;'>";
    echo "<tr><th>Id</th><th>bolnišnica</><th>sklep</th><th>aktiven</th></tr>";	
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() { 
		 return "<td  >"  . parent::current() . "</td>";
    }
    function beginChildren() {
        echo "<tr>";
    }
    function endChildren() {
		//$a = 'onclick="' . "izborFunction('edit')" . '"';
		//$b = 'onclick="' . "izborFunction('odstrani')" . '"';
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
	var_dump($najdeno);
	$odstranjeno=$odstrani->odstrani($this->tabulka, $podminka );
	echo 'Odstranjen je bil '.$odstranjeno.' uporabnik';
	 }//od construct
	 }//od class odstrani
	?>