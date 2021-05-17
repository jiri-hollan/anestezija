<?php
//echo 'Menu anestiz';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class MenuAnestiz extends Administrace {
   public function __construct() {
	       parent::__construct();  

  if (isset($_SESSION["status"]) && $_SESSION["status"] == 2)  {		   
echo '

<nav id= "glavnaNav">
<ul>
  <li><a href="../oddelek/razpisMeseci.php?pogled=raz">Razpored</a> </li>
  <li><a href="../navodila/navodilaKovid.php">Navodila</a> </li>
  <li><a href="../pregled/zdravnik.php">Pregled</a> </li>
  <li><a href="../oddelek/razpisMeseci.php?pogled=dez">Dežurstva</a> </li>
  <li><a href="../servis/upload/menuUpload.php">servis</a> </li>

  <!-- <a href="/python/">Python</a>-->
</ul>
</nav>
';
     } else {
	echo	' <h2>za ta del niste pooblaščeni</h2>';
	 }
   }//od construct 
}//od class MenuAnestiz 
 $adminAnestiz = new MenuAnestiz(); 
require_once('sabloni/vkladane/zapati.php');  
?>

