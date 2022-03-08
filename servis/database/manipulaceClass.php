 
<?php 
	
	class Uredi {
  public $bolnisnica;		
  public $tabulka;
  public $id;
  public $ime;
  public $priimek;
  public $status; 
  function __construct($bolnisnica, $tabulka, $id, $ime, $priimek, $status) {
	$this->bolnisnica = $bolnisnica; 	  
    $this->tabulka = $tabulka; 
	$this->id = $id; 
	$this->ime = $ime; 
    $this->priimek = $priimek; 
    $this->status = $status; 
    $this->podminka = array("id"=>$this->id);
    $this->data = array("bolnisnica"=>$this->bolnisnica, "ime"=>$this->ime, "priimek"=>$this->priimek, "status"=>$this->status);	
  }
  function aktualizujFunction() {
    	$aktualizuj = new database();
		$aktualizovano=$aktualizuj->aktualizuj($this->tabulka,$this->data,$this->podminka);
  }
}// od class uredi
// klic $uredi = new Uredi($bolnisnica, $tabulka, $id, $ime, $priimek, $status);
// $uredi->aktualizujFunction();
//_____________________________________________________________________________________

	
	class Vyber {
  public $bolnisnica;		
  public $tabulka;
  public $stolpci;
  function __construct($bolnisnica, $tabulka, $stolpci) {
	$this->bolnisnica = $bolnisnica; 	  
    $this->tabulka = $tabulka; 
    $this->stolpci = $stolpci;	
	
	if ($this->bolnisnica == "") {
	$this->podminka = NULL;
   } else {
    $this->podminka = array("bolnisnica"=>$this->bolnisnica);
   }//od else
  }	
	
	function vyberFunction(){
$vyber = new database();
$vybrano=$vyber->vyber($this->tabulka, $this->stolpci, $this->podminka );
//echo $vybrano[1];
//echo var_dump($vybrano);
echo "<br>";
echo count($vybrano);
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
	class Vloz {
  public $bolnisnica;		
  public $tabulka;
  public $ime;
  public $priimek;
  public $status; 
  function __construct($bolnisnica, $tabulka, $ime, $priimek, $status) {
	$this->bolnisnica = $bolnisnica; 	  
    $this->tabulka = $tabulka; 
	$this->ime = $ime; 
    $this->priimek = $priimek; 
    $this->status = $status; 
    $this->data = array("bolnisnica"=>$this->bolnisnica, "ime"=>$this->ime, "priimek"=>$this->priimek, "status"=>$this->status);	
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
		$a = 'onclick="' . "izborFunction('uredi')" . '"';
		$b = 'onclick="' . "izborFunction('odstrani')" . '"';
        echo "<td class='urediCls' onclick=" . '"izborFunction('. "'uredi'".')"'.'"' . ">uredi</td>
		<td class='odstraniCls' onclick=" . '"izborFunction('. "'odstrani'".')"'.'"' . ">odstrani</td>
		
		</tr>" . "\n";
    }
} // od class TableRows
	
	?>