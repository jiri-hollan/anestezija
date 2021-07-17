<?php
require_once('vnosVrstice.php');
$tabela = "bolnikTbl";
$data = ['pregledId'];
$podminka ['stevMaticna']=12345;
new PreberiVpis($tabela, $data, $podminka);
?>