<?php
class Manipulace  {  
  public $tabela;
  public $polja;
  public $poradi;
  public $bolnisnica;
  public $akce;  
 function __construct() {

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $akce = test_input($_POST["akce"]);
  $bolnisnica = test_input($_POST["bolnisnica"]);
  echo strtoupper($akce) .': ';
  echo strtoupper($bolnisnica) .'<br>';
  //echo var_dump($status) .'<br>';
  akceFunction($akce);
}//od if
  else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["akce"])) {
  $akce = test_input($_GET["akce"]);
  akceFunction($akce);
  }//od else if 
  else {	  
  }//od else
   } 
}// od class Manipulace 

?>