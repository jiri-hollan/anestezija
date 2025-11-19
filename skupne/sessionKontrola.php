<?php
@session_start();
require_once('../skupne/database.php');
require_once('../skupne/administrace.php');
//require_once('sabloni/vkladane/zahlavi.php');
$q = $_REQUEST["q"];
echo "session kontrola".$q."<br>";
new administrace($koren);
?>