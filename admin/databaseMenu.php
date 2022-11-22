<?php
echo 'Menipulacija z bazo';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class Manipulace extends Administrace {
   public function __construct() {
	       parent::__construct();
		   
  if (isset($_SESSION["status"]) && $_SESSION["status"] == 3)  {
$nazaj="../admin/databaseMenu.php";	  
echo '
<div id="manipulace">
<h1>Menu servis</h1>
<ul id="linky1">

<li><a href="selektPrikazi.php?nazaj='.$nazaj.'">prikazi izbrano tabelo</a></li>
<li><a href="../admin1/pokaziTable.php?nazaj='.$nazaj.'">pokaži Table</a></li>
<li><a href="../admin1/pokaziStolpce.php?nazaj='.$nazaj.'">pokaži Stolpce</a></li>
<li><a href="../admin1/navodila/kreateTableVse.php" >Naredi Tabele </a></li>
</ul>

<h1>Menu besedila</h1>
<ul id="linky2">
<li><a href="../skupne/ogledTabele.php?imeTable=besedilaTbl&nazaj='.$nazaj.'">prikaži besedila</a></li>
</ul>
<h1>Menu uporabniki</h1>
<ul id="linky3">
<li><a href="../skupne/ogledTabele.php?imeTable=uporabnikiTbl2&nazaj='.$nazaj.'">prikaži uporabnike</a></li>
</ul>
<h1>Menu pregledovalci</h1>
<ul id="linky3">
<li><a href="../skupne/ogledTabele.php?imeTable=pregledovalciTbl&nazaj='.$nazaj.'">prikaži pregledovalce</a></li>
<li><a href="../admin/manipulacePregledovalci.php">upravljanje z pregledovalci</a></li>
</ul>
<h1>Menu limiti</h1>
<ul id="linky4">
<li><a href="../skupne/ogledTabele.php?imeTable=limitiTbl&nazaj='.$nazaj.'">prikaži limite</a></li>
<li><a href="../admin/manipulaceLimiti.php">uredi limite</a></li>
</ul>
<h1>Menu sklepi</h1>
<ul id="linky5">
<li><a href="../skupne/ogledTabele.php?imeTable=sklepiTbl&nazaj='.$nazaj.'">prikaži sklepe</a></li>
<li><a href="../admin/manipulaceSklepi.php">upravljanje s sklepi</a></li>
</ul>
<h1>Menu bolnišnice</h1>
<ul id="linky6">
<li><a href="../skupne/ogledTabele.php?imeTable=bolnisniceTbl&nazaj='.$nazaj.'">prikaži bolnisnice</a></li>
<li><a href="../admin/manipulaceBolnisnice.php">upravljanje z bolnišnicami</a></li><br>
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