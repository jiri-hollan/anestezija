<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<script src="js/razpisMeseci.js"></script>-->
<link rel="stylesheet" href="../css/menuFile.css?<?php echo time(); ?>">
</head>
<body>
<?php
echo 'Menu anestiz';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

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
?>
</body>
</html>

