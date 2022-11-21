<!DOCTYPE html>
<html lang="cs-SI">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="topnav">
<?php
if (isset($_GET['nazaj'])){
$nazaj = $_GET['nazaj'];
}else {
$nazaj = "../frontend/menuFile1.php";
}
echo '
 <a class="active" href=' .$nazaj.'>Domov</a>
 ';
 ?>
</div>





