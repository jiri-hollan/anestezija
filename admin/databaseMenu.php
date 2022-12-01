<?php
echo 'Menipulacija z bazo';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class Manipulace extends Administrace {
   public function __construct() {
	       parent::__construct();
		   
  if (isset($_SESSION["status"]) && $_SESSION["status"] == 3)  {
$nazaj="../admin/databaseMenu.php";
//-------------------------------------------
echo '
<div id="manipulace">
<h1>ogled</h1>
<form method="post" action="../skupne/ogledTabele.php">
<input type="hidden"  name="nazaj" value="'.$nazaj.'">
<input type="submit"  name="imeTable" value="besedilaTbl">
<input type="submit"  name="imeTable" value="uporabnikiTbl2">
<input type="submit"  name="imeTable" value="pregledovalciTbl">
<input type="submit"  name="imeTable" value="limitiTbl">
<input type="submit"  name="imeTable" value="sklepiTbl">
<input type="submit"  name="imeTable" value="bolnisniceTbl">

</form>
';
echo '
<h1>manipulace</h1>
<ul id="linky">
<!--<li><a href="../admin/manipulaceUporabniki.php?nazaj='.$nazaj.'">uporabniki</a></li>-->
<li><a href="../admin/manipulacePregledovalci.php?nazaj='.$nazaj.'">pregledovalci</a></li>
<li><a href="../admin/manipulaceLimiti.php?nazaj='.$nazaj.'">limiti</a></li>
<li><a href="../admin/manipulaceSklepi.php?nazaj='.$nazaj.'">sklepi</a></li>
<li><a href="../admin/manipulaceBolnisnice.php?nazaj='.$nazaj.'">bolnišnice</a></li><br>
</ul>

<a href="../admin1/vertikalMenu.php?nazaj='.$nazaj.'">.</a>

</div>
';

//-----------------------------------------*/ 
/*echo '


<h1>Besedila</h1>
<ul id="linky2">
<li><a href="../skupne/ogledTabele.php?imeTable=besedilaTbl&nazaj='.$nazaj.'">prikaži besedila</a></li>
</ul>
<h1>Uporabniki</h1>
<ul id="linky3">
<li><a href="../skupne/ogledTabele.php?imeTable=uporabnikiTbl2&nazaj='.$nazaj.'">prikaži uporabnike</a></li>
</ul>
<h1>Pregledovalci</h1>
<ul id="linky3">
<li><a href="../skupne/ogledTabele.php?imeTable=pregledovalciTbl&nazaj='.$nazaj.'">prikaži pregledovalce</a></li>
<li><a href="../admin/manipulacePregledovalci.php?imeTable=pregledovalciTbl&nazaj='.$nazaj.'">upravljanje z pregledovalci</a></li>
</ul>
<h1>Limiti</h1>
<ul id="linky4">
<li><a href="../skupne/ogledTabele.php?imeTable=limitiTbl&nazaj='.$nazaj.'">prikaži limite</a></li>
<li><a href="../admin/manipulaceLimiti.php?imeTable=pregledovalciTbl&nazaj='.$nazaj.'">uredi limite</a></li>
</ul>
<h1>Sklepi</h1>
<ul id="linky5">
<li><a href="../skupne/ogledTabele.php?imeTable=sklepiTbl&nazaj='.$nazaj.'">prikaži sklepe</a></li>
<li><a href="../admin/manipulaceSklepi.php?imeTable=pregledovalciTbl&nazaj='.$nazaj.'">upravljanje s sklepi</a></li>
</ul>
<h1>Bolnišnice</h1>
<ul id="linky6">
<li><a href="../skupne/ogledTabele.php?imeTable=bolnisniceTbl&nazaj='.$nazaj.'">prikaži bolnisnice</a></li>
<li><a href="../admin/manipulaceBolnisnice.php?imeTable=bolnisniceTbl&nazaj='.$nazaj.'">upravljanje z bolnišnicami</a></li><br>
</ul>
</div>
';*/
     } else {
	echo	' <h2>za ta del niste pooblaščeni</h2>';
	}
   }//od construct 
}//od class Manipulace  
 $adminManipulace = new Manipulace(); 
require_once('sabloni/vkladane/zapati.php'); 
?>