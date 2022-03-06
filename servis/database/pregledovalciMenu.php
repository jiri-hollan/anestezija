<?php
echo 'Menipulacija z bazo';
require_once('../sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class Manipulace extends Administrace {
   public function __construct() {
	       parent::__construct();
		   
  if (isset($_SESSION["status"]) && $_SESSION["status"] > 1)  {			   
echo '
<div id="manipulace">
<h1>Menu servis</h1>
<ul id="linky1">
<li><a href="../database/manipulaceBazo.php">upravljanje z pregledovalci</a></li>
</ul>
</div>
';
     } else {
	echo	' <h2>za ta del niste pooblaščeni</h2>';
	}
   }//od construct 
}//od class Manipulace  
 $adminManipulace = new Manipulace(); 

?>