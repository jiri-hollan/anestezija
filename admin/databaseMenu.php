<?php
echo 'Menipulacija z bazo';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class Manipulace extends Administrace {
   public function __construct() {
	       parent::__construct();
		   
  if (isset($_SESSION["status"]) && $_SESSION["status"] == 2)  {			   
echo '

<h1>Menu servis</h1>
<ul id="linky1">

<li><a href="../admin1/kreateBase.php">naredi bazo</a></li>
<li><a href="../admin1/insertVrstica.php">vstavi vrstico</a></li>
<li><a href="../admin1/selektPrikazi.php">prikazi izbrano tabelo</a></li>
<li><a href="../admin1/pokaziTable.php">pokaži Table</a></li>
<li><a href="../admin1/pokaziStolpce.php">pokaži Stolpce</a></li>


<h1>Menu navodila</h1>
<ul id="linky3">
<li><a href="../admin1/navodila/kreateBaseNavodila.php">naredi bazo: navodila</a></li>
<li><a href="../admin1/navodila/kreateTableBesedila.php" >Naredi Tabelo:besedilaTbl </a></li>
<li><a href="../admin1/navodila/novoBesedilo.php">vstavi novo besedilo</a></li>
<li><a href="../admin1/navodila/besediloBase.php">prikaži besedila</a></li>
<li><a href="../admin1/navodila/besediloBaseIzbira.php">prikaži besedila kot izbiro</a></li>

<h1>Menu uporabniki</h1>
<ul id="linky3">
<li><a href="../admin1/navodila/kreateTableUporabniki.php">naredi tabelo: uporabnikiTbl2</a></li>


';
     } else {
	echo	' <h2>za ta del niste pooblaščeni</h2>';
	}
   }//od construct 
}//od class Manipulace  
 $adminManipulace = new Manipulace(); 
require_once('sabloni/vkladane/zapati.php'); 
?>