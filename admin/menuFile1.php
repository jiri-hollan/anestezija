<?php
//echo 'Menu anestiz';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class MenuAnestiz extends Administrace {
   public function __construct() {
	       parent::__construct();  

  if (isset($_SESSION["status"]))  {
	 $a0= '<li><a href="../navodila/navodilaKovid.php">Navodila</a> </li>
  <li><a href="../pregled/zdravnik.php">Pregled</a> </li>
  <li><a href="../oddelek/razpisMeseci.php?pogled=dez">Dežurstva</a> </li>'; 
	 $a1= '<li><a href="../oddelek/razpisMeseci.php?pogled=raz">Razpored</a> </li>'; 
	 $a2= '<li><a href="../servis/upload/menuUpload.php">servis</a> </li>';
	 $a0= ' <li><a href="databaseMenu.php">database</a> </li>'; 
	   switch ($_SESSION["status"]) {
		   
	case 2:	
    case 3:	
echo '

<nav id= "glavnaNav">
<ul>
  <li><a href="../navodila/navodilaKovid.php">Navodila</a> </li>
  <li><a href="../pregled/zdravnik.php">Pregled</a> </li>
  <li><a href="../oddelek/razpisMeseci.php?pogled=dez">Dežurstva</a> </li>  
  <li><a href="../oddelek/razpisMeseci.php?pogled=raz">Razpored</a> </li>
  <li><a href="../servis/upload/menuUpload.php">servis</a> </li>
  <li><a href="databaseMenu.php">database</a> </li>
  <!-- <a href="/python/">Python</a>-->
</ul>
</nav>
';

    break; 		
     default:
	
	echo	' <h2>za ta del niste pooblaščeni</h2>';
	   }
	}
   }//od construct 
}//od class MenuAnestiz 
 $adminAnestiz = new MenuAnestiz(); 
require_once('sabloni/vkladane/zapati.php');  
?>

