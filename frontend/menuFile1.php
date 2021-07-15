<?php
//echo 'Menu anestiz';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class MenuAnestiz  {
   public function __construct() {
	         
echo '

<nav id= "glavnaNav">
<ul>

  <li><a href="../navodila/navodilaKovid.php?doma=frontend">Navodila</a> </li>
  <li><a href="../pregled/zdravnik.php?doma=frontend">Pregled</a> </li>
  <li><a href="../oddelek/razpisMeseci.php?pogled=dez&doma=frontend">Dežurstva</a> </li>';
  
  if (isset($_SESSION["status"]))  {
	  require_once('../skupne/menu-items.php'); 
	   switch ($_SESSION["status"]) {
		   
	case 1:
	  echo $a1;
    break;   
 
     case 2:
	   echo $a1.$a2;
	 break;
	 
	 case 3:
	   echo $a1.$a2;
    break;
   
    default:
	   }
	   //od switch
   }
   
   echo '

</ul>
</nav>
';
   }
//od class MenuAnestiz  
}
 $adminAnestiz = new MenuAnestiz(); 
require_once('sabloni/vkladane/zapati.php'); 
?>

