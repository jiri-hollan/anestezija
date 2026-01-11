<?php
require_once('../admin/sabloni/vkladane/zahlavi.php');
echo 'Menipulacija z bazo';
require_once('administrace.php');
require_once('../koren.php');
class Manipulace extends Administrace {
   public function __construct($koren) {
	       parent::__construct($koren);		   
  if (isset($_SESSION["upstatus"]) && $_SESSION["upstatus"] == 4)  {
$nazaj="../admin/databazeMenu.php";
echo '
<div id="manipulace">
<h1>ogled</h1>
<form method="post" action="../skupne/ogledTabele.php">
<input type="hidden"  name="nazaj" value="'.$nazaj.'">
<input type="submit"  name="imeTable" value="besedilaNovaTbl">
<input type="submit"  name="imeTable" value="uporabnikiTbl">
<input type="submit"  name="imeTable" value="pregledovalciTbl">
<input type="submit"  name="imeTable" value="limitiTbl">
<input type="submit"  name="imeTable" value="opravilaTbl">
<input type="submit"  name="imeTable" value="sklepiTbl">
<input type="submit"  name="imeTable" value="bolnisniceTbl">
<input type="submit"  name="imeTable" value="premedikacija1Tbl">
</form>
';

echo'

<h1>Menu servis</h1>
<ul id="linky1">

<li><a href="../admin1/vertikalMenu.php ">Vertikal Menu</a></li>
<li><a href="manipulacePogojUniverzal.php?tabulka=opravilaTbl">upravljanje z opravili</a></li>
<li><a href="manipulacePogojUniverzal.php?tabulka=sklepiTbl">upravljanje sklepi</a></li>
<li><a href="manipulacePogojUniverzal.php?tabulka=bolnisniceTbl">upravljanje bolnišnice</a></li>
<li><a href="manipulacePogojUniverzal.php?tabulka=pregledovalciTbl">upravljanje pregledovalci</a></li>
<li><a href="manipulacePogojUniverzal.php?tabulka=limitiTbl">upravljanje limiti</a></li>
<li><a href="manipulacePogojUniverzal.php?tabulka=premedikacijaTbl">upravljanje premedikacija</a></li>
</ul>

';

  } else {
	       echo	' <h2>za ta del niste pooblaščeni</h2>';
           }
  }//od construct 
}//od class Manipulace  
 new Manipulace($koren); 
require_once('sabloni/vkladane/zapati.php'); 
?>