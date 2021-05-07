<?php
echo 'PRISPEVKI';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');
session_destroy();
 /* 
class Prispevki extends Administrace {
   public function __construct() {
	   parent::__construct();
	   if (!empty($_GET['akce'])) {
		   switch ($_GET['akce']) {
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
		   $this->vypisPrispevki();
	   }
   }

   public function vipisPrispevki() {
	  $prispevki = $this->conn->vyber('prispevki', array('*'));
     // require_once 'sablony/sprava-prispevku.php';	  
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
		   $ulozeno = $this->conn->vloz('prispevky', $data);
	   } else {
		   $ulozeno = $this->conn->aktualizuj('prispevki', '$data', '$podminka');
	   }
	   
	   if ($ulozeno !== false) {
		   $oznameni = 'Příspěvek byl uspěšně uložen. ';
		   header('Location :' .$this->zaklad->conn . 'prispevki.php?oznameni=' .
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
*/