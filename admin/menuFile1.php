<?php
//echo 'Menu anestiz';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class MenuAnestiz extends Administrace {
   public function __construct() {
	       parent::__construct();  

  if (isset($_SESSION["status"]))  {
	require_once('../skupne/menu-items.php'); 
	  
	/* $a0= '
	   <li><a href="../navodila/navodilaKovid.php">Navodila</a> </li>
       <li><a href="../pregled/zdravnik.php">Pregled</a> </li>
       <li><a href="../oddelek/razpisMeseci.php?pogled=dez">Dežurstva</a> </li>'; 
	 $a1= '<li><a href="../oddelek/razpisMeseci.php?pogled=raz">Razpored</a> </li>'; 
	 $a2= '<li><a href="../servis/upload/menuUpload.php">servis</a> </li>';
	 $a3= ' <li><a href="databaseMenu.php">database</a> </li>'; 
	 */
	 echo '
       <nav id= "glavnaNav">
       <ul>';
	   switch ($_SESSION["status"]) {
		   	   
	case 2:
	  echo $a0.$a1.$a2;
	  break;
    case 3:	
	  echo $a0.$a1.$a2.$a3;

      break; 		
    default:
	
	  echo	' <h2>za ta del niste pooblaščeni</h2>';
	   }//od switch
	  echo '
	  </ul>
      </nav>';  
	   
	}//od if
   }//od construct 
}//od class MenuAnestiz 
 $adminAnestiz = new MenuAnestiz(); 
require_once('sabloni/vkladane/zapati.php');  
?>

