<?php
//echo 'Menu anestiz';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class MenuAnestiz  {
   public function __construct() {
   require_once('../skupne/menu-items.php');          
echo '<nav id= "glavnaNav">

<ul>';

/*  <li><a href="../navodila/navodilaKovid.php?doma=frontend">Navodila</a> </li>
  <li><span onclick=sbFunction("spomin")>Pregled</span>  </li>
  <!-- <li><a href="../pregled/prijava.php">Pregled</a> </li> -->
  <li><a href="../oddelek/razpisMeseci.php?pogled=dez&doma=frontend">Dežurstva</a> </li>';*/
  
  
  
  if (isset($_SESSION["status"]))  {
	  //require_once('../skupne/menu-items.php'); 
	   switch ($_SESSION["status"]) {
		   
	case 1:
	  echo $a0.$a1;
    break;   
 
     case 2:
	   echo $a0.$a1.$a2;
	 break;
	 
	 case 3:
	   echo $a0.$a1.$a2.$a3;
    break;
   
    default:
	   } //od switch
	 echo
	'<script>
    document.getElementById("prij").innerHTML = "Odjava";
	document.getElementById("uname").innerHTML = "prijavljen";	
     </script>';
   }//od if 
   else{
	 	  echo $a0; 
   }
      echo '</ul></nav>';
   }//od construct
}//od class MenuAnestiz  
 $adminAnestiz = new MenuAnestiz(); 
require_once('sabloni/vkladane/zapati.php'); 
?>

<script>
    //document.getElementById("prij").innerHTML = "Odjava";
	//document.getElementById("uname").innerHTML = "prijavljen";
	<?php 
		$uname = !empty($_SESSION["uname"]) ? $_SESSION["uname"] : "";
	?>
	document.getElementById("uname").innerHTML = "prijavljen: " + " " + "<?= $uname ?>";
	document.getElementById("dom").innerHTML = "doma";	
	
     </script>