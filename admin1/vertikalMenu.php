<?php
echo 'Menipulacija z bazo';
require_once('sabloni/vkladane/zahlavi.php');
require_once('administrace.php');

class Vertikal extends Administrace {
   public function __construct() {
	       parent::__construct();
		   
  if (isset($_SESSION["status"]) && $_SESSION["status"] == 3)  {			   
echo '

<h1>Menu servis</h1>
<ul id="linky1">
<li><a href="konekt.php">Pripoji se na server</a></li>
<li><a href="odklop.php">Odpoji se od serverja</a></li>
<li><a href="selektPrikazi.php">prikazi izbrano tabelo</a></li>
<li><a href="doSql.php">vnesi in poženi SQL</a></li>
<li><a href="pokaziTable.php">pokaži Table</a></li>
<li><a href="pokaziStolpce.php">pokaži Stolpce</a></li>
<li><a href="serverInformace.php">Informace o serveru</a></li>
</ul>
<h1>Menu navodila</h1>
<ul id="linky1">

<li><a href="../admin1/navodila/kreateBaseNavodila.php">naredi bazo: navodila</a></li>
<li><a href="../admin1/navodila/kreateTableVse.php">naredi tabele</a></li>
</ul>
';
     } else {
	echo	' <h2>za ta del niste pooblaščeni</h2>';
	}
   }//od construct 
}//od class vertikal  
 $adminVnertikal = new Vertikal(); 
require_once('sabloni/vkladane/zapati.php'); 
?>