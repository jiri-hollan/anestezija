<?php

recuire_once('administrace.php');

class Prispevki extends Administrace {
   public function__construct() {
	   parent::__construct();
	   if (!empty($_GET['akce'])) {
		   swith ($_GET['akce']) {
			   case 'pridej':
			     $this->pridejPrispevek();
				 brek;
			   case 'uloz':
			     $this->ulozPrispevek();
				 break;
			   default:
			     $this->vypisPrispevki();
				 break;
		   }
	   } else {
		   $this->vypisPispevki();
	   }
   }
   
   public function vipisPrispevki() {
	  $prispevki = $this->con->vyber('prispevki', array(*));
      require_once 'sablony/sprava-prispevku.php';	  
   }
   
   public function pridejPrispevek() {
	   $prispevek = array(
	     'id' => 0,
		 'nadpis' => '',
		 'obsah' => '',
	   );
	  require_once 'sablony/editace-prispevku.php'; 
   }
   
   public function upravPrispevek() {
	    
   }
   
   public function ulozPrispevek() {
	  $data = array();
      $podminka = array();

      if (!empty($_POST['prispevek']))	{
		  $prispevek = $_POST['prispevek'];
	  } 
      if (!empty($prispevek['id']))	{
		  $podminka['id'] = $prispevek['id'];
	  } 
	  if (!empty($prispevek['obsah']))	{
		  $data['obsah'] = $prispevek['obsah'];
	  }
      if (!empty($prispevek['nadpis']))	{
		  $data['nadpis'] = $prispevek['nadpis'];
	  }	
       if (empty($podminka)) {
		   $ulozeno = $this->con->vloz('prispevky', $data);
	   } else {
		   $ulozeno = $this->con->aktualizuj('prispevki', '$data', '$podminka')
	   }
	   
	   if ($ulozeno !== false) {
		   $oznameni = 'Příspěvek byl uspěšně uložen. ';
		   header('Location. ' .$this->zaklad->con . 'prispevki.php?oznameni=' .
		   urencode($oznameni));
		   exit();
	   } else {
		   $chyba = 'Nepodarilo se odstranit prispevek.' + 
		     'Zkuste to pozdei. ';
		   require_once 'sablony/editace-prispevku.php';
	   }
   }
   
   public function odstraniPrispevek() {
	   
   }	
//od class prispevki	
}

$adminPrispevki = new Prispevki();