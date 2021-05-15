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

class MenuAnestiz extends Administrace {
   public function __construct() {
	       parent::__construct();   
echo '

<nav id= "glavnaNav">
<ul>
  <li><a href="../oddelek/razpisMeseci.php?pogled=raz">Razpored</a> </li>
  <li><a href="../navodila/navodilaKovid.php">Navodila</a> </li>
  <li><a href="../pregled/zdravnik.php">Pregled</a> </li>
  <li><a href="../oddelek/razpisMeseci.php?pogled=dez">Dežurstva</a> </li>';
  
  if (isset($_SESSION["status"]) && $_SESSION["status"] == 2)  {
  echo '<li><a href="../servis/upload/menuUpload.php">servis</a> </li>';
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

