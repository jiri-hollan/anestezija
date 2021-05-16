<!DOCTYPE html>
<?php

require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');
echo 'Menu anestiz';
class MenuAnestiz  {
   public function __construct() {
	         
echo '

<nav id= "glavnaNav">
<ul>
  <!--<li><a href="../oddelek/razpisMeseci.php?pogled=raz&doma=frontend">Razpored</a> </li>-->
  <li><a href="../navodila/navodilaKovid.php?doma=frontend">Navodila</a> </li>
  <li><a href="../pregled/zdravnik.php?doma=frontend">Pregled</a> </li>
  <li><a href="../oddelek/razpisMeseci.php?pogled=dez&doma=frontend">Dežurstva</a> </li>';
  
  if (isset($_SESSION["status"]))  {
	   switch ($_SESSION["status"]) {
		   
	case 1:	
     echo '<li><a href="../oddelek/razpisMeseci.php?pogled=raz&doma=frontend">Razpored</a> </li>';
    break;   
 
     case 2:
	 case 3:
    echo '<li><a href="../oddelek/razpisMeseci.php?pogled=raz&doma=frontend">Razpored</a> </li>';
    echo '<li><a href="../servis/upload/menuUpload.php">servis</a> </li>';
    break;
   
    default:
	   }
	   //od switch
   }
   
   echo '
  <!-- <a href="/python/">Python</a>-->
</ul>
</nav>
';
   }
//od class MenuAnestiz  
}
 $adminAnestiz = new MenuAnestiz(); 
require_once('vkladane/zapati.php'); 
?>

