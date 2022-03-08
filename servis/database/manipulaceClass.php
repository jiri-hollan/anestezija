 
<?php 
    $tabulka="pregledovalciTbl";
    $id=test_input($_POST["id"]);
    $bolnisnica=test_input($_POST["bolnisnica"]);
    $ime = test_input($_POST["ime"]);
	$priimek = test_input($_POST["priimek"]);
	$status = test_input($_POST["status"]); 
	$podminka = array("id"=>$id);
    $data= array("bolnisnica"=>$bolnisnica, "ime"=>$ime, "priimek"=>$priimek, "status"=>$status);
	$aktualizuj = new database();
	$aktualizovano=$aktualizuj->aktualizuj($tabulka,$data,$podminka);
	
	
	class Uredi {
  public $bolnisnica;		
  public $tabulka;
  public $id;
  public $ime;
  public $priimek;
  public $status; 



  function __construct($xxxxxx) {
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