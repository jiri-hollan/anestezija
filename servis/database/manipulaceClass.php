 
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
}
// klic $uredi = new Uredi($bolnisnica, $tabulka, $id, $ime, $priimek, $status);
// $uredi->aktualizujFunction();


	
	
	
	?>