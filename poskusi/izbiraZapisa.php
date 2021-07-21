<?php

require_once '../pregled/vnosVrstice.php';

if ($_SERVER['REQUEST_METHOD']== 'POST') {
	if (isset($_POST['doBaze'])){
		$doBaze  = $_POST['doBaze'];
	} else {
		$doBaze  = "";
	}
	//var_dump($doBaze);
switch ($doBaze) {
  case 'vloz':
  if ($_POST['bolnikId']=="") {
	$novaVnosVrstice = new PrviVpis;
	} else {
	$novaVnosVrstice = new SpremeniVpis;
	}	
    break;
  case 'vyber':
    $najdi = new PreberiVpis;
	$najdeno = $najdi->prebranoFunction();
	//var_dump($najdeno);
    break;
  case 'aktualizuj':
   // code to be executed if n=label3;
    break;
   case '':
    if ($_POST['bolnikId']=="") {
	$novaVnosVrstice = new PrviVpis;
	} else {
	$novaVnosVrstice = new SpremeniVpis;
	}	
    break;
  default:	
	echo 'doBaze ni v definiranih vrednosteh';
}	
}//od if $_SERVER


require_once('../skupne/prikazPolja.php');	


?>