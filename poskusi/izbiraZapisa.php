<?php
if ($_SERVER['REQUEST_METHOD']== 'POST') {
	if (isset($_POST['doBaze']))
switch ($_POST['doBaze']) {
  case 'vloz':
  if ($_POST['bolnikId']=="") {
	$novaVnosVrstice = new PrviVpis;
	} else {
	$novaVnosVrstice = new SpremeniVpis;
	}	
    break;
  case 'vyber':
    new PreberiVpis;
    break;
  case 'aktualizuj':
   // code to be executed if n=label3;
    break;

}



	else if ($_POST['bolnikId']=="") {
	$novaVnosVrstice = new PrviVpis;
	} else {
		/*echo '<script>';
		echo 'alert("bolnik Id ni nula");';
		echo '</script>';*/
		$novaVnosVrstice = new SpremeniVpis;
	}
}//od if $_SERVER

/////////////////////////////////////////////////////7
require_once '../skupne/database.php';
require_once('../skupne/prikazPolja.php');	



?>