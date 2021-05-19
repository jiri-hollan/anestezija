<?php
echo 'Menipulacija z bazo';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class Manipulace extends Administrace {
   public function __construct() {
	       parent::__construct();
		   
  if (isset($_SESSION["status"]) && $_SESSION["status"] == 2)  {			   
echo '
<div id="manipulace">
<h1>Menu servis</h1>
<ul id="linky1">

<li><a href="../admin1/selektPrikazi.php">prikazi izbrano tabelo</a></li>
<li><a href="../admin1/pokaziTable.php">pokaži Table</a></li>
<li><a href="../admin1/pokaziStolpce.php">pokaži Stolpce</a></li>
</ul>

<h1>Menu besedila</h1>
<ul id="linky2">
<li><a href="../admin1/navodila/kreateTableBesedila.php" >Naredi Tabelo:besedilaTbl </a></li>
<li><a href="../admin1/navodila/besediloBase.php">prikaži besedila</a></li>
</ul>
<h1>Menu uporabniki</h1>
<ul id="linky3">
<li><a href="../admin1/navodila/kreateTableUporabniki2.php">naredi tabelo: uporabnikiTbl2</a></li>
<li><a href="../admin1/navodila/uporabnikiBase.php">prikaži uporabnike</a></li>
</ul>
</div>
';
     } else {
	echo	' <h2>za ta del niste pooblaščeni</h2>';
	}
   }//od construct 
}//od class Manipulace  
 $adminManipulace = new Manipulace(); 
require_once('sabloni/vkladane/zapati.php'); 
?>