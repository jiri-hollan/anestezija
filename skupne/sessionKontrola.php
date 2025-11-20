<?php
@session_start();
require_once('../skupne/database.php');
require_once('../skupne/administrace.php');
//require_once('sabloni/vkladane/zahlavi.php');
	$koren = $_REQUEST["q"];
	echo "dolarKoren: ".$koren;
    echo "hello world";
new administrace("blbost");
?>